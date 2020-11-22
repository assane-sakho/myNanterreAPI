<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * LibraryDocumentaryFund
 *
 * @ORM\Table(name="library_documentary_fund", indexes={@ORM\Index(name="library_id", columns={"library_id"})})
 * @ORM\Entity
 * @ApiResource
 */
class LibraryDocumentaryFund
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
     */
    private $name;

    /**
     * @var \Library
     *
     * @ORM\ManyToOne(targetEntity="Library")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="library_id", referencedColumnName="id")
     * })
     */
    private $library;

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
