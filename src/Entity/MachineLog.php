<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MachineLogRepository;
use Doctrine\ORM\Mapping as ORM;

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
 * @ORM\Entity(repositoryClass=MachineLogRepository::class)
 */
class MachineLog
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="machineLogs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mlogUse;

    /**
     * @ORM\ManyToOne(targetEntity=Machine::class, inversedBy="machineLogs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mlogMach;

    /**
     * @ORM\Column(type="datetime")
     */
    private $mlogIn;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $mlogUit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMlogUse(): ?User
    {
        return $this->mlogUse;
    }

    public function setMlogUse(?User $mlogUse): self
    {
        $this->mlogUse = $mlogUse;

        return $this;
    }

    public function getMlogMach(): ?Machine
    {
        return $this->mlogMach;
    }

    public function setMlogMach(?Machine $mlogMach): self
    {
        $this->mlogMach = $mlogMach;

        return $this;
    }

    public function getMlogIn(): ?\DateTimeInterface
    {
        return $this->mlogIn;
    }

    public function setMlogIn(\DateTimeInterface $mlogIn): self
    {
        $this->mlogIn = $mlogIn;

        return $this;
    }

    public function getMlogUit(): ?\DateTimeInterface
    {
        return $this->mlogUit;
    }

    public function setMlogUit(?\DateTimeInterface $mlogUit): self
    {
        $this->mlogUit = $mlogUit;

        return $this;
    }
}
