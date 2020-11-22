<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * LibraryResponsable
 *
 * @ORM\Table(name="library_responsable", indexes={@ORM\Index(name="library_id", columns={"library_id"})})
 * @ORM\Entity
 * @ApiResource
 */
class LibraryResponsable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @Groups({"library:read", "library:write"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Groups({"library:read", "library:write"})
     * @ORM\Column(name="fullname", type="string", length=255, nullable=false)
     */
    private $fullname;

    /**
     * @var string|null
     *
     * @Groups({"library:read", "library:write"})
     * @ORM\Column(name="phone_number", type="string", length=10, nullable=true)
     */
    private $phoneNumber;

    /**
     * @var string|null
     *
     * @Groups({"library:read", "library:write"})
     * @ORM\Column(name="mail", type="string", length=255, nullable=true)
     */
    private $mail;

    /**
     * @ORM\ManyToOne(targetEntity=Library::class, inversedBy="libraryResponsables")
     * @ORM\JoinColumn(nullable=false)
     */
    private $library;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): self
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

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

    public function getLibrary(): ?Library
    {
        return $this->library;
    }

    public function setLibrary(?Library $library): self
    {
        $this->library = $library;

        return $this;
    }
}
