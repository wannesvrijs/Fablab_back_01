<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MachineReservatieRepository;
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
 * @ORM\Entity(repositoryClass=MachineReservatieRepository::class)
 */
class MachineReservatie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"machinereservatie:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Machine::class, inversedBy="machineStaten")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"machinereservatie:read", "admin:write"})
     */
    private $mresMach;
    

    /**
     * @ORM\Column(type="date")
     * @Groups({"machinecategorie:read", "machinereservatie:read", "admin:write"})
     */
    private $mresStart;

    /**
     * @ORM\Column(type="date")
     * @Groups({"machinecategorie:read", "machinereservatie:read", "admin:write"})
     */
    private $mresStop;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"admin:read", "admin:write"})
     */
    private $mresGoogleId;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMresMach(): ?Machine
    {
        return $this->mresMach;
    }

    public function setMresMach(?Machine $mresMach): self
    {
        $this->mresMach = $mresMach;

        return $this;
    }


    public function getMresStart(): ?\DateTimeInterface
    {
        return $this->mresStart;
    }

    public function setMresStart(?\DateTimeInterface $mresStart): self
    {
        $this->mresStart = $mresStart;

        return $this;
    }

    public function getMresStop(): ?\DateTimeInterface
    {
        return $this->mresStop;
    }

    public function setMresStop(?\DateTimeInterface $mresStop): self
    {
        $this->mresStop = $mresStop;

        return $this;
    }

    public function getMresGoogleId(): ?string
    {
        return $this->mresGoogleId;
    }

    public function setMresGoogleId(?string $mresGoogleId): self
    {
        $this->mresGoogleId = $mresGoogleId;

        return $this;
    }
    

    public function __toString()
    {
        $start = $this->mresStart->format('d-m-Y');
        $stop = $this->mresStop->format('d-m-Y');
        return "$start tot $stop";
    }



}
