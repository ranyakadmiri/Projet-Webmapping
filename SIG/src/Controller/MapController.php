<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Connection;
use App\Repository\EntityRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class MapController extends AbstractController
{
    #[Route('/map', name: 'app_map')]

    public function index()
    {
        return $this->render('map/index.html.twig');
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
}
