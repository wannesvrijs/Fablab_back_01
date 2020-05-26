<?php

namespace App\Repository;

use App\Entity\MachineStaat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MachineStaat|null find($id, $lockMode = null, $lockVersion = null)
 * @method MachineStaat|null findOneBy(array $criteria, array $orderBy = null)
 * @method MachineStaat[]    findAll()
 * @method MachineStaat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MachineStaatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MachineStaat::class);
    }

    // /**
    //  * @return MachineStaat[] Returns an array of MachineStaat objects
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
    public function findOneBySomeField($value): ?MachineStaat
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
