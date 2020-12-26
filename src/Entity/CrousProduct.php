<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * CrousProduct
 *
 * @ORM\Table(name="crous_product", indexes={@ORM\Index(name="product_id", columns={"product_id"}), @ORM\Index(name="crous_id", columns={"crous_id"})})
 * @ORM\Entity
 * @ApiResource(
 *     attributes={"pagination_enabled"=false},
 *     itemOperations={
 *          "get"={
 *             "normalization_context"={"groups"={"crous_product:read"}}
 *         },
 *     },
 *     collectionOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"crous_product:read"}}
 *         }
 *     }
 * )
 * @ApiFilter(SearchFilter::class, properties={"crous": "exact"})
 */
class CrousProduct
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"completeCrous:read", "crous_product:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Crous::class, inversedBy="crousProducts")
     */
    private $crous;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="crousProducts")
     * @Groups({"completeCrous:read", "crous_product:read"})
     */
    private $product;

    /**
     * @ORM\OneToMany(targetEntity=CrousProductAvailability::class, mappedBy="crousProduct")
     * @Groups({"completeCrous:read", "crous_product:read"})
     */
    private $crousProductAvailabilities;

    public function __construct()
    {
        $this->crousProductAvailabilities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return Collection|CrousProductAvailability[]
     */
    public function getCrousProductAvailabilities(): Collection
    {
        return $this->crousProductAvailabilities;
    }

    public function addCrousProductAvailability(CrousProductAvailability $crousProductAvailability): self
    {
        if (!$this->crousProductAvailabilities->contains($crousProductAvailability)) {
            $this->crousProductAvailabilities[] = $crousProductAvailability;
            $crousProductAvailability->setCrousProduct($this);
        }

        return $this;
    }

    public function removeCrousProductAvailability(CrousProductAvailability $crousProductAvailability): self
    {
        if ($this->crousProductAvailabilities->removeElement($crousProductAvailability)) {
            // set the owning side to null (unless already changed)
            if ($crousProductAvailability->getCrousProduct() === $this) {
                $crousProductAvailability->setCrousProduct(null);
            }
        }

        return $this;
    }

}
