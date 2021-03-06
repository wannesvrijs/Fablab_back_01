<?php


namespace App\ApiPlatform;


use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Entity\MachineReservatie;
use Doctrine\ORM\QueryBuilder;

class MachineReservatieFilterUpcomming implements QueryCollectionExtensionInterface, QueryItemExtensionInterface
{

    private $now;

    public function __construct()
    {
        $this->now = new \DateTime(null, new \DateTimeZone('Europe/Brussels'));
    }

    public function applyToCollection(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null)
    {
        $this->addWhere($queryBuilder, $resourceClass);
    }

    public function applyToItem(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, array $identifiers, string $operationName = null, array $context = [])
    {
        $this->addWhere($queryBuilder, $resourceClass);
    }

    /**
     * @param QueryBuilder $queryBuilder
     * @param string $resourceClass
     */
    public function addWhere(QueryBuilder $queryBuilder, string $resourceClass): void
    {
        if ($resourceClass === MachineReservatie::class) {
            $rootalias = $queryBuilder->getRootAliases()[0];
            $queryBuilder->andWhere(sprintf('%s.mresStop > :now', $rootalias))
                ->setParameter(':now', $this->now);
        }

        return;
    }

}