<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

//     TODO:

/**
 * @ApiResource(
 *     attributes={"security"="is_granted('ROLE_USER')"},
 *     collectionOperations={
 *          "get"={"security"="is_granted('ROLE_ADMIN')"},
 *          "post"={
 *              "security"="is_granted('IS_AUTHENTICATED_ANONYMOUSLY')",
 *              "validation_groups"={"Default", "create"}
 *          },
 *     },
 *     itemOperations={
 *          "get"={},
 *          "put"={"security"="is_granted('ROLE_USER') and object == user",
 *              "security_message"="You can only update your own account"},
 *          "delete"={"security"="is_granted('ROLE_ADMIN')"}
 *     },
 * )
 * @ApiFilter(PropertyFilter::class)
 * @UniqueEntity(fields={"username"})
 * @UniqueEntity(fields={"email"})
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"admin:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Land::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"user:read", "user:write"})
     */
    private $useLand;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"user:read", "user:write"})
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     * @Groups({"admin:write"})
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @Groups({"user:write"})
     * @SerializedName("password")
     * @Assert\NotBlank(groups={"create"})
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $useVn;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $useAn;

    /**
     * @ORM\Column(type="date")
     */
    private $useGeboorte;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $useGemeente;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $usePostcode;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $useBeroep;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $useSchool;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $useRichting;

    /**
     * @ORM\Column(type="boolean")
     */
    private $useIsActief;

    /**
     * @ORM\Column(type="integer")
     */
    private $useFabworthy;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $useRegkey;

    /**
     * @ORM\Column(type="boolean")
     */
    private $useIsBlocked;

    /**
     * @ORM\Column(type="boolean")
     */
    private $useIsDeleted;

    /**
     * @ORM\OneToMany(targetEntity=MachineLog::class, mappedBy="mlogUse")
     */
    private $machineLogs;

    /**
     * @ORM\OneToMany(targetEntity=MachineRecht::class, mappedBy="mrechtUse")
     */
    private $machineRechten;

    /**
     * @ORM\OneToMany(targetEntity=Fabmoment::class, mappedBy="fabUse")
     */
    private $fabmoments;

    /**
     * @ORM\OneToMany(targetEntity=Inschrijving::class, mappedBy="insUse")
     */
    private $inschrijvingen;

