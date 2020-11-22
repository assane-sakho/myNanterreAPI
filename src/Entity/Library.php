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


    /*
     * @ORM\OneToMany(targetEntity="LibraryService", mappedBy="library")
     * @Groups({"library:read", "library:write"})
    */
    private $libraryServices;
    

    public function __construct()
    {
        $this->libraryServices = new ArrayCollection();
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
     * @return Collection|LibraryService[]
     */
    public function getLibraryServices() : ?Collection
    {
        return $this->libraryServices;
    }
}
