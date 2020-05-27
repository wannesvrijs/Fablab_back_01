<?php

namespace App\Repository;

use App\Entity\ShopCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ShopCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShopCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShopCategorie[]    findAll()
 * @method ShopCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShopCategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShopCategorie::class);
    }

    // /**
    //  * @return ShopCategorie[] Returns an array of ShopCategorie objects
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
    public function findOneBySomeField($value): ?ShopCategorie
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
