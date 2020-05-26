<?php

namespace App\Repository;

use App\Entity\FabmomentMat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FabmomentMat|null find($id, $lockMode = null, $lockVersion = null)
 * @method FabmomentMat|null findOneBy(array $criteria, array $orderBy = null)
 * @method FabmomentMat[]    findAll()
 * @method FabmomentMat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FabmomentMatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FabmomentMat::class);
    }

    // /**
    //  * @return FabmomentMat[] Returns an array of FabmomentMat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FabmomentMat
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
