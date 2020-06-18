<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FabImgRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\CreateFabImgObjectAction;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

//     TODO:MAKE ONLY USER RELATED TO IMAGES ABLE TO DELETE AND PUT EM
/**
 * @ApiResource(
 *     collectionOperations={
 *          "get"={"security"="is_granted('ROLE_ADMIN')"},
 *          "post"={
 *             "controller"=CreateFabImgObjectAction::class,
 *             "deserialize"=false,
 *             "validation_groups"={"Default", "fabImg_object_create"},
 *             "security"="is_granted('ROLE_USER')"
 *          }},
 *     itemOperations={
 *          "get"={"security"="is_granted('ROLE_ADMIN')"},
 *          "put"={"security"="is_granted('ROLE_USER')"},
 *          "delete"={"security"="is_granted('ROLE_USER')"}
 *     },
 *     normalizationContext={
 *         "groups"={"fabImg_object_read"}
 *     },
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
     * @Groups({"fabImg_object_create", "fabimg:write"})
     */
    private $fabimgFab;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"fabmoment:read"})
     */
    public $fabimgImgPad;


    /**
     * @var File|null
     *
     * @Assert\NotNull(groups={"fabImg_object_create"})
     * @Vich\UploadableField(mapping="fab_img", fileNameProperty="fabimgImgPad")
     * @Assert\Image(mimeTypes={"image/jpg", "image/jpeg", "image/png"})
     * @Groups({"fabimg:write"})
     */
    public $fabimgImgFile;


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
