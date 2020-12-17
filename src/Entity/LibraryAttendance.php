<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * LibraryAttendance
 *
 * @ORM\Table(name="library_attendance", indexes={@ORM\Index(name="library_id", columns={"library_id"})})
 * @ORM\Entity
 */
class LibraryAttendance
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
     * @var int
     *
     * @ORM\Column(name="proportion", type="integer", nullable=false)
     * @Groups({"library:read", "library:write"})
     */
    private $proportion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hour", type="datetime", nullable=false)
     * @Groups({"library:read", "library:write"})
     */
    private $hour;

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

    public function getProportion(): ?int
    {
        return $this->proportion;
    }

    public function setProportion(int $proportion): self
    {
        $this->proportion = $proportion;

        return $this;
    }

    public function getHour()
    {
        return date_format($this->hour, 'H:i');
    }

    public function setHour(\DateTimeInterface $hour): self
    {
        $this->hour = $hour;

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
