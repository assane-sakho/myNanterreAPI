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
 *     normalizationContext={"groups"={"crous:read"}},
 *     denormalizationContext={"groups"={"crous:write"}}
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
     * @Groups({"crous:read", "crous:write"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @Groups({"crous:read", "crous:write"})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=false)
     * @Groups({"crous:read", "crous:write"})
     */
    private $location;

    /**
     * @ORM\OneToMany(targetEntity=CrousSchedule::class, mappedBy="crous")
     * @Groups({"crous:read", "crous:write"})
     */
    private $crousSchedules;

    /**
     * @ORM\OneToMany(targetEntity=CrousProduct::class, mappedBy="crous")
     * @Groups({"crous:read", "crous:write"})
     */
    private $crousProducts;

    public function __construct()
    {
        $this->crousSchedules = new ArrayCollection();
        $this->crousProducts = new ArrayCollection();
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


}
