<?php

namespace App\Repository;

use App\Entity\CookieTester;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CookieTester|null find($id, $lockMode = null, $lockVersion = null)
 * @method CookieTester|null findOneBy(array $criteria, array $orderBy = null)
 * @method CookieTester[]    findAll()
 * @method CookieTester[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CookieTesterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CookieTester::class);
    }

    // /**
    //  * @return CookieTester[] Returns an array of CookieTester objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CookieTester
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
