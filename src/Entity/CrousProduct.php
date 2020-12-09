<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * CrousProduct
 *
 * @ORM\Table(name="crous_product", indexes={@ORM\Index(name="product_id", columns={"product_id"}), @ORM\Index(name="crous_id", columns={"crous_id"})})
 * @ORM\Entity
 * @ApiResource
 */
class CrousProduct
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
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity=Crous::class, inversedBy="crousProducts")
     */
    private $crous;

    public function getId(): ?int
    {
        return $this->id;
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
