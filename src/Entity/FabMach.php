<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FabMachRepository;
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
 * @ORM\Entity(repositoryClass=FabMachRepository::class)
 */
class FabMach
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Machine::class, inversedBy="fabMaches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fabmachMach;

    /**
     * @ORM\ManyToOne(targetEntity=Fabmoment::class, inversedBy="fabMaches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fabmachFab;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFabmachMach(): ?Machine
    {
        return $this->fabmachMach;
    }

    public function setFabmachMach(?Machine $fabmachMach): self
    {
        $this->fabmachMach = $fabmachMach;

        return $this;
    }

    public function getFabmachFab(): ?Fabmoment
    {
        return $this->fabmachFab;
    }

    public function setFabmachFab(?Fabmoment $fabmachFab): self
    {
        $this->fabmachFab = $fabmachFab;

        return $this;
    }
}
