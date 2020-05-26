<?php

namespace App\Repository;

use App\Entity\MachineRecht;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MachineRecht|null find($id, $lockMode = null, $lockVersion = null)
 * @method MachineRecht|null findOneBy(array $criteria, array $orderBy = null)
 * @method MachineRecht[]    findAll()
 * @method MachineRecht[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MachineRechtRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MachineRecht::class);
    }

    // /**
    //  * @return MachineRecht[] Returns an array of MachineRecht objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MachineRecht
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
