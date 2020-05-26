<?php

namespace App\Repository;

use App\Entity\MachineFile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MachineFile|null find($id, $lockMode = null, $lockVersion = null)
 * @method MachineFile|null findOneBy(array $criteria, array $orderBy = null)
 * @method MachineFile[]    findAll()
 * @method MachineFile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MachineFileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MachineFile::class);
    }

    // /**
    //  * @return MachineFile[] Returns an array of MachineFile objects
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
    public function findOneBySomeField($value): ?MachineFile
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
