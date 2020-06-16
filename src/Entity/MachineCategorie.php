<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MachineCategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

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
 * @Vich\Uploadable()
 * @ORM\Entity(repositoryClass=MachineCategorieRepository::class)
 */
class MachineCategorie
{

    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"machinecategorie:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     * @Groups({"machinecategorie:read", "admin:write", "fabmoment:read", "machine:read"})
     */
    private $mcatNaam;

    /**
     * @ORM\Column(type="text")
     * @Groups({"machinecategorie:read", "admin:write"})
     */
    private $mcatOmschrijving;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"machinecategorie:read", "admin:write"})
     */
    private $mcatImgPad;


    /**
     * @ORM\OneToMany(targetEntity=Machine::class, mappedBy="machMcat")
     * @Groups({"machinecategorie:read", "admin:write"})
     */
    private $machines;

    /**
     * @Gedmo\Slug(fields={"mcatNaam"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"machinecategorie:read", "admin:write"})
     */
    private $slug;

    /**
     * @Vich\UploadableField(mapping="machine_img", fileNameProperty="mcatImgPad")
     */
    private $mcatImgFile;

    /**
     * @return mixed
     */
    public function getMcatImgFile()
    {
        return $this->mcatImgFile;
    }


    public function setMcatImgFile($mcatImgFile): void
    {
        $this->mcatImgFile = $mcatImgFile;
        $this->updatedAt = new \DateTime();
    }

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

    public function setMcatImgPad(?string $mcatImgPad)
    {
        $this->mcatImgPad = $mcatImgPad;

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

    public function __toString()
    {
        return $this->mcatNaam;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
