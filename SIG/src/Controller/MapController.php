<?php

namespace App\Controller;


use App\Entity\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Connection;
use App\Form\EntityType;

use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;


class MapController extends AbstractController
{
    #[Route('/map', name: 'app_map')]

    public function index()
    {
        $entity = new Entity();
        $form = $this->createForm(EntityType::class, $entity);


        return $this->render('map/index.html.twig', [
            'EntityForm' => $form->createView(),

        ]);
    }


    #[Route('/fetch_data', name: 'fetch_data')]
    public function fetchData(Connection $connection)
    {
        $sql = 'SELECT id, reference, type, ST_AsGeoJSON(geometry) AS geometry, infos FROM entity';
        $stmt = $connection->prepare($sql);
        $result = $stmt->executeQuery();
        $entities = $result->fetchAllAssociative();

        return new JsonResponse($entities);
    }
    #[Route('/save-entity', name: 'save_entity', methods: ['POST'])]

    public function saveEntity(Request $request, EntityManagerInterface $entityManager)
    {
        $entity = new Entity();
        $form = $this->createForm(EntityType::class, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Get geometry from hidden field
            $geom = $request->request->get('geom');
            $entity->setGeometry($geom); // Assuming this is a GeoJSON string

            $entityManager->persist($entity);
            $entityManager->flush();

            return new JsonResponse(['status' => 'Entity saved successfully']);
        }

        return new JsonResponse(['status' => 'Invalid form data'], 400);
    }
}
