<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MachineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
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
 *     normalizationContext={},
 *     denormalizationContext={},
 *     attributes={
 *          "pagination_items_per_page"=10,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 * )
 * @ORM\Entity(repositoryClass=MachineRepository::class)
 */
class Machine
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=MachineCategorie::class, inversedBy="machines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $machMcat;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"machine_detail:read"})
     */
    private $machNaam;

    /**
     * @ORM\Column(type="text")
     * @Groups({"machine_detail:read"})
     */
    private $machOmschrijving;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"machine_detail:read"})
     */
    private $machAfmeting;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"machine_detail:read"})
     */
    private $machFiles;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"machine_detail:read"})
     */
    private $machMat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"machine_detail:read"})
     */
    private $machImgPad;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"machine_detail:read"})
     */
    private $machImgAlt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"machine_detail:read"})
     */
    private $machVideoPad;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"machine_detail:read"})
     */
    private $machVideoTitle;

    /**
     * @ORM\OneToMany(targetEntity=MachineLog::class, mappedBy="mlogMach")
     * @Groups({"machine_detail:read"})
     */
    private $machineLogs;

    /**
     * @ORM\OneToMany(targetEntity=MachineRecht::class, mappedBy="mrechMach")
     */
    private $machineRechten;

    /**
     * @ORM\OneToMany(targetEntity=FabMach::class, mappedBy="fabmachMach")
     */
    private $fabMaches;

    /**
     * @ORM\OneToMany(targetEntity=MachineStaat::class, mappedBy="mstaatMach")
     * @Groups({"machine_detail:read"})
     */
    private $machineStaten;

    /**
     * @ORM\OneToMany(targetEntity=MachineLink::class, mappedBy="mlinkMach")
     * @Groups({"machine_detail:read"})
     */
    private $machineLinks;

    /**
     * @ORM\OneToMany(targetEntity=MachineFile::class, mappedBy="mfileMach")
     * @Groups({"machine_detail:read"})
     */
    private $machineFiles;



    public function __construct()
    {
        $this->machineLogs = new ArrayCollection();
        $this->machineRechten = new ArrayCollection();
        $this->fabMaches = new ArrayCollection();
        $this->machineStaten = new ArrayCollection();
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

    public function setMachImgPad(?string $machImgPad): self
    {
        $this->machImgPad = $machImgPad;

        return $this;
    }

    public function getMachImgAlt(): ?string
    {
        return $this->machImgAlt;
    }

    public function setMachImgAlt(?string $machImgAlt): self
    {
        $this->machImgAlt = $machImgAlt;

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
     * @return Collection|FabMach[]
     */
    public function getFabMaches(): Collection
    {
        return $this->fabMaches;
    }

    public function addFabMach(FabMach $fabMach): self
    {
        if (!$this->fabMaches->contains($fabMach)) {
            $this->fabMaches[] = $fabMach;
            $fabMach->setFabmachMach($this);
        }

        return $this;
    }

    public function removeFabMach(FabMach $fabMach): self
    {
        if ($this->fabMaches->contains($fabMach)) {
            $this->fabMaches->removeElement($fabMach);
            // set the owning side to null (unless already changed)
            if ($fabMach->getFabmachMach() === $this) {
                $fabMach->setFabmachMach(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MachineStaat[]
     */
    public function getMachineStaten(): Collection
    {
        return $this->machineStaten;
    }

    public function addMachineStaten(MachineStaat $machineStaten): self
    {
        if (!$this->machineStaten->contains($machineStaten)) {
            $this->machineStaten[] = $machineStaten;
            $machineStaten->setMstaatMach($this);
        }

        return $this;
    }

    public function removeMachineStaten(MachineStaat $machineStaten): self
    {
        if ($this->machineStaten->contains($machineStaten)) {
            $this->machineStaten->removeElement($machineStaten);
            // set the owning side to null (unless already changed)
            if ($machineStaten->getMstaatMach() === $this) {
                $machineStaten->setMstaatMach(null);
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


}
