<?php

namespace App\Repository;

use App\Entity\MachineLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MachineLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method MachineLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method MachineLog[]    findAll()
 * @method MachineLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MachineLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MachineLog::class);
    }

    // /**
    //  * @return MachineLog[] Returns an array of MachineLog objects
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
    public function findOneBySomeField($value): ?MachineLog
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
