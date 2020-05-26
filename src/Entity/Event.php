<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

//  TODO:
/**
 * @ApiResource(
 *     collectionOperations={},
 *     itemOperations={},
 *     normalizationContext={},
 *     denormalizationContext={},
 *     attributes={
 *          "pagination_items_per_page"=10,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 * )
 * @ORM\Entity(repositoryClass=EventRepository::class)
 */
class Event
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
     */
    private $eveTitel;

    /**
     * @ORM\Column(type="text")
     */
    private $eveOmschrijving;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $eveImgPad;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $eveImgAlt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $eveMaxPers;

    /**
     * @ORM\Column(type="datetime")
     */
    private $eveStart;

    /**
     * @ORM\Column(type="datetime")
     */
    private $eveStop;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $evePrijs;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $eveGoogleId;

    /**
     * @ORM\OneToMany(targetEntity=Inschrijving::class, mappedBy="InsEve")
     */
    private $inschrijvings;

    public function __construct()
    {
        $this->inschrijvings = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEveTitel(): ?string
    {
        return $this->eveTitel;
    }

    public function setEveTitel(string $eveTitel): self
    {
        $this->eveTitel = $eveTitel;

        return $this;
    }

    public function getEveOmschrijving(): ?string
    {
        return $this->eveOmschrijving;
    }

    public function setEveOmschrijving(string $eveOmschrijving): self
    {
        $this->eveOmschrijving = $eveOmschrijving;

        return $this;
    }

    public function getEveImgPad(): ?string
    {
        return $this->eveImgPad;
    }

    public function setEveImgPad(?string $eveImgPad): self
    {
        $this->eveImgPad = $eveImgPad;

        return $this;
    }

    public function getEveImgAlt(): ?string
    {
        return $this->eveImgAlt;
    }

    public function setEveImgAlt(?string $eveImgAlt): self
    {
        $this->eveImgAlt = $eveImgAlt;

        return $this;
    }

    public function getEveMaxPers(): ?int
    {
        return $this->eveMaxPers;
    }

    public function setEveMaxPers(?int $eveMaxPers): self
    {
        $this->eveMaxPers = $eveMaxPers;

        return $this;
    }

    public function getEveStart(): ?\DateTimeInterface
    {
        return $this->eveStart;
    }

    public function setEveStart(\DateTimeInterface $eveStart): self
    {
        $this->eveStart = $eveStart;

        return $this;
    }

    public function getEveStop(): ?\DateTimeInterface
    {
        return $this->eveStop;
    }

    public function setEveStop(\DateTimeInterface $eveStop): self
    {
        $this->eveStop = $eveStop;

        return $this;
    }

    public function getEvePrijs(): ?int
    {
        return $this->evePrijs;
    }

    public function setEvePrijs(?int $evePrijs): self
    {
        $this->evePrijs = $evePrijs;

        return $this;
    }

    public function getEveGoogleId(): ?string
    {
        return $this->eveGoogleId;
    }

    public function setEveGoogleId(string $eveGoogleId): self
    {
        $this->eveGoogleId = $eveGoogleId;

        return $this;
    }

    /**
     * @return Collection|Inschrijving[]
     */
    public function getInschrijvings(): Collection
    {
        return $this->inschrijvings;
    }

    public function addInschrijving(Inschrijving $inschrijving): self
    {
        if (!$this->inschrijvings->contains($inschrijving)) {
            $this->inschrijvings[] = $inschrijving;
            $inschrijving->setInsEve($this);
        }

        return $this;
    }

    public function removeInschrijving(Inschrijving $inschrijving): self
    {
        if ($this->inschrijvings->contains($inschrijving)) {
            $this->inschrijvings->removeElement($inschrijving);
            // set the owning side to null (unless already changed)
            if ($inschrijving->getInsEve() === $this) {
                $inschrijving->setInsEve(null);
            }
        }

        return $this;
    }

}
