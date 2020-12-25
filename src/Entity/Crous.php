<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Crous
 *
 * @ORM\Table(name="crous")
 * @ORM\Entity
 * @ApiResource(
 *     attributes={"pagination_enabled"=false},
 *     itemOperations={
 *          "get"={
 *             "normalization_context"={"groups"={"completeCrous:read"}}
 *          }
 *     },
 *     collectionOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"simpleCrous:read"}}
 *         }
 *     }
 * )
 *  */

class Crous
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @Groups({"simpleCrous:read", "completeCrous:read"})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=false)
     * @Groups({"simpleCrous:read", "completeCrous:read"})
     */
    private $location;

    /**
     * @ORM\OneToMany(targetEntity=CrousSchedule::class, mappedBy="crous")
     * @Groups({"simpleCrous:read", "completeCrous:read"})
     */
    private $crousSchedules;

    /**
     * @ORM\OneToMany(targetEntity=CrousProduct::class, mappedBy="crous")
     * @Groups({"completeCrous:read"})
     */
    private $crousProducts;

    /**
     * @ORM\OneToMany(targetEntity=CrousAttendance::class, mappedBy="crous")
     * @Groups({"simpleCrous:read", "completeCrous:read"})
     */
    private $crousAttendance;

    public function __construct()
    {
        $this->crousSchedules = new ArrayCollection();
        $this->crousProducts = new ArrayCollection();
        $this->crousAttendance = new ArrayCollection();
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

    /**
     * @return Collection|CrousSchedule[]
     */
    public function getCrousSchedules(): Collection
    {
        return $this->crousSchedules;
    }

    public function addCrousSchedule(CrousSchedule $crousSchedule): self
    {
        if (!$this->crousSchedules->contains($crousSchedule)) {
            $this->crousSchedules[] = $crousSchedule;
            $crousSchedule->setCrous($this);
        }

        return $this;
    }

    public function removeCrousSchedule(CrousSchedule $crousSchedule): self
    {
        if ($this->crousSchedules->removeElement($crousSchedule)) {
            // set the owning side to null (unless already changed)
            if ($crousSchedule->getCrous() === $this) {
                $crousSchedule->setCrous(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CrousProduct[]
     */
    public function getCrousProducts(): Collection
    {
        return $this->crousProducts;
    }

    public function addCrousProduct(CrousProduct $crousProduct): self
    {
        if (!$this->crousProducts->contains($crousProduct)) {
            $this->crousProducts[] = $crousProduct;
            $crousProduct->setCrous($this);
        }

        return $this;
    }

    public function removeCrousProduct(CrousProduct $crousProduct): self
    {
        if ($this->crousProducts->removeElement($crousProduct)) {
            // set the owning side to null (unless already changed)
            if ($crousProduct->getCrous() === $this) {
                $crousProduct->setCrous(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|crousAttendance[]
     */
    public function getCrousAttendance(): Collection
    {
        return $this->crousAttendance;
    }

    public function addCrousAttendance(crousAttendance $crousAttendance): self
    {
        if (!$this->crousAttendance->contains($crousAttendance)) {
            $this->crousAttendance[] = $crousAttendance;
            $crousAttendance->setCrous($this);
        }

        return $this;
    }

    public function removeCrousAttendance(crousAttendance $crousAttendance): self
    {
        if ($this->crousAttendance->removeElement($crousAttendance)) {
            // set the owning side to null (unless already changed)
            if ($crousAttendance->getCrous() === $this) {
                $crousAttendance->setCrous(null);
            }
        }

        return $this;
    }


}
