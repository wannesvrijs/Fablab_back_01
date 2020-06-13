<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FabImgRepository;
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
 *     normalizationContext={},
 *     denormalizationContext={},
 *     attributes={
 *          "pagination_items_per_page"=10,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 * )
 * @ORM\Entity(repositoryClass=FabImgRepository::class)
 */
class FabImg
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"fabmoment:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Fabmoment::class, inversedBy="fabImgs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fabimgFab;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"fabmoment:read"})
     */
    private $fabimgImgPad;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFabimgFab(): ?Fabmoment
    {
        return $this->fabimgFab;
    }

    public function setFabimgFab(?Fabmoment $fabimgFab): self
    {
        $this->fabimgFab = $fabimgFab;

        return $this;
    }

    public function getFabimgImgPad(): ?string
    {
        return $this->fabimgImgPad;
    }

    public function setFabimgImgPad(string $fabimgImgPad): self
    {
        $this->fabimgImgPad = $fabimgImgPad;

        return $this;
    }


    public function __toString()
    {
        return $this->fabimgImgPad;
    }
}
