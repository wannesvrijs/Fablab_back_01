<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NieuwsRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
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
 * @ORM\Entity(repositoryClass=NieuwsRepository::class)
 */
class Nieuws
{
    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"admin:write","nieuws:read"})
     */
    private $nwsTitel;

    /**
     * @ORM\Column(type="text")
     * @Groups({"admin:write","nieuws:read"})
     */
    private $nwsOmschrijving;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"admin:write","nieuws:read"})
     */
    private $nwsStart;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"admin:write","nieuws:read"})
     */
    private $nwsStop;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"admin:write","admin:read"})
     */
    private $nwsGoogleId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNwsTitel(): ?string
    {
        return $this->nwsTitel;
    }

    public function setNwsTitel(string $nwsTitel): self
    {
        $this->nwsTitel = $nwsTitel;

        return $this;
    }

    public function getNwsOmschrijving(): ?string
    {
        return $this->nwsOmschrijving;
    }

    public function setNwsOmschrijving(string $nwsOmschrijving): self
    {
        $this->nwsOmschrijving = $nwsOmschrijving;

        return $this;
    }


    public function getNwsStart(): ?\DateTimeInterface
    {
        return $this->nwsStart;
    }

    public function setNwsStart($nwsStart): self
    {
        try {
            $this->nwsStart = new \DateTime($nwsStart);
        }
        catch(\Exception $e) {
            //Do Nothing
        }

        return $this;
    }

    public function getNwsStop(): ?\DateTimeInterface
    {
        return $this->nwsStop;
    }

    public function setNwsStop($nwsStop): self
    {
        try {
            $this->nwsStop = new \DateTime($nwsStop);
        }
        catch(\Exception $e) {
            //Do Nothing
        }

        return $this;
    }

    public function getNwsGoogleId(): ?string
    {
        return $this->nwsGoogleId;
    }

    public function setNwsGoogleId(string $nwsGoogleId): self
    {
        $this->nwsGoogleId = $nwsGoogleId;

        return $this;
    }
    public function __toString()
    {
        return $this->nwsTitel;
    }
}
