<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * LibraryLink
 *
 * @ORM\Table(name="library_link", indexes={@ORM\Index(name="link_type", columns={"link_type"}), @ORM\Index(name="library_id", columns={"library_id"})})
 * @ORM\Entity
 * @ApiResource
 */
class LibraryLink
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
     * @ORM\Column(name="link", type="string", length=255, nullable=false)
     */
    private $link;

    /**
     * @var \LinkType
     *
     * @ORM\ManyToOne(targetEntity="LinkType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="link_type", referencedColumnName="id")
     * })
     */
    private $linkType;

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

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getLinkType(): ?LinkType
    {
        return $this->linkType;
    }

    public function setLinkType(?LinkType $linkType): self
    {
        $this->linkType = $linkType;

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
