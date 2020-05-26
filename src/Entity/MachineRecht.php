<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MachineRechtRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
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
 *     normalizationContext={},
 *     denormalizationContext={},
 *     attributes={
 *          "pagination_items_per_page"=10,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 * )
 * @ORM\Entity(repositoryClass=MachineRechtRepository::class)
 */
class MachineRecht
{

    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="machineRechten")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mrechtUse;

    /**
     * @ORM\ManyToOne(targetEntity=Machine::class, inversedBy="machineRechten")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mrechMach;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMrechtUse(): ?User
    {
        return $this->mrechtUse;
    }

    public function setMrechtUse(?User $mrechtUse): self
    {
        $this->mrechtUse = $mrechtUse;

        return $this;
    }

    public function getMrechMach(): ?Machine
    {
        return $this->mrechMach;
    }

    public function setMrechMach(?Machine $mrechMach): self
    {
        $this->mrechMach = $mrechMach;

        return $this;
    }
}
