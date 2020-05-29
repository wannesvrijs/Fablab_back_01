<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ShopCategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

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
 * @ORM\Entity(repositoryClass=ShopCategorieRepository::class)
 */
class ShopCategorie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"admin:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"admin:write", "shopcategorie:read", "shopcategorie:write"})
     */
    private $scatNaam;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"admin:write"})
     */
    private $scatOrder = 50;

    /**
     * @ORM\OneToMany(targetEntity=Shopmateriaal::class, mappedBy="smatScat")
     */
    private $shopmaterialen;

    public function __construct()
    {
        $this->shopmaterialen = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScatNaam(): ?string
    {
        return $this->scatNaam;
    }

    public function setScatNaam(string $scatNaam): self
    {
        $this->scatNaam = $scatNaam;

        return $this;
    }

    public function getSCatOrder(): ?int
    {
        return $this->scatOrder;
    }

    public function setSCatOrder(int $scatOrder): self
    {
        $this->scatOrder = $scatOrder;

        return $this;
    }

    /**
     * @return Collection|Shopmateriaal[]
     */
    public function getShopmaterialen(): Collection
    {
        return $this->shopmaterialen;
    }

    /**
     * @SerializedName("shopmaterialen")
     * @Groups({"shopcategorie:read"})
     */
    public function getShopmaterialenOrdered()
    {
        $criteria = ShopCategorieRepository::createOrderedByOrderCriteria();

        return $this->shopmaterialen->matching($criteria);
    }

    public function addShopmaterialen(Shopmateriaal $shopmaterialen): self
    {
        if (!$this->shopmaterialen->contains($shopmaterialen)) {
            $this->shopmaterialen[] = $shopmaterialen;
            $shopmaterialen->setSmatScat($this);
        }

        return $this;
    }

    public function removeShopmaterialen(Shopmateriaal $shopmaterialen): self
    {
        if ($this->shopmaterialen->contains($shopmaterialen)) {
            $this->shopmaterialen->removeElement($shopmaterialen);
            // set the owning side to null (unless already changed)
            if ($shopmaterialen->getSmatScat() === $this) {
                $shopmaterialen->setSmatScat(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->scatNaam;
    }
}
