<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MachineFileRepository;
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
 * @ORM\Entity(repositoryClass=MachineFileRepository::class)
 */
class MachineFile
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Machine::class, inversedBy="machineFiles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mfileMach;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"machine_detail:read"})
     */
    private $mfileTitel;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"machine_detail:read"})
     */
    private $mfilePad;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMfileMach(): ?Machine
    {
        return $this->mfileMach;
    }

    public function setMfileMach(?Machine $mfileMach): self
    {
        $this->mfileMach = $mfileMach;

        return $this;
    }

    public function getMfileTitel(): ?string
    {
        return $this->mfileTitel;
    }

    public function setMfileTitel(?string $mfileTitel): self
    {
        $this->mfileTitel = $mfileTitel;

        return $this;
    }

    public function getMfilePad(): ?string
    {
        return $this->mfilePad;
    }

    public function setMfilePad(string $mfilePad): self
    {
        $this->mfilePad = $mfilePad;

        return $this;
    }
}
