<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FabMachRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

//     TODO:
/**
 * @ApiResource(
 *     collectionOperations={"get", "post"},
 *     itemOperations={
 *          "get"={},
 *          "put",
 *          "delete"
 *     },
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
     * @ORM\ManyToOne(targetEntity=Fabmoment::class, inversedBy="fabMaches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fabmachFab;

    /**
     * @ORM\ManyToOne(targetEntity=MachineCategorie::class, inversedBy="fabMaches")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"fabmoment:write", "fabmoment:read"})
     */
    private $fabmachMcat;



    public function getId(): ?int
    {
        return $this->id;
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

    public function getFabmachMcat(): ?MachineCategorie
    {
        return $this->fabmachMcat;
    }

    public function setFabmachMcat(?MachineCategorie $fabmachMcat): self
    {
        $this->fabmachMcat = $fabmachMcat;

        return $this;
    }

    public function __toString()
    {
        return "$this->fabmachMcat";
    }
}
