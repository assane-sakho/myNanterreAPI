<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use DateTime;

/**
 * ClubPublication
 *
 * @ORM\Table(name="club_publication", indexes={@ORM\Index(name="club_id", columns={"club_id"})})
 * @ORM\Entity
 * @ApiResource(
 *     attributes={"pagination_enabled"=false},
 *     itemOperations={
 *          "get"={
 *             "normalization_context"={"groups"={"club_publication:read"}}
 *         },
 *          "put" = {
 *             "normalization_context"={"groups"={"club_publication:write"}}
 *          },
 *         "delete"
 *     },
 *     collectionOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"club_publication:read"}}
 *         },
 *         "post" = {
 *             "normalization_context"={"groups"={"club_publication:write"}}
 *         }
 *     }
 * )
 * @ApiFilter(SearchFilter::class, properties={"club": "exact"})
 */
class ClubPublication
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"completeClub:read", "completeClub:write", "club_publication:read", "club_publication:write"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255, nullable=false)
     * @Groups({"completeClub:read", "completeClub:write", "club_publication:read", "club_publication:write"})
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     * @Groups({"completeClub:read", "completeClub:write", "club_publication:read", "club_publication:write"})
     */
    private $date;

    /**
     * @var binary
     *
     * @ORM\Column(name="isEdited", type="boolean", nullable=false)
     * @Groups({"completeCrous:read"})
     */
    private $isEdited;

    /**
     * @var \Club
     *
     * @ORM\ManyToOne(targetEntity="Club", inversedBy="clubPublications")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="club_id", referencedColumnName="id")
     * })
     */
    private $club;

    public function __construct()
    {
        $this->date = new DateTime();
        $this->isEdited = false;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getDate()
    {
        return $this->date->format("Y-m-d H:i");
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIsEdited()
    {
        return $this->isEdited;
    }

    public function setIsEdited($isEdited): self
    {
        $this->isEdited = $isEdited;

        return $this;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): self
    {
        $this->club = $club;

        return $this;
    }
}
