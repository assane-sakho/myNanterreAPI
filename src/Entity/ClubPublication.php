<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * ClubPublication
 *
 * @ORM\Table(name="club_publication", indexes={@ORM\Index(name="club_id", columns={"club_id"})})
 * @ORM\Entity
 * @ApiResource(
 *     collectionOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"club_publication:read"}}
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
     * @Groups({"club:read", "club:write", "club_publication:read"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255, nullable=false)
     * @Groups({"club:read", "club:write", "club_publication:read"})
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     * @Groups({"club:read", "club:write", "club_publication:read"})
     */
    private $date;

    /**
     * @var \Club
     *
     * @ORM\ManyToOne(targetEntity="Club", inversedBy="clubPublications")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="club_id", referencedColumnName="id")
     * })
     */
    private $club;

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
