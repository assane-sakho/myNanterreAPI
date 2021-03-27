<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="university_id", columns={"university_id"})}, indexes={@ORM\Index(name="user_type_id", columns={"user_type_id"}), @ORM\Index(name="grade_id", columns={"grade_id"})})
 * @ORM\Entity
 * @ApiResource(
 *      itemOperations={
 *          "get"={
 *             "normalization_context"={"groups"={"completeUser:read", "completeUser:write"}}
 *          }
 *     },
 *     collectionOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"simpleUser:read"}}
 *         }
 *     }
 * ) 
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"completeClub:read", "simpleCLub:read", "completeClub:write", "completeUser:read", "completeUser:write", "simpleUser:read"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=false)
     * @Groups({"completeClub:read", "simpleCLub:read", "completeClub:write", "completeUser:read", "completeUser:write", "simpleUser:read"})
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=false)
     * @Groups({"completeClub:read", "simpleCLub:read", "completeClub:write", "completeUser:read", "completeUser:write", "simpleUser:read"})
     */
    private $lastName;

    /**
     * @var \UserType
     *
     * @ORM\ManyToOne(targetEntity="UserType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_type_id", referencedColumnName="id")
     * })
     * @Groups({"completeClub:read", "simpleCLub:read", "completeClub:write", "completeUser:read", "completeUser:write", "simpleUser:read"})
     */
    private $userType;

    /**
     * @ORM\OneToMany(targetEntity=UsersClubs::class, mappedBy="user")
     * @Groups({"completeClub:read", "simpleCLub:read", "completeClub:write", "completeUser:read", "simpleUser:read"})
     */
    private $followedClubs;

    public function __construct()
    {
        $this->followedClubs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getUserType(): ?UserType
    {
        return $this->userType;
    }

    public function setUserType(?UserType $userType): self
    {
        $this->userType = $userType;

        return $this;
    }

    /**
     * @return Collection|UsersClubs[]
     */
    public function getFollowedClubs()
    {
        $result = new ArrayCollection();
        foreach($this->followedClubs as $data)
        {
            $data->setUser($this);
            $result->add($data);
        }
        return $result;
    }
}
