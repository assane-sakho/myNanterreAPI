<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * CrousSchedule
 *
 * @ORM\Table(name="crous_schedule", indexes={@ORM\Index(name="crous_id", columns={"crous_id"})})
 * @ORM\Entity
 */
class CrousSchedule
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"completeCrous:read"})
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="opening_time", type="datetime", nullable=false)
     * @Groups({"simpleCrous:read", "completeCrous:read"})
     */
    private $openingTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closing_time", type="datetime", nullable=false)
     * @Groups({"simpleCrous:read", "completeCrous:read"})
     */
    private $closingTime;

    /**
     * @var string
     *
     * @ORM\Column(name="days", type="string", length=21, nullable=false)
     * @Groups({"simpleCrous:read", "completeCrous:read"})
     */
    private $days;

    /**
     * @ORM\ManyToOne(targetEntity=Crous::class, inversedBy="crousSchedules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $crous;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOpeningTime()
    {
        return date_format($this->openingTime, 'H:i');

    }

    public function setOpeningTime(\DateTimeInterface $openingTime): self
    {
        $this->openingTime = $openingTime;

        return $this;
    }

    public function getClosingTime()
    {
        return date_format($this->closingTime, 'H:i');
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

    public function getCrous(): ?Crous
    {
        return $this->crous;
    }

    public function setCrous(?Crous $crous): self
    {
        $this->crous = $crous;

        return $this;
    }
}
