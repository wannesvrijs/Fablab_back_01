<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MachineLinkRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
 * @ORM\Entity(repositoryClass=MachineLinkRepository::class)
 */
class MachineLink
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"machinelink:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Machine::class, inversedBy="machineLinks")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"machinelink:read","admin:write"})
     */
    private $mlinkMach;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     * @Groups({"machinecategorie:item:read", "machinelink:read", "admin:write"})
     */
    private $mlinkTitel;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"machinecategorie:item:read", "machinelink:read", "admin:write"})
     */
    private $mlinkPad;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMlinkMach(): ?Machine
    {
        return $this->mlinkMach;
    }

    public function setMlinkMach(?Machine $mlinkMach): self
    {
        $this->mlinkMach = $mlinkMach;

        return $this;
    }

    public function getMlinkTitel(): ?string
    {
        return $this->mlinkTitel;
    }

    public function setMlinkTitel(string $mlinkTitel): self
    {
        $this->mlinkTitel = $mlinkTitel;

        return $this;
    }

    public function getMlinkPad(): ?string
    {
        return $this->mlinkPad;
    }

    public function setMlinkPad(string $mlinkPad): self
    {
        $this->mlinkPad = $mlinkPad;

        return $this;
    }

    public function __toString()
    {
        return $this->mlinkTitel;
    }
}
