<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FaqRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation\Groups;

//     TODO:
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
 * @ORM\Entity(repositoryClass=FaqRepository::class)
 */
class Faq
{
    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=FaqCategorie::class, inversedBy="faqs")
     * @Groups({"faq:read","admin:write"})
     */
    private $faqFaqcat;

    /**
     * @ORM\Column(type="text")
     * @Groups({"faqcategorie:read","faq:read","admin:write"})
     */
    private $faqVraag;

    /**
     * @ORM\Column(type="text")
     * @Groups({"faqcategorie:read","faq:read","admin:write"})
     */
    private $faqAntwoord;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"admin:write"})
     */
    private $faqOrder = 50;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFaqVraag(): ?string
    {
        return $this->faqVraag;
    }

    public function setFaqVraag(string $faqVraag): self
    {
        $this->faqVraag = $faqVraag;

        return $this;
    }

    public function getFaqAntwoord(): ?string
    {
        return $this->faqAntwoord;
    }

    public function setFaqAntwoord(string $faqAntwoord): self
    {
        $this->faqAntwoord = $faqAntwoord;

        return $this;
    }

    public function getFaqFaqcat(): ?FaqCategorie
    {
        return $this->faqFaqcat;
    }

    public function setFaqFaqcat(?FaqCategorie $faqFaqcat): self
    {
        $this->faqFaqcat = $faqFaqcat;

        return $this;
    }

    public function getFaqOrder(): ?int
    {
        return $this->faqOrder;
    }

    public function setFaqOrder(int $faqOrder): self
    {
        $this->faqOrder = $faqOrder;

        return $this;
    }

    public function __toString()
    {
        return $this->faqVraag;
    }
}
