<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * LibrarySchedule
 *
 * @ORM\Table(name="library_schedule", indexes={@ORM\Index(name="library_id", columns={"library_id"})})
 * @ORM\Entity
 * @ApiResource
 */
class LibrarySchedule
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
     * @var \DateTime
     *
     * @ORM\Column(name="opening_time", type="time", nullable=false)
     */
    private $openingTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closing_time", type="time", nullable=false)
     */
    private $closingTime;

    /**
     * @var string
     *
     * @ORM\Column(name="days", type="string", length=17, nullable=false)
     */
    private $days;

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

    public function getOpeningTime(): ?\DateTimeInterface
    {
        return $this->openingTime;
    }

    public function setOpeningTime(\DateTimeInterface $openingTime): self
    {
        $this->openingTime = $openingTime;

        return $this;
    }

    public function getClosingTime(): ?\DateTimeInterface
    {
        return $this->closingTime;
    }

    public function setClosingTime(\DateTimeInterface $closingTime): self
    {
        $this->closingTime = $closingTime;

        return $this;
    }

    public function getDays(): ?string
    {
        return $this->days;
    }

    public function setDays(string $days): self
    {
        $this->days = $days;

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
