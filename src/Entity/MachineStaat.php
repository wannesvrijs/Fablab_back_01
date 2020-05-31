<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MachineStaatRepository;
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
 * @ORM\Entity(repositoryClass=MachineStaatRepository::class)
 */
class MachineStaat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"machinestaat:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Machine::class, inversedBy="machineStaten")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"machinestaat:read", "admin:write"})
     */
    private $mstaatMach;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"machinecategorie:read", "machinestaat:read", "admin:write"})
     */
    private $mstaatStatus;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"machinecategorie:read", "machinestaat:read", "admin:write"})
     */
    private $mstaatStart;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"machinecategorie:read", "machinestaat:read", "admin:write"})
     */
    private $mstaatStop;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"admin:read", "admin:write"})
     */
    private $mstaatGoogleId;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMstaatMach(): ?Machine
    {
        return $this->mstaatMach;
    }

    public function setMstaatMach(?Machine $mstaatMach): self
    {
        $this->mstaatMach = $mstaatMach;

        return $this;
    }


    public function getMstaatStart(): ?\DateTimeInterface
    {
        return $this->mstaatStart;
    }

    public function setMstaatStart(?\DateTimeInterface $mstaatStart): self
    {
        $this->mstaatStart = $mstaatStart;

        return $this;
    }

    public function getMstaatStop(): ?\DateTimeInterface
    {
        return $this->mstaatStop;
    }

    public function setMstaatStop(?\DateTimeInterface $mstaatStop): self
    {
        $this->mstaatStop = $mstaatStop;

        return $this;
    }

    public function getMstaatGoogleId(): ?string
    {
        return $this->mstaatGoogleId;
    }

    public function setMstaatGoogleId(?string $mstaatGoogleId): self
    {
        $this->mstaatGoogleId = $mstaatGoogleId;

        return $this;
    }


    public function getMstaatStatus(): ?string
    {
        return $this->mstaatStatus;
    }

    public function setMstaatStatus(string $mstaatStatus): self
    {
        $this->mstaatStatus = $mstaatStatus;

        return $this;
    }

    public function __toString()
    {
        return $this->mstaatStatus;
    }

}
