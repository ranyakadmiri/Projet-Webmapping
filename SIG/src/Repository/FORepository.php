<?php

namespace App\Repository;

use App\Entity\FO;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FO>
 *
 * @method FO|null find($id, $lockMode = null, $lockVersion = null)
 * @method FO|null findOneBy(array $criteria, array $orderBy = null)
 * @method FO[]    findAll()
 * @method FO[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FORepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FO::class);
    }

//    /**
//     * @return FO[] Returns an array of FO objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FO
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
