<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MachineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
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
 *     attributes={
 *          "force_eager"=false,
 *          "pagination_items_per_page"=10,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 * )
 * @ORM\Entity(repositoryClass=MachineRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"machMcat.id": "exact"})
 * @Vich\Uploadable()
 */
class Machine
{

    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"machine:read", "machinecategorie:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=MachineCategorie::class, inversedBy="machines")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"admin:write", "machine:read"})
     */
    private $machMcat;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"machinecategorie:read","machine:read","admin:write", "machinerecht:read"})
     */
    private $machNaam;

    /**
     * @ORM\Column(type="text")
     * @Groups({"machinecategorie:item:read","admin:write"})
     */
    private $machOmschrijving;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"machinecategorie:item:read","admin:write"})
     */
    private $machAfmeting;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"machinecategorie:item:read","admin:write"})
     */
    private $machFiles;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"machinecategorie:item:read","admin:write"})
     */
    private $machMat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"machinecategorie:item:read","admin:write"})
     */
    private $machImgPad;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"machinecategorie:item:read","admin:write"})
     */
    private $machVideoPad;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"machinecategorie:item:read","admin:write"})
     */
    private $machVideoTitle;

    /**
     * @ORM\OneToMany(targetEntity=MachineLog::class, mappedBy="mlogMach")
     */
    private $machineLogs;

    /**
     * @ORM\OneToMany(targetEntity=MachineRecht::class, mappedBy="mrechMach")
     */
    private $machineRechten;


    /**
     * @ORM\OneToMany(targetEntity=MachineReservatie::class, mappedBy="mresMach", orphanRemoval=true)
     * @Groups({"admin:write"})
     */
    private $machineReservaties;

    /**
     * @ORM\OneToMany(targetEntity=MachineLink::class, mappedBy="mlinkMach", cascade={"persist"}, orphanRemoval=true)
     * @Groups({"machinecategorie:item:read","admin:write"})
     */
    private $machineLinks;

    /**
     * @ORM\OneToMany(targetEntity=MachineFile::class, mappedBy="mfileMach", cascade={"persist"}, orphanRemoval=true)
     * @Groups({"machinecategorie:item:read","admin:write"})
     */
    private $machineFiles;

    /**
     * @Vich\UploadableField(mapping="machine_img", fileNameProperty="machImgPad")
     */
    private $machImgFile;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"machinecategorie:read","admin:write", "machine:read", "machine:item:read"})
     */
    private $machBeschikbaar;

    /**
     * @return mixed
     */
    public function getMachImgFile()
    {
        return $this->machImgFile;
    }

    /**
     * @param mixed $machImgFile
     */
    public function setMachImgFile($machImgFile): void
    {
        $this->machImgFile = $machImgFile;
        $this->updatedAt = new \DateTime();
    }


    public function __construct()
    {
        $this->machineLogs = new ArrayCollection();
        $this->machineRechten = new ArrayCollection();
        $this->machineReservaties = new ArrayCollection();
        $this->machineLinks = new ArrayCollection();
        $this->machineFiles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMachMcat(): ?MachineCategorie
    {
        return $this->machMcat;
    }

    public function setMachMcat(?MachineCategorie $machMcat): self
    {
        $this->machMcat = $machMcat;

        return $this;
    }

    public function getMachNaam(): ?string
    {
        return $this->machNaam;
    }

    public function setMachNaam(string $machNaam): self
    {
        $this->machNaam = $machNaam;

        return $this;
    }

    public function getMachOmschrijving(): ?string
    {
        return $this->machOmschrijving;
    }

    public function setMachOmschrijving(string $machOmschrijving): self
    {
        $this->machOmschrijving = $machOmschrijving;

        return $this;
    }

    public function getMachAfmeting(): ?string
    {
        return $this->machAfmeting;
    }

    public function setMachAfmeting(?string $machAfmeting): self
    {
        $this->machAfmeting = $machAfmeting;

        return $this;
    }

    public function getMachFiles(): ?string
    {
        return $this->machFiles;
    }

    public function setMachFiles(?string $machFiles): self
    {
        $this->machFiles = $machFiles;

        return $this;
    }

    public function getMachImgPad(): ?string
    {
        return $this->machImgPad;
    }

    public function setMachImgPad(?string $machImgPad)
    {
        $this->machImgPad = $machImgPad;

        return $this;
    }

    public function getMachVideoPad(): ?string
    {
        return $this->machVideoPad;
    }

    public function setMachVideoPad(?string $machVideoPad): self
    {
        $this->machVideoPad = $machVideoPad;

        return $this;
    }

    public function getMachVideoTitle(): ?string
    {
        return $this->machVideoTitle;
    }

    public function setMachVideoTitle(?string $machVideoTitle): self
    {
        $this->machVideoTitle = $machVideoTitle;

        return $this;
    }

    /**
     * @return Collection|MachineLog[]
     */
    public function getMachineLogs(): Collection
    {
        return $this->machineLogs;
    }

    public function addMachineLog(MachineLog $machineLog): self
    {
        if (!$this->machineLogs->contains($machineLog)) {
            $this->machineLogs[] = $machineLog;
            $machineLog->setMlogMach($this);
        }

        return $this;
    }

    public function removeMachineLog(MachineLog $machineLog): self
    {
        if ($this->machineLogs->contains($machineLog)) {
            $this->machineLogs->removeElement($machineLog);
            // set the owning side to null (unless already changed)
            if ($machineLog->getMlogMach() === $this) {
                $machineLog->setMlogMach(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MachineRecht[]
     */
    public function getMachineRechten(): Collection
    {
        return $this->machineRechten;
    }

    public function addMachineRechten(MachineRecht $machineRechten): self
    {
        if (!$this->machineRechten->contains($machineRechten)) {
            $this->machineRechten[] = $machineRechten;
            $machineRechten->setMrechMach($this);
        }

        return $this;
    }

    public function removeMachineRechten(MachineRecht $machineRechten): self
    {
        if ($this->machineRechten->contains($machineRechten)) {
            $this->machineRechten->removeElement($machineRechten);
            // set the owning side to null (unless already changed)
            if ($machineRechten->getMrechMach() === $this) {
                $machineRechten->setMrechMach(null);
            }
        }

        return $this;
    }



    /**
     * @return Collection|MachineReservatie[]
     */
    public function getMachineReservaties(): Collection
    {
        return $this->machineReservaties;
    }

    /**
     * @Groups({"machinecategorie:read"})
     * @SerializedName("machineReservaties")
     */
    public function getMachineReservatiesUpcomming()
    {
        $criteria = MachineRepository::createFilterByUpcommingCriteria();

        return $this->machineReservaties->matching($criteria);

    }

    public function addMachineReservaties(MachineReservatie $machineReservaties): self
    {
        if (!$this->machineReservaties->contains($machineReservaties)) {
            $this->machineReservaties = $machineReservaties;
            $machineReservaties->setMresMach($this);
        }

        return $this;
    }

    public function removeMachineReservaties(MachineReservatie $machineReservaties): self
    {
        if ($this->machineReservaties->contains($machineReservaties)) {
            $this->machineReservaties->removeElement($machineReservaties);
            // set the owning side to null (unless already changed)
            if ($machineReservaties->getMresMach() === $this) {
                $machineReservaties->setMresMach(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MachineLink[]
     */
    public function getMachineLinks(): Collection
    {
        return $this->machineLinks;
    }

    public function addMachineLink(MachineLink $machineLink): self
    {
        if (!$this->machineLinks->contains($machineLink)) {
            $this->machineLinks[] = $machineLink;
            $machineLink->setMlinkMach($this);
        }

        return $this;
    }

    public function removeMachineLink(MachineLink $machineLink): self
    {
        if ($this->machineLinks->contains($machineLink)) {
            $this->machineLinks->removeElement($machineLink);
            // set the owning side to null (unless already changed)
            if ($machineLink->getMlinkMach() === $this) {
                $machineLink->setMlinkMach(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MachineFile[]
     */
    public function getMachineFiles(): Collection
    {
        return $this->machineFiles;
    }

    public function addMachineFile(MachineFile $machineFile): self
    {
        if (!$this->machineFiles->contains($machineFile)) {
            $this->machineFiles[] = $machineFile;
            $machineFile->setMfileMach($this);
        }

        return $this;
    }

    public function removeMachineFile(MachineFile $machineFile): self
    {
        if ($this->machineFiles->contains($machineFile)) {
            $this->machineFiles->removeElement($machineFile);
            // set the owning side to null (unless already changed)
            if ($machineFile->getMfileMach() === $this) {
                $machineFile->setMfileMach(null);
            }
        }

        return $this;
    }

    public function getMachMat(): ?string
    {
        return $this->machMat;
    }

    public function setMachMat(string $machMat): self
    {
        $this->machMat = $machMat;

        return $this;
    }

    public function __toString()
    {
        return $this->machNaam;
    }

    public function getMachBeschikbaar(): ?bool
    {
        return $this->machBeschikbaar;
    }

    public function setMachBeschikbaar(?bool $machBeschikbaar): self
    {
        $this->machBeschikbaar = $machBeschikbaar;

        return $this;
    }


}
