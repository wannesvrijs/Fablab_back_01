<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FabmomentRepository;
use App\Validator\IsValidOwner;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

//     TODO:

/**
 * @ApiResource(
 *     collectionOperations={
 *          "get",
 *          "post"={"security"="is_granted('ROLE_USER')"}
 *      },
 *     itemOperations={
 *          "get"={},
 *          "put"={"security"="is_granted('EDIT', object)",
 *              "security_message"="Only the creator or admin can edit a FabMoment"},
 *          "delete"={"security"="is_granted('EDIT', object)",
 *              "security_message"="Only the creator or admin can edit a FabMoment"},
 *     },
 *     attributes={
 *          "pagination_items_per_page"=12,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 * )
 * @ApiFilter(BooleanFilter::class, properties={"fabIsPosted"})
 * @ApiFilter(SearchFilter::class, properties={
 *     "fabTitel": "partial",
 *     "fabOmschrijving": "partial",
 *     "fabMats.fabmatMat.matNaam": "exact",
 *     "fabMaches.fabmachMach.machMcat.mcatNaam": "exact",
 *     "fabUse.id": "exact",
 * })
 * @ORM\Entity(repositoryClass=FabmomentRepository::class)
 * @ORM\EntityListeners({"App\Doctrine\FabmomentSetUserListener"})
 */
class Fabmoment
{
    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="fabmoments")
     * @IsValidOwner()
     */
    private $fabUse;

    /**
     * @ORM\Column(type="string", length=120)
     * @Groups({"fabmoment:read", "fabmoment:write"})
     */
    private $fabTitel;

    /**
     * @ORM\Column(type="text")
     * @Groups({"fabmoment:read", "fabmoment:write"})
     */
    private $fabOmschrijving;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"fabmoment:read", "fabmoment:write"})
     */
    private $fabDatum;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"fabmoment:read"})
     */
    private $fabIsPosted = false;

    /**
     * @ORM\Column(type="string", length=120)
     * @Gedmo\Slug(fields={"fabTitel"})
     * @Groups({"fabmoment:read"})
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=FabImg::class, mappedBy="fabimgFab",cascade={"persist"}, orphanRemoval=true)
     * @Groups({"fabmoment:read"})
     */
    private $fabImgs;

    /**
     * @ORM\OneToMany(targetEntity=FabMach::class, mappedBy="fabmachFab", cascade={"persist"}, orphanRemoval=true)
     * @Groups({"fabmoment:read", "fabmoment:write"})
     */
    private $fabMaches;

    /**
     * @ORM\OneToMany(targetEntity=FabMat::class, mappedBy="fabmatFab", cascade={"persist"}, orphanRemoval=true)
     * @Groups({"fabmoment:read", "fabmoment:write"})
     */
    private $fabMats;

    /**
     * @ORM\OneToMany(targetEntity=FabFile::class, mappedBy="fabfileFab", cascade={"persist"}, orphanRemoval=true)
     * @Groups({"fabmoment:item:read"})
     */
    private $fabFiles;



    public function __construct()
    {
        $this->fabImgs = new ArrayCollection();
        $this->fabMaches = new ArrayCollection();
        $this->fabMats = new ArrayCollection();
        $this->fabFiles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFabUse(): ?User
    {
        return $this->fabUse;
    }

    public function setFabUse(?User $fabUse): self
    {
        $this->fabUse = $fabUse;

        return $this;
    }

    public function getFabTitel(): ?string
    {
        return $this->fabTitel;
    }

    public function setFabTitel(string $fabTitel): self
    {
        $this->fabTitel = $fabTitel;

        return $this;
    }

    public function getFabOmschrijving(): ?string
    {
        return $this->fabOmschrijving;
    }

    public function setFabOmschrijving(string $fabOmschrijving): self
    {
        $this->fabOmschrijving = $fabOmschrijving;

        return $this;
    }

    public function getFabDatum(): ?\DateTimeInterface
    {
        return $this->fabDatum;
    }

    public function setFabDatum(?\DateTimeInterface $fabDatum): self
    {
        $this->fabDatum = $fabDatum;

        return $this;
    }

    public function getFabIsPosted(): ?bool
    {
        return $this->fabIsPosted;
    }

    public function setFabIsPosted(bool $fabIsPosted): self
    {
        $this->fabIsPosted = $fabIsPosted;

        return $this;
    }


    /**
     * @return Collection|FabImg[]
     */
    public function getFabImgs(): Collection
    {
        return $this->fabImgs;
    }

    public function addFabImg(FabImg $fabImg): self
    {
        if (!$this->fabImgs->contains($fabImg)) {
            $this->fabImgs[] = $fabImg;
            $fabImg->setFabimgFab($this);
        }

        return $this;
    }

    public function removeFabImg(FabImg $fabImg): self
    {
        if ($this->fabImgs->contains($fabImg)) {
            $this->fabImgs->removeElement($fabImg);
            // set the owning side to null (unless already changed)
            if ($fabImg->getFabimgFab() === $this) {
                $fabImg->setFabimgFab(null);
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
            $fabMach->setFabmachFab($this);
        }

        return $this;
    }

    public function removeFabMach(FabMach $fabMach): self
    {
        if ($this->fabMaches->contains($fabMach)) {
            $this->fabMaches->removeElement($fabMach);
            // set the owning side to null (unless already changed)
            if ($fabMach->getFabmachFab() === $this) {
                $fabMach->setFabmachFab(null);
            }
        }

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
            $fabMat->setFabmatFab($this);
        }

        return $this;
    }

    public function removeFabMat(FabMat $fabMat): self
    {
        if ($this->fabMats->contains($fabMat)) {
            $this->fabMats->removeElement($fabMat);
            // set the owning side to null (unless already changed)
            if ($fabMat->getFabmatFab() === $this) {
                $fabMat->setFabmatFab(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FabFile[]
     */
    public function getFabFiles(): Collection
    {
        return $this->fabFiles;
    }

    public function addFabFile(FabFile $fabFile): self
    {
        if (!$this->fabFiles->contains($fabFile)) {
            $this->fabFiles[] = $fabFile;
            $fabFile->setFabfileFab($this);
        }

        return $this;
    }

    public function removeFabFile(FabFile $fabFile): self
    {
        if ($this->fabFiles->contains($fabFile)) {
            $this->fabFiles->removeElement($fabFile);
            // set the owning side to null (unless already changed)
            if ($fabFile->getFabfileFab() === $this) {
                $fabFile->setFabfileFab(null);
            }
        }

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function __toString()
    {
        return $this->fabTitel;
    }

}
