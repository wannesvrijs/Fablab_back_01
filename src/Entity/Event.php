<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation\Groups;

//  TODO:
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
 * @ORM\Entity(repositoryClass=EventRepository::class)
 */
class Event
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
     * @ORM\Column(type="string", length=255)
     * @Groups({"event:read", "inschrijving:read", "admin:write"})
     */
    private $eveTitel;

    /**
     * @ORM\Column(type="text")
     * @Groups({"event:read", "admin:write"})
     */
    private $eveOmschrijving;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"event:read", "admin:write"})
     */
    private $eveImgPad;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"event:read", "admin:write"})
     */
    private $eveImgAlt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"event:read", "admin:write"})
     */
    private $eveMaxPers;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"event:read", "inschrijving:read", "admin:write"})
     */
    private $eveStart;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"event:read", "inschrijving:read", "admin:write"})
     */
    private $eveStop;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"event:read", "inschrijving:read", "admin:write"})
     */
    private $evePrijs;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"admin:read"})
     */
    private $eveGoogleId;

    /**
     * @ORM\OneToMany(targetEntity=Inschrijving::class, mappedBy="insEve")
     * @Groups({"event:read"})
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
