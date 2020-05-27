<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StageRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     itemOperations={
 *          "get",
 *          "put"={"security"="is_granted('ROLE_ADMIN')"},
 *          "delete"={"security"="is_granted('ROLE_ADMIN')"}
 *     },
 *     collectionOperations={
 *          "get",
 *          "post"={"security"="is_granted('ROLE_ADMIN')"}
 *     },
 *     normalizationContext={},
 *     denormalizationContext={},
 *     attributes={
 *          "pagination_items_per_page"=10,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 * )
 * @ORM\Entity(repositoryClass=StageRepository::class)
 */
class Stage
{
    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"admin:read","admin:write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"stage:read","admin:write"})
     */
    private $stageSubtitel;

    /**
     * @ORM\Column(type="text")
     * @Groups({"stage:read","admin:write"})
     */
    private $stageOmschrijving;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"admin:write"})
     */
    private $stageOrder = 50;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStageSubtitel(): ?string
    {
        return $this->stageSubtitel;
    }

    public function setStageSubtitel(string $stageSubtitel): self
    {
        $this->stageSubtitel = $stageSubtitel;

        return $this;
    }

    public function getStageOmschrijving(): ?string
    {
        return $this->stageOmschrijving;
    }

    public function setStageOmschrijving(string $stageOmschrijving): self
    {
        $this->stageOmschrijving = $stageOmschrijving;

        return $this;
    }

    public function getStageOrder(): ?int
    {
        return $this->stageOrder;
    }

    public function setStageOrder(int $stageOrder): self
    {
        $this->stageOrder = $stageOrder;

        return $this;
    }
}
