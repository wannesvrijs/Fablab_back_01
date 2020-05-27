<?php

namespace App\Repository;

use App\Entity\ShopCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
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


    public static function createOrderedByOrderCriteria(): Criteria
    {
        return Criteria::create()
            ->orderBy(['smatOrder' => 'ASC'])
        ;
    }
}
