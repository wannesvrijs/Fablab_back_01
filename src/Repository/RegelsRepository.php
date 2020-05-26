<?php

namespace App\Repository;

use App\Entity\Regels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Regels|null find($id, $lockMode = null, $lockVersion = null)
 * @method Regels|null findOneBy(array $criteria, array $orderBy = null)
 * @method Regels[]    findAll()
 * @method Regels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegelsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Regels::class);
    }

    // /**
    //  * @return Regels[] Returns an array of Regels objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Regels
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
