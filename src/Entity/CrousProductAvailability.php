<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * CrousProductAvailability
 *
 * @ORM\Table(name="crous_product_availability", indexes={@ORM\Index(name="crous_product_id", columns={"crous_product_id"})})
 * @ORM\Entity
 */
class CrousProductAvailability
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
     * @var binary
     *
     * @ORM\Column(name="isAvailable", type="boolean", nullable=false)
     * @Groups({"crous:read", "crous:write"})
     */
    private $isavailable;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     * @Groups({"crous:read", "crous:write"})
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=CrousProduct::class, inversedBy="crousProductAvailabilities")
     */
    private $crousProduct;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsavailable()
    {
        return $this->isavailable;
    }

    public function setIsavailable($isavailable): self
    {
        $this->isavailable = $isavailable;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCrousProduct(): ?CrousProduct
    {
        return $this->crousProduct;
    }

    public function setCrousProduct(?CrousProduct $crousProduct): self
    {
        $this->crousProduct = $crousProduct;

        return $this;
    }
}
