<?php


namespace App\ApiPlatform;


use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Entity\FablabInfo;
use App\Entity\Faq;
use App\Entity\FaqCategorie;
use App\Entity\Regels;
use App\Entity\ShopCategorie;
use App\Entity\Shopmateriaal;
use App\Entity\Stage;
use Doctrine\ORM\QueryBuilder;

class OrderByOrderExtension implements QueryCollectionExtensionInterface
{
    public function applyToCollection(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null)
    {
        if ($resourceClass === Stage::class){
            $rootalias = $queryBuilder->getRootAliases()[0];
            $queryBuilder->orderBy(sprintf('%s.stageOrder', $rootalias));
        }
        if ($resourceClass === ShopCategorie::class){
            $rootalias = $queryBuilder->getRootAliases()[0];
            $queryBuilder->orderBy(sprintf('%s.sCatOrder', $rootalias));
        }
        if ($resourceClass === Shopmateriaal::class){
            $rootalias = $queryBuilder->getRootAliases()[0];
            $queryBuilder->orderBy(sprintf('%s.sMatOrder', $rootalias));
        }
        if ($resourceClass === Regels::class){
            $rootalias = $queryBuilder->getRootAliases()[0];
            $queryBuilder->orderBy(sprintf('%s.regOrder', $rootalias));
        }
        if ($resourceClass === FablabInfo::class){
            $rootalias = $queryBuilder->getRootAliases()[0];
            $queryBuilder->orderBy(sprintf('%s.infoOrder', $rootalias));
        }
        if ($resourceClass === Faq::class){
            $rootalias = $queryBuilder->getRootAliases()[0];
            $queryBuilder->orderBy(sprintf('%s.faqOrder', $rootalias));
        }
        if ($resourceClass === FaqCategorie::class){
            $rootalias = $queryBuilder->getRootAliases()[0];
            $queryBuilder->orderBy(sprintf('%s.faqcatOrder', $rootalias));
        }

        return;
    }
}