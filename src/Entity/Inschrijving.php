<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\InschrijvingRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

//     TODO:

/**
 * @ApiResource(
 *     collectionOperations={"get", "post"},
 *     itemOperations={
 *          "get"={},
 *          "put",
 *          "delete"
 *     },
 *     normalizationContext={},
 *     denormalizationContext={},
 *     attributes={
 *          "pagination_items_per_page"=10,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 * )
 * @ORM\Entity(repositoryClass=InschrijvingRepository::class)
 */
class Inschrijving
{
    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="inschrijvingen")
     * @ORM\JoinColumn(nullable=false)
     */
    private $insUse;

    /**
     * @ORM\ManyToOne(targetEntity=Event::class, inversedBy="inschrijvings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $insEve;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInsUse(): ?User
    {
        return $this->insUse;
    }

    public function setInsUse(?User $insUse): self
    {
        $this->insUse = $insUse;

        return $this;
    }

    public function getInsEve(): ?Event
    {
        return $this->insEve;
    }

    public function setInsEve(?Event $insEve): self
    {
        $this->insEve = $insEve;

        return $this;
    }
}
