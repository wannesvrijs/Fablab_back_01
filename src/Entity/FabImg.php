<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FabImgRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

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
 * @Vich\Uploadable()
 * @ORM\Entity(repositoryClass=FabImgRepository::class)
 */
class FabImg
{

    use TimestampableEntity;

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


    /**
     * @Vich\UploadableField(mapping="fab_img", fileNameProperty="fabimgImgPad")
     * @Assert\Image(mimeTypes={"image/jpg", "image/jpeg", "image/png", "image/svg+xml"})
     */
    private $fabimgImgFile;


    public function getFabimgImgFile()
    {
        return $this->fabimgImgFile;
    }

    public function setFabimgImgFile($fabimgImgFile): void
    {
        $this->fabimgImgFile = $fabimgImgFile;
        $this->updatedAt = new \DateTime();
    }


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

    public function setFabimgImgPad(?string $fabimgImgPad)
    {
        $this->fabimgImgPad = $fabimgImgPad;

        return $this;
    }


    public function __toString()
    {
        return $this->fabimgImgPad;
    }
}
