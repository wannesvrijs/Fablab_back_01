<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FabmomentHelperRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"},
 *     attributes={
 *          "pagination_items_per_page"=10,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 *
 * )
 * @ORM\Entity(repositoryClass=FabmomentHelperRepository::class)
 */
class FabmomentHelper
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Fabmoment::class, mappedBy="fabmomentHelper")
     */
    private $fabhelpfab;

    public function __construct()
    {
        $this->fabhelpfab = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Fabmoment[]
     */
    public function getFabhelpfab(): Collection
    {
        return $this->fabhelpfab;
    }

    /**
     * @SerializedName("FabActive")
     * @Groups({"fabmomenthelper:read"})
     */

    public function getFabActive()
    {
        $criteria = FabmomentHelperRepository::createActiveFabCriteria();

        return $this->fabhelpfab->matching($criteria);
    }

    public function addFabhelpfab(Fabmoment $fabhelpfab): self
    {
        if (!$this->fabhelpfab->contains($fabhelpfab)) {
            $this->fabhelpfab[] = $fabhelpfab;
            $fabhelpfab->setFabmomentHelper($this);
        }

        return $this;
    }

    public function removeFabhelpfab(Fabmoment $fabhelpfab): self
    {
        if ($this->fabhelpfab->contains($fabhelpfab)) {
            $this->fabhelpfab->removeElement($fabhelpfab);
            // set the owning side to null (unless already changed)
            if ($fabhelpfab->getFabmomentHelper() === $this) {
                $fabhelpfab->setFabmomentHelper(null);
            }
        }

        return $this;
    }
}
