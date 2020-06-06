<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FaqCategorieRepository;
use App\Repository\ShopCategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

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
 * @ORM\Entity(repositoryClass=FaqCategorieRepository::class)
 */
class FaqCategorie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"faqcategorie:read","admin:write"})
     */
    private $faqcatNaam;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"admin:write"})
     */
    private $faqcatOrder = 50;

    /**
     * @ORM\OneToMany(targetEntity=Faq::class, mappedBy="faqFaqcat")
     * @Groups({"faqcategorie:read","admin:write"})
     */
    private $faqs;

    public function __construct()
    {
        $this->faqs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFaqcatNaam(): ?string
    {
        return $this->faqcatNaam;
    }

    public function setFaqcatNaam(string $faqcatNaam): self
    {
        $this->faqcatNaam = $faqcatNaam;

        return $this;
    }

    /**
     * @return Collection|Faq[]
     */
    public function getFaqs(): Collection
    {
        return $this->faqs;
    }

    /**
     * @SerializedName("faqs")
     * @Groups({"faqcategorie:read"})
     */
    public function getShopmaterialenOrdered()
    {
        $criteria = FaqCategorieRepository::createOrderedByOrderCriteria();

        return $this->faqs->matching($criteria);
    }

    public function addFaq(Faq $faq): self
    {
        if (!$this->faqs->contains($faq)) {
            $this->faqs[] = $faq;
            $faq->setFaqFaqcat($this);
        }

        return $this;
    }

    public function removeFaq(Faq $faq): self
    {
        if ($this->faqs->contains($faq)) {
            $this->faqs->removeElement($faq);
            // set the owning side to null (unless already changed)
            if ($faq->getFaqFaqcat() === $this) {
                $faq->setFaqFaqcat(null);
            }
        }

        return $this;
    }

    public function getFaqcatOrder(): ?int
    {
        return $this->faqcatOrder;
    }

    public function setFaqcatOrder(int $faqcatOrder): self
    {
        $this->faqcatOrder = $faqcatOrder;

        return $this;
    }

    public function __toString()
    {
        return $this->faqcatNaam;
    }
}
