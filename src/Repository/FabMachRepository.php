<?php

namespace App\Repository;

use App\Entity\FabMach;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FabMach|null find($id, $lockMode = null, $lockVersion = null)
 * @method FabMach|null findOneBy(array $criteria, array $orderBy = null)
 * @method FabMach[]    findAll()
 * @method FabMach[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FabMachRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FabMach::class);
    }

    // /**
    //  * @return FabMach[] Returns an array of FabMach objects
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
    public function findOneBySomeField($value): ?FabMach
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
