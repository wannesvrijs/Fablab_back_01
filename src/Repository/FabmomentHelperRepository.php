<?php

namespace App\Repository;

use App\Entity\FabmomentHelper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FabmomentHelper|null find($id, $lockMode = null, $lockVersion = null)
 * @method FabmomentHelper|null findOneBy(array $criteria, array $orderBy = null)
 * @method FabmomentHelper[]    findAll()
 * @method FabmomentHelper[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FabmomentHelperRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FabmomentHelper::class);
    }

    public static function createActiveFabCriteria()
    {
        return Criteria::create()
            ->andWhere(Criteria::expr()->eq('fabIsPosted', true))
            ->orderBy(['fabDatum' => 'DESC'])
            ;
    }
}
