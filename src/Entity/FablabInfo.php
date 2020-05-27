<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FablabInfoRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     itemOperations={
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
 * @ORM\Entity(repositoryClass=FablabInfoRepository::class)
 */
class FablabInfo
{
    use TimestampableEntity;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"admin:write"})
     */
    private $infoSubtitel;

    /**
     * @ORM\Column(type="text")
     * @Groups({"admin:write"})
     */
    private $infoOmschrijving;

    /**
     * @ORM\Column(type="integer")
     */
    private $infoOrder = 50;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInfoSubtitel(): ?string
    {
        return $this->infoSubtitel;
    }

    public function setInfoSubtitel(?string $infoSubtitel): self
    {
        $this->infoSubtitel = $infoSubtitel;

        return $this;
    }

    public function getInfoOmschrijving(): ?string
    {
        return $this->infoOmschrijving;
    }

    public function setInfoOmschrijving(string $infoOmschrijving): self
    {
        $this->infoOmschrijving = $infoOmschrijving;

        return $this;
    }

    public function getInfoOrder(): ?int
    {
        return $this->infoOrder;
    }

    public function setInfoOrder(int $infoOrder): self
    {
        $this->infoOrder = $infoOrder;

        return $this;
    }
}
