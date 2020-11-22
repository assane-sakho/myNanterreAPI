<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * LibraryDomain
 *
 * @ORM\Table(name="library_domain", indexes={@ORM\Index(name="library_id", columns={"library_id"})})
 * @ORM\Entity
 * @ApiResource
 */
class LibraryDomain
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
     * @ORM\Column(name="domain", type="string", length=255, nullable=false)
     * @Groups({"library:read", "library:write"})
     */
    private $domain;

    /**
     * @ORM\ManyToOne(targetEntity=Library::class, inversedBy="libraryDomain")
     */
    private $library;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDomain(): ?string
    {
        return $this->domain;
    }

    public function setDomain(string $domain): self
    {
        $this->domain = $domain;

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
