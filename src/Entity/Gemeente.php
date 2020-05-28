<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GemeenteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"},
 *     normalizationContext={},
 *     denormalizationContext={},
 *     attributes={
 *          "pagination_items_per_page"=10,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 * )
 * @ORM\Entity(repositoryClass=GemeenteRepository::class)
 */
class Gemeente
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"gemeente:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=12)
     * @Groups({"gemeente:read"})
     */
    private $gemPostcode;

    /**
     * @ORM\Column(type="string", length=40)
     * @Groups({"gemeente:read"})
     */
    private $gemNaam;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGemPostcode(): ?string
    {
        return $this->gemPostcode;
    }

    public function setGemPostcode(string $gemPostcode): self
    {
        $this->gemPostcode = $gemPostcode;

        return $this;
    }

    public function getGemNaam(): ?string
    {
        return $this->gemNaam;
    }

    public function setGemNaam(string $gemNaam): self
    {
        $this->gemNaam = $gemNaam;

        return $this;
    }
}
