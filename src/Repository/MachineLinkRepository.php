<?php

namespace App\Repository;

use App\Entity\MachineLink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MachineLink|null find($id, $lockMode = null, $lockVersion = null)
 * @method MachineLink|null findOneBy(array $criteria, array $orderBy = null)
 * @method MachineLink[]    findAll()
 * @method MachineLink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MachineLinkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MachineLink::class);
    }

    // /**
    //  * @return MachineLink[] Returns an array of MachineLink objects
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
    public function findOneBySomeField($value): ?MachineLink
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
