<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FabFileRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

//     TODO:

/**
 * @ApiResource(
 *     itemOperations={
 *          "get",
 *          "put"={"security"="is_granted('ROLE_ADMIN')"},
 *          "delete"={"security"="is_granted('ROLE_ADMIN')"}
 *     },
 *     collectionOperations={},
 *     normalizationContext={},
 *     denormalizationContext={},
 *     attributes={
 *          "pagination_items_per_page"=10,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 * )
 * @ORM\Entity(repositoryClass=FabFileRepository::class)
 */
class FabFile
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Fabmoment::class, inversedBy="fabFiles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fabfileFab;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"fabmoment:item:read"})
     */
    private $fabfileOmschrijving;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"fabmoment:item:read"})
     */
    private $fabfilePad;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFabfileFab(): ?Fabmoment
    {
        return $this->fabfileFab;
    }

    public function setFabfileFab(?Fabmoment $fabfileFab): self
    {
        $this->fabfileFab = $fabfileFab;

        return $this;
    }

    public function getFabfileOmschrijving(): ?string
    {
        return $this->fabfileOmschrijving;
    }

    public function setFabfileOmschrijving(?string $fabfileOmschrijving): self
    {
        $this->fabfileOmschrijving = $fabfileOmschrijving;

        return $this;
    }

    public function getFabfilePad(): ?string
    {
        return $this->fabfilePad;
    }

    public function setFabfilePad(string $fabfilePad): self
    {
        $this->fabfilePad = $fabfilePad;

        return $this;
    }

    public function __toString()
    {
        return $this->fabfilePad;
    }
}
