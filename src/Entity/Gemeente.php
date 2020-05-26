<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GemeenteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={},
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
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $gemPostcode;

    /**
     * @ORM\Column(type="string", length=40)
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
