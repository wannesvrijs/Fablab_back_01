<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FabMatRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

//     TODO:
/**
 * @ApiResource(
 *     itemOperations={
 *          "get",
 *          "put"={"security"="is_granted('ROLE_USER')"},
 *          "delete"={"security"="is_granted('ROLE_USER')"}
 *     },
 *     collectionOperations={
 *          "get"= {},
 *          "post"={"security"="is_granted('ROLE_USER')"}
 *     },
 *     attributes={
 *          "pagination_items_per_page"=10,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 * )
 * @ORM\Entity(repositoryClass=FabMatRepository::class)
 */
class FabMat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Fabmoment::class, inversedBy="fabMats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fabmatFab;

    /**
     * @ORM\ManyToOne(targetEntity=Materiaal::class, inversedBy="fabMats")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"fabmoment:item:read", "fabmoment:write"})
     */
    private $fabmatMat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFabmatFab(): ?Fabmoment
    {
        return $this->fabmatFab;
    }

    public function setFabmatFab(?Fabmoment $fabmatFab): self
    {
        $this->fabmatFab = $fabmatFab;

        return $this;
    }

    public function getFabmatMat(): ?Materiaal
    {
        return $this->fabmatMat;
    }

    public function setFabmatMat(?Materiaal $fabmatMat): self
    {
        $this->fabmatMat = $fabmatMat;

        return $this;
    }
}
