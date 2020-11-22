<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Library
 *
 * @ORM\Table(name="library", indexes={@ORM\Index(name="building_id", columns={"building_id"})})
 * @ORM\Entity
 * @ApiResource(
 *     normalizationContext={"groups"={"library:read"}},
 *     denormalizationContext={"groups"={"library:write"}}
 * )
 * 
 *  */


class Library
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"library:read", "library:write"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @Groups({"library:read", "library:write"})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=false)
     * @Groups({"library:read", "library:write"})
     */
    private $location;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     * @Groups({"library:read", "library:write"})
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reception_phone_number", type="string", length=10, nullable=true)
     * @Groups({"library:read", "library:write"})
     */
    private $receptionPhoneNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mail", type="string", length=255, nullable=true)
     * @Groups({"library:read", "library:write"})
     */
    private $mail;

    /**
     * @var \Building
     *
     * @ORM\ManyToOne(targetEntity="Building")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="building_id", referencedColumnName="id")
     * })
     * @Groups({"library:read", "library:write"})
     */
    private $building;

    /**
     * @ORM\OneToMany(targetEntity=LibrarySchedule::class, mappedBy="library")
     * @Groups({"library:read", "library:write"})
     */
    private $librarySchedules;

    /**
     * @ORM\OneToMany(targetEntity=LibraryResponsable::class, mappedBy="library")
     * @Groups({"library:read", "library:write"})
     */
    private $libraryResponsables;

    /**
     * @ORM\OneToMany(targetEntity=LibraryLink::class, mappedBy="library")
     * @Groups({"library:read", "library:write"})
     */
    private $libraryLink;

    /**
     * @ORM\OneToMany(targetEntity=LibraryDomain::class, mappedBy="library")
     * @Groups({"library:read", "library:write"})
     */
    private $libraryDomain;

    /**
     * @ORM\OneToMany(targetEntity=LibraryService::class, mappedBy="library")
     * @Groups({"library:read", "library:write"})
     */
    private $libraryService;
    /**
     * @ORM\OneToMany(targetEntity=LibraryDocumentaryFund::class, mappedBy="library")
     * @Groups({"library:read", "library:write"})
     */
    private $libraryDocumentaryFund;

    /**
     * @ORM\OneToMany(targetEntity=LibraryConsultationLoanCondition::class, mappedBy="library")
     * @Groups({"library:read", "library:write"})
     */
    private $libraryConsultationLoanConditions;


    public function __construct()
    {
        $this->libraryServices = new ArrayCollection();
        $this->librarySchedules = new ArrayCollection();
        $this->libraryResponsables = new ArrayCollection();
        $this->libraryLink = new ArrayCollection();
        $this->libraryDomain = new ArrayCollection();
        $this->libraryService = new ArrayCollection();
        $this->libraryDocumentaryFund = new ArrayCollection();
        $this->libraryConsultationLoanConditions = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getReceptionPhoneNumber(): ?string
    {
        return $this->receptionPhoneNumber;
    }

    public function setReceptionPhoneNumber(?string $receptionPhoneNumber): self
    {
        $this->receptionPhoneNumber = $receptionPhoneNumber;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getBuilding(): ?Building
    {
        return $this->building;
    }

    public function setBuilding(?Building $building): self
    {
        $this->building = $building;

        return $this;
    }

    /**
     * @return Collection|LibrarySchedule[]
     */
    public function getLibrarySchedules(): Collection
    {
        return $this->librarySchedules;
    }

    public function addLibrarySchedule(LibrarySchedule $librarySchedule): self
    {
        if (!$this->librarySchedules->contains($librarySchedule)) {
            $this->librarySchedules[] = $librarySchedule;
            $librarySchedule->setLibrary($this);
        }

        return $this;
    }

    public function removeLibrarySchedule(LibrarySchedule $librarySchedule): self
    {
        if ($this->librarySchedules->removeElement($librarySchedule)) {
            // set the owning side to null (unless already changed)
            if ($librarySchedule->getLibrary() === $this) {
                $librarySchedule->setLibrary(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LibraryResponsable[]
     */
    public function getLibraryResponsables(): Collection
    {
        return $this->libraryResponsables;
    }

    public function addLibraryResponsable(LibraryResponsable $libraryResponsable): self
    {
        if (!$this->libraryResponsables->contains($libraryResponsable)) {
            $this->libraryResponsables[] = $libraryResponsable;
            $libraryResponsable->setLibrary($this);
        }

        return $this;
    }

    public function removeLibraryResponsable(LibraryResponsable $libraryResponsable): self
    {
        if ($this->libraryResponsables->removeElement($libraryResponsable)) {
            // set the owning side to null (unless already changed)
            if ($libraryResponsable->getLibrary() === $this) {
                $libraryResponsable->setLibrary(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LibraryLink[]
     */
    public function getLibraryLink(): Collection
    {
        return $this->libraryLink;
    }

    public function addLibraryLink(LibraryLink $libraryLink): self
    {
        if (!$this->libraryLink->contains($libraryLink)) {
            $this->libraryLink[] = $libraryLink;
            $libraryLink->setLibrary($this);
        }

        return $this;
    }

    public function removeLibraryLink(LibraryLink $libraryLink): self
    {
        if ($this->libraryLink->removeElement($libraryLink)) {
            // set the owning side to null (unless already changed)
            if ($libraryLink->getLibrary() === $this) {
                $libraryLink->setLibrary(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|libraryDomain[]
     */
    public function getlibraryDomain(): Collection
    {
        return $this->libraryDomain;
    }

    public function addLibraryDomain(LibraryDomain $libraryDomain): self
    {
        if (!$this->libraryDomain->contains($libraryDomain)) {
            $this->libraryDomain[] = $libraryDomain;
            $libraryDomain->setLibrary($this);
        }

        return $this;
    }

    public function removeLibraryDomain(LibraryDomain $libraryDomain): self
    {
        if ($this->libraryDomain->removeElement($libraryDomain)) {
            // set the owning side to null (unless already changed)
            if ($libraryDomain->getLibrary() === $this) {
                $libraryDomain->setLibrary(null);
            }
        }

        return $this;
    }

    
    /**
     * @return Collection|LibraryService[]
     */
    public function getLibraryService(): Collection
    {
        return $this->libraryService;
    }

    public function addLibraryService(LibraryService $libraryService): self
    {
        if (!$this->libraryService->contains($libraryService)) {
            $this->libraryService[] = $libraryService;
            $libraryService->setLibrary($this);
        }

        return $this;
    }

    public function removeLibraryService(LibraryService $libraryService): self
    {
        if ($this->libraryService->removeElement($libraryService)) {
            // set the owning side to null (unless already changed)
            if ($libraryService->getLibrary() === $this) {
                $libraryService->setLibrary(null);
            }
        }
        
    }

    /**
     * @return Collection|LibraryDocumentaryFund[]
     */
    public function getLibraryDocumentaryFund(): Collection
    {
        return $this->libraryDocumentaryFund;
    }

    public function addLibraryDocumentaryFund(LibraryDocumentaryFund $libraryDocumentaryFund): self
    {
        if (!$this->libraryDocumentaryFund->contains($libraryDocumentaryFund)) {
            $this->libraryDocumentaryFund[] = $libraryDocumentaryFund;
            $libraryDocumentaryFund->setLibrary($this);
        }

        return $this;
    }

    public function removeLibraryDocumentaryFund(LibraryDocumentaryFund $libraryDocumentaryFund): self
    {
        if ($this->libraryDocumentaryFund->removeElement($libraryDocumentaryFund)) {
            // set the owning side to null (unless already changed)
            if ($libraryDocumentaryFund->getLibrary() === $this) {
                $libraryDocumentaryFund->setLibrary(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LibraryConsultationLoanCondition[]
     */
    public function getLibraryConsultationLoanConditions(): Collection
    {
        return $this->libraryConsultationLoanConditions;
    }

    public function addLibraryConsultationLoanCondition(LibraryConsultationLoanCondition $libraryConsultationLoanCondition): self
    {
        if (!$this->libraryConsultationLoanConditions->contains($libraryConsultationLoanCondition)) {
            $this->libraryConsultationLoanConditions[] = $libraryConsultationLoanCondition;
            $libraryConsultationLoanCondition->setLibrary($this);
        }

        return $this;
    }

    public function removeLibraryConsultationLoanCondition(LibraryConsultationLoanCondition $libraryConsultationLoanCondition): self
    {
        if ($this->libraryConsultationLoanConditions->removeElement($libraryConsultationLoanCondition)) {
            // set the owning side to null (unless already changed)
            if ($libraryConsultationLoanCondition->getLibrary() === $this) {
                $libraryConsultationLoanCondition->setLibrary(null);
            }
        }

        return $this;
    }
}
