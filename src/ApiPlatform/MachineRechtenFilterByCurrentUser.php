<?php


namespace App\ApiPlatform;


use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Entity\MachineRecht;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Security\Core\Security;

class MachineRechtenFilterByCurrentUser implements QueryCollectionExtensionInterface, QueryItemExtensionInterface
{

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    //here we make some cutom querylogic, the operationname that is pased can be used for more specific actions.
    public function applyToCollection(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null)
    {
        $this->addWhere($queryBuilder, $resourceClass);
    }


    public function applyToItem(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, array $identifiers, string $operationName = null, array $context = [])
    {
        $this->addWhere($queryBuilder, $resourceClass);
    }


    public function addWhere(QueryBuilder $queryBuilder, string $resourceClass): void
    {
        if ($resourceClass !== MachineRecht::class) {
            return;
        }

        if ($this->security->isGranted('ROLE_ADMIN')) {
            return;
        }

        $rootalias = $queryBuilder->getRootAliases()[0];
        $queryBuilder->andWhere(sprintf('%s.mrechtUse = :mrechtUse', $rootalias))
            ->setParameter(':mrechtUse', $this->security->getUser());
    }
}