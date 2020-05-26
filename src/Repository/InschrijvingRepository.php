<?php

namespace App\Repository;

use App\Entity\Inschrijving;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Inschrijving|null find($id, $lockMode = null, $lockVersion = null)
 * @method Inschrijving|null findOneBy(array $criteria, array $orderBy = null)
 * @method Inschrijving[]    findAll()
 * @method Inschrijving[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InschrijvingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Inschrijving::class);
    }

    // /**
    //  * @return Inschrijving[] Returns an array of Inschrijving objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Inschrijving
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
