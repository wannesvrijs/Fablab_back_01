<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ShopmateriaalRepository;
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
 *     itemOperations={},
 *     normalizationContext={},
 *     denormalizationContext={},
 *     attributes={
 *          "pagination_items_per_page"=30,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 * )
 * @ORM\Entity(repositoryClass=ShopmateriaalRepository::class)
 */
class Shopmateriaal
{

    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"admin:write"})
     */
    private $smatNaam;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"admin:write"})
     */
    private $smatOmschrijving;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"admin:write"})
     */
    private $smatAfmeting;

    /**
     * @ORM\Column(type="integer", length=255)
     * @Groups({"admin:write"})
     */
    private $smatPrijs;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"admin:write"})
     */
    private $smatInStock;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSmatNaam(): ?string
    {
        return $this->smatNaam;
    }

    public function setSmatNaam(string $smatNaam): self
    {
        $this->smatNaam = $smatNaam;

        return $this;
    }

    public function getSmatOmschrijving(): ?string
    {
        return $this->smatOmschrijving;
    }

    public function setSmatOmschrijving(?string $smatOmschrijving): self
    {
        $this->smatOmschrijving = $smatOmschrijving;

        return $this;
    }

    public function getSmatAfmeting(): ?string
    {
        return $this->smatAfmeting;
    }

    public function setSmatAfmeting(?string $smatAfmeting): self
    {
        $this->smatAfmeting = $smatAfmeting;

        return $this;
    }

    public function getSmatPrijs(): ?string
    {
        return $this->smatPrijs;
    }

    public function setSmatPrijs(string $smatPrijs): self
    {
        $this->smatPrijs = $smatPrijs;

        return $this;
    }

    public function getSmatInStock(): ?bool
    {
        return $this->smatInStock;
    }

    public function setSmatInStock(bool $smatInStock): self
    {
        $this->smatInStock = $smatInStock;

        return $this;
    }
}
