<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ShopmateriaalRepository;
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
     * @Groups({"admin:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ShopCategorie::class, inversedBy="shopmaterialen")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"shopmateriaal:read", "admin:write"})
     */
    private $smatScat;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Groups({"shopmateriaal:read", "shopcategorie:read", "admin:write"})
     */
    private $smatAfmeting;

    /**
     * @ORM\Column(type="float", length=10)
     * @Groups({"shopmateriaal:read", "shopcategorie:read", "admin:write"})
     */
    private $smatPrijs;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     * @Groups({"shopmateriaal:read", "shopcategorie:read", "admin:write"})
     */
    private $smatEenheid;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"shopmateriaal:read", "shopcategorie:read","admin:write"})
     */
    private $smatInStock;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"admin:write"})
     */
    private $smatOrder = 50;


    public function getId(): ?int
    {
        return $this->id;
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

    public function getSmatScat(): ?ShopCategorie
    {
        return $this->smatScat;
    }

    public function setSmatScat(?ShopCategorie $smatScat): self
    {
        $this->smatScat = $smatScat;

        return $this;
    }

    public function getSmatOrder(): ?int
    {
        return $this->smatOrder;
    }

    public function setSmatOrder(int $smatOrder): self
    {
        $this->smatOrder = $smatOrder;

        return $this;
    }
    public function __toString()
    {
        return $this->smatAfmeting;
    }

    public function getSmatEenheid(): ?string
    {
        return $this->smatEenheid;
    }

    public function setSmatEenheid(?string $smatEenheid): self
    {
        $this->smatEenheid = $smatEenheid;

        return $this;
    }
}
