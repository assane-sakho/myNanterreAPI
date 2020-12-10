<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Club
 *
 * @ORM\Table(name="club", indexes={@ORM\Index(name="club_type_id", columns={"club_type_id"}), @ORM\Index(name="creator_id", columns={"creator_id"})})
 * @ORM\Entity
 * @ApiResource(
 *     normalizationContext={"groups"={"club:read"}},
 *     denormalizationContext={"groups"={"club:write"}}
 * )
 */
class Club
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"club:read", "club:write"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @Groups({"club:read", "club:write"})
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="blob", length=16777215, nullable=true)
     * @Groups({"club:read", "club:write"})
     */
    private $image;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime", nullable=false)
     * @Groups({"club:read", "club:write"})
     */
    private $creationdate;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     * @Groups({"club:read", "club:write"})
     */
    private $description;

    /**
     * @var binary
     *
     * @ORM\Column(name="is_certificate", type="boolean", nullable=false)
     * @Groups({"club:read", "club:write"})
     */
    private $isCertificate;

    /**
     * @var binary
     *
     * @ORM\Column(name="is_validate", type="boolean", nullable=false)
     * @Groups({"club:read", "club:write"})
     */
    private $isValidate;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="creator_id", referencedColumnName="id")
     * })
     * @Groups({"club:read", "club:write"})
     */
    private $creator;

    /**
     * @var \ClubType
     *
     * @ORM\ManyToOne(targetEntity="ClubType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="club_type_id", referencedColumnName="id")
     * })
     * @Groups({"club:read", "club:write"})
     */
    private $clubType;

    /**
     * @ORM\OneToMany(targetEntity=ClubPublication::class, mappedBy="club")
     * @Groups({"club:read", "club:write"})
     */
    private $clubPublications;

    public function __construct()
    {
        $this->clubPublications = new ArrayCollection();
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

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreationdate(): ?\DateTimeInterface
    {
        return $this->creationdate;
    }

    public function setCreationdate(\DateTimeInterface $creationdate): self
    {
        $this->creationdate = $creationdate;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsCertificate()
    {
        return $this->isCertificate;
    }

    public function setIsCertificate($isCertificate): self
    {
        $this->isCertificate = $isCertificate;

        return $this;
    }

    public function getIsValidate()
    {
        return $this->isValidate;
    }

    public function setIsValidate($isValidate): self
    {
        $this->isValidate = $isValidate;

        return $this;
    }

    public function getCreator(): ?User
    {
        return $this->creator;
    }

    public function setCreator(?User $creator): self
    {
        $this->creator = $creator;

        return $this;
    }

    public function getClubType(): ?ClubType
    {
        return $this->clubType;
    }

    public function setClubType(?ClubType $clubType): self
    {
        $this->clubType = $clubType;

        return $this;
    }

    /**
     * @return Collection|ClubPublication[]
     */
    public function getClubPublications(): Collection
    {
        return $this->clubPublications;
    }

    public function addClubPublication(ClubPublication $clubPublication): self
    {
        if (!$this->clubPublications->contains($clubPublication)) {
            $this->clubPublications[] = $clubPublication;
            $clubPublication->setClub($this);
        }

        return $this;
    }

    public function removeClubPublication(ClubPublication $clubPublication): self
    {
        if ($this->clubPublications->removeElement($clubPublication)) {
            // set the owning side to null (unless already changed)
            if ($clubPublication->getClub() === $this) {
                $clubPublication->setClub(null);
            }
        }

        return $this;
    }


}
