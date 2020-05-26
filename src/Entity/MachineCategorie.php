<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MachineCategorieRepository;
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
 *     normalizationContext={},
 *     denormalizationContext={},
 *     attributes={
 *          "pagination_items_per_page"=10,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 * )
 * @ORM\Entity(repositoryClass=MachineCategorieRepository::class)
 */
class MachineCategorie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"machine_detail:read"})
     * @ORM\Column(type="string", length=255)
     */
    private $mcatNaam;

    /**
     * @Groups({"machine_detail:read"})
     * @ORM\Column(type="string", length=255)
     */
    private $mcatOmschrijving;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mcatImgPad;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mcatImgAlt;

    /**
     * @ORM\OneToMany(targetEntity=Machine::class, mappedBy="machMcat")
     * @Groups({"machine_detail:read"})
     */
    private $machines;

    public function __construct()
    {
        $this->machines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMcatNaam(): ?string
    {
        return $this->mcatNaam;
    }

    public function setMcatNaam(string $mcatNaam): self
    {
        $this->mcatNaam = $mcatNaam;

        return $this;
    }

    public function getMcatOmschrijving(): ?string
    {
        return $this->mcatOmschrijving;
    }

    public function setMcatOmschrijving(string $mcatOmschrijving): self
    {
        $this->mcatOmschrijving = $mcatOmschrijving;

        return $this;
    }

    public function getMcatImgPad(): ?string
    {
        return $this->mcatImgPad;
    }

    public function setMcatImgPad(?string $mcatImgPad): self
    {
        $this->mcatImgPad = $mcatImgPad;

        return $this;
    }

    public function getMcatImgAlt(): ?string
    {
        return $this->mcatImgAlt;
    }

    public function setMcatImgAlt(?string $mcatImgAlt): self
    {
        $this->mcatImgAlt = $mcatImgAlt;

        return $this;
    }

    /**
     * @return Collection|Machine[]
     */
    public function getMachines(): Collection
    {
        return $this->machines;
    }

    public function addMachine(Machine $machine): self
    {
        if (!$this->machines->contains($machine)) {
            $this->machines[] = $machine;
            $machine->setMachMcat($this);
        }

        return $this;
    }

    public function removeMachine(Machine $machine): self
    {
        if ($this->machines->contains($machine)) {
            $this->machines->removeElement($machine);
            // set the owning side to null (unless already changed)
            if ($machine->getMachMcat() === $this) {
                $machine->setMachMcat(null);
            }
        }

        return $this;
    }
}
