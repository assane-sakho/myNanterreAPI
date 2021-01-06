<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * CrousProductAvailability
 *
 * @ORM\Table(name="crous_product_availability", indexes={@ORM\Index(name="crous_product_id", columns={"crous_product_id"})})
 * @ORM\Entity
 * @ApiResource(
 *     itemOperations={
 *          "get"={
 *             "normalization_context"={"groups"={"crousProductAvailability:read"}}
 *          }
 *     },
 *     collectionOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"crousProductAvailability:read"}}
 *         },
 *         "post" = {
 *             "normalization_context"={"groups"={"crousProductAvailability:write"}}
 *         }
 *     }
 * )
 */
class CrousProductAvailability
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
     * @var binary
     *
     * @ORM\Column(name="isAvailable", type="boolean", nullable=false)
     * @Groups({"completeCrous:read", "crous_product:read", "crousProductAvailability:write"})
     */
    private $isAvailable;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     * @Groups({"completeCrous:read", "crous_product:read"})
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=CrousProduct::class, inversedBy="crousProductAvailabilities")
     */
    private $crousProduct;

    public function __construct()
    {
        $this->date = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsAvailable()
    {
        return $this->isAvailable;
    }

    public function setIsAvailable($isAvailable): self
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    public function getDate(){
        return $this->date->format('Y-m-d H:i');
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
