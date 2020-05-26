<?php

namespace App\Repository;

use App\Entity\Materiaal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Materiaal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Materiaal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Materiaal[]    findAll()
 * @method Materiaal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MateriaalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Materiaal::class);
    }

    // /**
    //  * @return Materiaal[] Returns an array of Materiaal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Materiaal
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
