<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * LinkType
 *
 * @ORM\Table(name="link_type")
 * @ORM\Entity
 * @ApiResource
 */
class LinkType
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string|null
     *
     * @ORM\Column(name="base", type="string", length=255, nullable=true)
     */
    private $base;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getBase(): ?string
    {
        return $this->base;
    }

    public function setBase(?string $base): self
    {
        $this->base = $base;

        return $this;
    }


}
