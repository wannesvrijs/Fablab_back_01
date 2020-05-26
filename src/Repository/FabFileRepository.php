<?php

namespace App\Repository;

use App\Entity\FabFile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FabFile|null find($id, $lockMode = null, $lockVersion = null)
 * @method FabFile|null findOneBy(array $criteria, array $orderBy = null)
 * @method FabFile[]    findAll()
 * @method FabFile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FabFileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FabFile::class);
    }

    // /**
    //  * @return FabFile[] Returns an array of FabFile objects
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
    public function findOneBySomeField($value): ?FabFile
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
