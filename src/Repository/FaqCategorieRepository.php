<?php

namespace App\Repository;

use App\Entity\FaqCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
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

    public static function createOrderedByOrderCriteria(): Criteria
    {
        return Criteria::create()
            ->orderBy(['faqOrder' => 'ASC'])
            ;
    }
}
