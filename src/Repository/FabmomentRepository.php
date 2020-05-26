<?php

namespace App\Repository;

use App\Entity\Fabmoment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fabmoment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fabmoment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fabmoment[]    findAll()
 * @method Fabmoment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FabmomentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fabmoment::class);
    }

    // /**
    //  * @return Fabmoment[] Returns an array of Fabmoment objects
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
    public function findOneBySomeField($value): ?Fabmoment
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
