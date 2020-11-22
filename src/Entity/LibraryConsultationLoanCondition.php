<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LibraryConsultationLoanConditionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Table(name="library_consultation_loan_condition", indexes={@ORM\Index(name="library_id", columns={"library_id"})})
 * @ApiResource
 * @ORM\Entity
 */
class LibraryConsultationLoanCondition
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"library:read", "library:write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"library:read", "library:write"})
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Library::class, inversedBy="libraryConsultationLoanConditions")
     * @ORM\JoinColumn(nullable=false)
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
