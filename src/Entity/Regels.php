<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RegelsRepository;
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
 * @ORM\Entity(repositoryClass=RegelsRepository::class)
 */
class Regels
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
    private $regNaam;

    /**
     * @ORM\Column(type="text")
     * @Groups({"admin:write"})
     */
    private $regOmschrijving;

    /**
     * @ORM\Column(type="integer")
     */
    private $regOrder = 50;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegNaam(): ?string
    {
        return $this->regNaam;
    }

    public function setRegNaam(?string $regNaam): self
    {
        $this->regNaam = $regNaam;

        return $this;
    }

    public function getRegOmschrijving(): ?string
    {
        return $this->regOmschrijving;
    }

    public function setRegOmschrijving(string $regOmschrijving): self
    {
        $this->regOmschrijving = $regOmschrijving;

        return $this;
    }

    public function getRegOrder(): ?int
    {
        return $this->regOrder;
    }

    public function setRegOrder(int $regOrder): self
    {
        $this->regOrder = $regOrder;

        return $this;
    }
}
