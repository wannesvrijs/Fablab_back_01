<?php

namespace App\Repository;

use App\Entity\FabImg;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FabImg|null find($id, $lockMode = null, $lockVersion = null)
 * @method FabImg|null findOneBy(array $criteria, array $orderBy = null)
 * @method FabImg[]    findAll()
 * @method FabImg[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FabImgRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FabImg::class);
    }

    // /**
    //  * @return FabImg[] Returns an array of FabImg objects
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
    public function findOneBySomeField($value): ?FabImg
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
