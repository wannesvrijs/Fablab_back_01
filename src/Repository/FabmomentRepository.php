<?php

namespace App\Repository;

use App\Entity\Fabmoment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fabmoment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fabmoment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fabmoment[]    findAll()
 * @method Fabmoment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FabmomentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fabmoment::class);
    }


    /**
     * @return Fabmoment[]
     */
    public function findFabmomentCollection()
    {
        return $this->createQueryBuilder('fab')
            ->leftJoin('fab.fabFiles', 'ff')
            ->addSelect('ff')
            ->orderBy('fab.fabDatum', 'DESC')
            ->getQuery()
            ->getResult()
            ;

    }

    public function findFabmomentItem()
    {

    }

}
