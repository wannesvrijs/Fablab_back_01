<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\InschrijvingRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     attributes={"security"="is_granted('ROLE_USER')"},
 *     itemOperations={
 *          "get"={"security"="is_granted('EDIT', object)"},
 *          "put"={"security"="is_granted('ROLE_ADMIN')"},
 *          "delete"={"security"="is_granted('EDIT', object)"}
 *     },
 *     collectionOperations={
 *          "get"= {},
 *          "post"={}
 *     },
 *     attributes={
 *          "pagination_items_per_page"=10,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 * )
 * @ORM\Entity(repositoryClass=InschrijvingRepository::class)
 * @ORM\EntityListeners({"App\Doctrine\InschrijvingSetUserListener"})
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
     * @Groups({"event:read", "inschrijving:read"})
     */
    private $insUse;

    /**
     * @ORM\ManyToOne(targetEntity=Event::class, inversedBy="inschrijvings")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"inschrijving:read", "inschrijving:write"})
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

    public function __toString()
    {
        return "$this->insUse";
    }
}
