<?php

namespace App\Repository;

use App\Entity\MachineReservatie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MachineReservatie|null find($id, $lockMode = null, $lockVersion = null)
 * @method MachineReservatie|null findOneBy(array $criteria, array $orderBy = null)
 * @method MachineReservatie[]    findAll()
 * @method MachineReservatie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MachineReservatieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MachineReservatie::class);
    }

}
