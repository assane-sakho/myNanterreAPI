<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * LibraryLink
 *
 * @ORM\Table(name="library_link", indexes={@ORM\Index(name="link_type", columns={"link_type"}), @ORM\Index(name="library_id", columns={"library_id"})})
 * @ORM\Entity
 */
class LibraryLink
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @Groups({"library:read", "library:write"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=false)
     * @Groups({"library:read", "library:write"})
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
     * @ORM\ManyToOne(targetEntity=Library::class, inversedBy="libraryLinks")
     */
    private $library;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink(): ?string
    {
        return $this->linkType != null ? $this->linkType->getBase() . '/' . $this->link :  $this->link;
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
