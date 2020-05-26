<?php

namespace App\Repository;

use App\Entity\Shopmateriaal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Shopmateriaal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Shopmateriaal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Shopmateriaal[]    findAll()
 * @method Shopmateriaal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShopmateriaalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Shopmateriaal::class);
    }

    // /**
    //  * @return Shopmateriaal[] Returns an array of Shopmateriaal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Shopmateriaal
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
