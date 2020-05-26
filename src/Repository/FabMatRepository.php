<?php

namespace App\Repository;

use App\Entity\FabMat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FabMat|null find($id, $lockMode = null, $lockVersion = null)
 * @method FabMat|null findOneBy(array $criteria, array $orderBy = null)
 * @method FabMat[]    findAll()
 * @method FabMat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FabMatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FabMat::class);
    }

    // /**
    //  * @return FabMat[] Returns an array of FabMat objects
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
    public function findOneBySomeField($value): ?FabMat
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