//    /**
//     * @ORM\OneToMany(targetEntity="App\Entity\CheeseListing", mappedBy="owner", cascade={"persist"}, orphanRemoval=true)
//     * @Groups({"user:write"})
//     * @Assert\Valid()
//     */
//    private $cheeseListings;
//
//    /**
//     * @ORM\Column(type="string", length=50, nullable=true)
//     * @Groups({"admin:read", "user:write"})
//     */
//    private $phoneNumber;

    public function __construct()
    {
        $this->machineLogs = new ArrayCollection();
        $this->machineRechten = new ArrayCollection();
        $this->fabmoments = new ArrayCollection();
        $this->inschrijvingen = new ArrayCollection();
//        $this->cheeseListings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
         $this->plainPassword = null;
    }

    public function getUseVn(): ?string
    {
        return $this->useVn;
    }

    public function setUseVn(string $useVn): self
    {
        $this->useVn = $useVn;

        return $this;
    }

    public function getUseAn(): ?string
    {
        return $this->useAn;
    }

    public function setUseAn(string $useAn): self
    {
        $this->useAn = $useAn;

        return $this;
    }

    public function getUseGeboorte(): ?\DateTimeInterface
    {
        return $this->useGeboorte;
    }

    public function setUseGeboorte(\DateTimeInterface $useGeboorte): self
    {
        $this->useGeboorte = $useGeboorte;

        return $this;
    }


    public function getUseGemeente(): ?string
    {
        return $this->useGemeente;
    }

    public function setUseGemeente(?string $useGemeente): self
    {
        $this->useGemeente = $useGemeente;

        return $this;
    }

    public function getUsePostcode(): ?string
    {
        return $this->usePostcode;
    }

    public function setUsePostcode(?string $usePostcode): self
    {
        $this->usePostcode = $usePostcode;

        return $this;
    }

    public function getUseBeroep(): ?string
    {
        return $this->useBeroep;
    }

    public function setUseBeroep(string $useBeroep): self
    {
        $this->useBeroep = $useBeroep;

        return $this;
    }

    public function getUseSchool(): ?string
    {
        return $this->useSchool;
    }

    public function setUseSchool(?string $useSchool): self
    {
        $this->useSchool = $useSchool;

        return $this;
    }

    public function getUseRichting(): ?string
    {
        return $this->useRichting;
    }

    public function setUseRichting(?string $useRichting): self
    {
        $this->useRichting = $useRichting;

        return $this;
    }

    public function getUseIsActief(): ?bool
    {
        return $this->useIsActief;
    }

    public function setUseIsActief(bool $useIsActief): self
    {
        $this->useIsActief = $useIsActief;

        return $this;
    }

    public function getUseFabworthy(): ?int
    {
        return $this->useFabworthy;
    }

    public function setUseFabworthy(int $useFabworthy): self
    {
        $this->useFabworthy = $useFabworthy;

        return $this;
    }

    public function getUseRegkey(): ?string
    {
        return $this->useRegkey;
    }

    public function setUseRegkey(string $useRegkey): self
    {
        $this->useRegkey = $useRegkey;

        return $this;
    }

    public function getUseIsBlocked(): ?bool
    {
        return $this->useIsBlocked;
    }

    public function setUseIsBlocked(bool $useIsBlocked): self
    {
        $this->useIsBlocked = $useIsBlocked;

        return $this;
    }

    public function getUseIsDeleted(): ?bool
    {
        return $this->useIsDeleted;
    }

    public function setUseIsDeleted(bool $useIsDeleted): self
    {
        $this->useIsDeleted = $useIsDeleted;

        return $this;
    }

    /**
     * @return Collection|MachineLog[]
     */
    public function getMachineLogs(): Collection
    {
        return $this->machineLogs;
    }

    public function addMachineLog(MachineLog $machineLog): self
    {
        if (!$this->machineLogs->contains($machineLog)) {
            $this->machineLogs[] = $machineLog;
            $machineLog->setMlogUse($this);
        }

        return $this;
    }

    public function removeMachineLog(MachineLog $machineLog): self
    {
        if ($this->machineLogs->contains($machineLog)) {
            $this->machineLogs->removeElement($machineLog);
            // set the owning side to null (unless already changed)
            if ($machineLog->getMlogUse() === $this) {
                $machineLog->setMlogUse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MachineRecht[]
     */
    public function getMachineRechten(): Collection
    {
        return $this->machineRechten;
    }

    public function addMachineRechten(MachineRecht $machineRechten): self
    {
        if (!$this->machineRechten->contains($machineRechten)) {
            $this->machineRechten[] = $machineRechten;
            $machineRechten->setMrechtUse($this);
        }

        return $this;
    }

    public function removeMachineRechten(MachineRecht $machineRechten): self
    {
        if ($this->machineRechten->contains($machineRechten)) {
            $this->machineRechten->removeElement($machineRechten);
            // set the owning side to null (unless already changed)
            if ($machineRechten->getMrechtUse() === $this) {
                $machineRechten->setMrechtUse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Fabmoment[]
     */
    public function getFabmoments(): Collection
    {
        return $this->fabmoments;
    }

    public function addFabmoment(Fabmoment $fabmoment): self
    {
        if (!$this->fabmoments->contains($fabmoment)) {
            $this->fabmoments[] = $fabmoment;
            $fabmoment->setFabUse($this);
        }

        return $this;
    }

    public function removeFabmoment(Fabmoment $fabmoment): self
    {
        if ($this->fabmoments->contains($fabmoment)) {
            $this->fabmoments->removeElement($fabmoment);
            // set the owning side to null (unless already changed)
            if ($fabmoment->getFabUse() === $this) {
                $fabmoment->setFabUse(null);
            }
        }

        return $this;
    }

    public function getUseLand(): ?Land
    {
        return $this->useLand;
    }

    public function setUseLand(?Land $useLand): self
    {
        $this->useLand = $useLand;

        return $this;
    }

    public function __toString(): ?string
    {
        return $this->getUsername();
    }

    /**
     * @return Collection|Inschrijving[]
     */
    public function getInschrijvingen(): Collection
    {
        return $this->inschrijvingen;
    }

    public function addInschrijvingen(Inschrijving $inschrijvingen): self
    {
        if (!$this->inschrijvingen->contains($inschrijvingen)) {
            $this->inschrijvingen[] = $inschrijvingen;
            $inschrijvingen->setInsUse($this);
        }

        return $this;
    }

    public function removeInschrijvingen(Inschrijving $inschrijvingen): self
    {
        if ($this->inschrijvingen->contains($inschrijvingen)) {
            $this->inschrijvingen->removeElement($inschrijvingen);
            // set the owning side to null (unless already changed)
            if ($inschrijvingen->getInsUse() === $this) {
                $inschrijvingen->setInsUse(null);
            }
        }

        return $this;
    }

//
//    /**
//     * @return Collection|CheeseListing[]
//     */
//    public function getCheeseListings(): Collection
//    {
//        return $this->cheeseListings;
//    }
//
//    /**
//     * @Groups({"user:read"})
//     * @SerializedName("cheeseListings")
//     */
//    public function getPublishedCheeseListings()
//    {
//        return $this->cheeseListings->filter(function(CheeseListing $cheeseListing) {
//            return $cheeseListing->getIsPublished();
//        });
//
//        //TODO: implement collection criteria (zie les 10 van mastering doctrine relations)
//    }
//
//    public function addCheeseListing(CheeseListing $cheeseListing): self
//    {
//        if (!$this->cheeseListings->contains($cheeseListing)) {
//            $this->cheeseListings[] = $cheeseListing;
//            $cheeseListing->setOwner($this);
//        }
//
//        return $this;
//    }
//
//    public function removeCheeseListing(CheeseListing $cheeseListing): self
//    {
//        if ($this->cheeseListings->contains($cheeseListing)) {
//            $this->cheeseListings->removeElement($cheeseListing);
//            // set the owning side to null (unless already changed)
//            if ($cheeseListing->getOwner() === $this) {
//                $cheeseListing->setOwner(null);
//            }
//        }
//
//        return $this;
//    }



    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

//    public function getPhoneNumber(): ?string
//    {
//        return $this->phoneNumber;
//    }
//
//    public function setPhoneNumber(?string $phoneNumber): self
//    {
//        $this->phoneNumber = $phoneNumber;
//
//        return $this;
//    }
}
