<?php

namespace App\Repository;

use App\Entity\Gemeente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gemeente|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gemeente|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gemeente[]    findAll()
 * @method Gemeente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GemeenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gemeente::class);
    }

    // /**
    //  * @return Gemeente[] Returns an array of Gemeente objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gemeente
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
