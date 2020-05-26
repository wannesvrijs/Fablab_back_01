<?php

namespace App\Repository;

use App\Entity\FaqCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FaqCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method FaqCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method FaqCategorie[]    findAll()
 * @method FaqCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FaqCategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FaqCategorie::class);
    }

    // /**
    //  * @return FaqCategorie[] Returns an array of FaqCategorie objects
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
    public function findOneBySomeField($value): ?FaqCategorie
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
