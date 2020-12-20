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
 *     itemOperations={
 *          "get"={
 *             "normalization_context"={"groups"={"club:read", "club:write"}}
 *          }
 *     },
 *     collectionOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"clubInfos:read"}}
 *         }
 *     }
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
     * @Groups({"club:read", "club:write", "clubInfos:read"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @Groups({"club:read", "club:write", "clubInfos:read"})
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="blob", nullable=true)
     * @Groups({"club:read", "club:write", "clubInfos:read"})
     */
    private $image;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=false)
     * @Groups({"club:read", "club:write", "clubInfos:read"})
     */
    private $creationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     * @Groups({"club:read", "club:write", "clubInfos:read"})
     */
    private $description;

    /**
     * @var binary
     *
     * @ORM\Column(name="is_certificate", type="boolean", nullable=false)
     * @Groups({"club:read", "club:write", "clubInfos:read"})
     */
    private $isCertificate;

    /**
     * @var binary
     *
     * @ORM\Column(name="is_validate", type="boolean", nullable=false)
     * @Groups({"club:read", "club:write", "clubInfos:read"})
     */
    private $isValidate;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="creator_id", referencedColumnName="id")
     * })
     * @Groups({"club:read", "club:write", "clubInfos:read"})
     */
    private $creator;

    /**
     * @var \ClubType
     *
     * @ORM\ManyToOne(targetEntity="ClubType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="club_type_id", referencedColumnName="id")
     * })
     * @Groups({"club:read", "club:write", "clubInfos:read"})
     */
    private $clubType;

    /**
     * @ORM\OneToMany(targetEntity=ClubPublication::class, mappedBy="club")
     * @Groups({"club:read", "club:write"})
     */
    private $clubPublications;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=255, nullable=true)
     * @Groups({"club:read", "club:write"})
     */
    private $contact;

       /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     * @Groups({"club:read", "club:write"})
     */
    private $website;

       /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255, nullable=true)
     * @Groups({"club:read", "club:write"})
     */
    private $mail;

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
        return is_resource($this->image) ? stream_get_contents($this->image) : $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreationDate()
    {
        return $this->creationDate->format("Y-m-d H:i");
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

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

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }


}
