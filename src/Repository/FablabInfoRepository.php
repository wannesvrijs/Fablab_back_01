<?php

namespace App\Repository;

use App\Entity\FablabInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FablabInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method FablabInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method FablabInfo[]    findAll()
 * @method FablabInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FablabInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FablabInfo::class);
    }

    // /**
    //  * @return FablabInfo[] Returns an array of FablabInfo objects
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
    public function findOneBySomeField($value): ?FablabInfo
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
