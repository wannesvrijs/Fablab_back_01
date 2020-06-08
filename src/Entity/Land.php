<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"},
 *     normalizationContext={},
 *     denormalizationContext={},
 *     attributes={
 *          "pagination_items_per_page"=10,
 *          "formats"={"jsonld", "json", "html", "jsonhal", "csv"={"text/csv"}}
 *     }
 * )
 * @ORM\Entity(repositoryClass=LandRepository::class)
 */
class Land
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"land:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
     * @Groups({"land:read"})
     */
    private $landNaam;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLandNaam(): ?string
    {
        return $this->landNaam;
    }

    public function setLandNaam(string $landNaam): self
    {
        $this->landNaam = $landNaam;

        return $this;
    }

    public function __toString() :string
    {
        return $this->landNaam;
    }

}
