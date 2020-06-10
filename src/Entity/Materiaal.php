<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MateriaalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
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
 *     attributes={
 *          "pagination_items_per_page"=10,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 * )
 * @ORM\Entity(repositoryClass=MateriaalRepository::class)
 */
class Materiaal
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"materiaal:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"fabmoment:item:read","materiaal:read","admin:write"})
     */
    private $matNaam;

    /**
     * @ORM\OneToMany(targetEntity=FabMat::class, mappedBy="fabmatMat")
     * @Groups({"materiaal:read"})
     */
    private $fabMats;


    public function __construct()
    {
        $this->fabMats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatNaam(): ?string
    {
        return $this->matNaam;
    }

    public function setMatNaam(string $matNaam): self
    {
        $this->matNaam = $matNaam;

        return $this;
    }

    /**
     * @return Collection|FabMat[]
     */
    public function getFabMats(): Collection
    {
        return $this->fabMats;
    }

    public function addFabMat(FabMat $fabMat): self
    {
        if (!$this->fabMats->contains($fabMat)) {
            $this->fabMats[] = $fabMat;
            $fabMat->setFabmatMat($this);
        }

        return $this;
    }

    public function removeFabMat(FabMat $fabMat): self
    {
        if ($this->fabMats->contains($fabMat)) {
            $this->fabMats->removeElement($fabMat);
            // set the owning side to null (unless already changed)
            if ($fabMat->getFabmatMat() === $this) {
                $fabMat->setFabmatMat(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->matNaam;
    }
}
