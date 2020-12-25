<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

use Doctrine\ORM\Mapping as ORM;

/**
 * CrousAttendance
 *
 * @ORM\Table(name="crous_attendance", indexes={@ORM\Index(name="crous_id", columns={"crous_id"})})
 * @ORM\Entity
 * @ApiResource(
 *     itemOperations={
 *          "get"={
 *             "normalization_context"={"groups"={"crousAttendance:read"}}
 *          }
 *     },
 *     collectionOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"crousAttendance:read"}}
 *         },
 *         "post" = {
 *             "normalization_context"={"groups"={"crousAttendance:write"}}
 *         }
 *     }
 * )
 */
class CrousAttendance
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"simpleCrous:read", "completeCrous:read"})
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="proportion", type="integer", nullable=false)
     * @Groups({"simpleCrous:read", "completeCrous:read", "crousAttendance:write"})
     */
    private $proportion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hour", type="datetime", nullable=false)
     * @Groups({"simpleCrous:read", "completeCrous:read", "crousAttendance:write"})
     */
    private $hour;

    /**
     * @ORM\ManyToOne(targetEntity=Crous::class, inversedBy="CrousAttendance")
     * @ORM\JoinColumn(nullable=false)
     */
    private $crous;

 

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
