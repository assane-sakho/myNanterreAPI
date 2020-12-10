<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity
 * @ApiResource
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
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
     * @var string|null
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2, nullable=true)
     * @Groups({"crous:read", "crous:write"})
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity=CrousProduct::class, mappedBy="product")
     */
    private $crousProducts;

    public function __construct()
    {
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

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

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
            $crousProduct->setProduct($this);
        }

        return $this;
    }

    public function removeCrousProduct(CrousProduct $crousProduct): self
    {
        if ($this->crousProducts->removeElement($crousProduct)) {
            // set the owning side to null (unless already changed)
            if ($crousProduct->getProduct() === $this) {
                $crousProduct->setProduct(null);
            }
        }

        return $this;
    }

}
