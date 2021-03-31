<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * UsersClubs
 * @ApiResource(
 *      itemOperations={
 *          "get"={
 *             "normalization_context"={"groups"={"completeUser:read", "completeUser:write"}}
 *          },
 *          "delete"
 *     },
 *     collectionOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"simpleUser:read"}}
 *         },
 *         "post"={
 *             "normalization_context"={"groups"={"userClub:write"}}
 *         }
 *     }
 * )
 * @ORM\Table(name="users_clubs", indexes={@ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="club_id", columns={"club_id"})})
 * @ORM\Entity
 */
class UsersClubs
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"completeUser:read", "simpleUser:read", "userClub:write"})
     */
    private $id;

    /**
     * @var \Club
     *
     * @ORM\ManyToOne(targetEntity="Club")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="club_id", referencedColumnName="id")
     * })
     * @Groups({"completeUser:read", "simpleUser:read", "userClub:write"})
     */
    
    private $club;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="clubs")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"userClub:write"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClub()
    {
        return $this->club;
    }

    public function setClub(?Club $club): self
    {
        $this->club = $club;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }


}
