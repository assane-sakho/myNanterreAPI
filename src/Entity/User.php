<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\SerializedName;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="user", indexes={@ORM\Index(name="user_type_id", columns={"user_type_id"})})
 * @ORM\Entity
 * @ApiResource(
 *      itemOperations={
 *          "get"={
 *             "normalization_context"={"groups"={"completeUser:read"}}
 *          }
 *     },
 *     collectionOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"simpleUser:read"}}
 *         },
 *         "post"={
 *             "denormalizationContext"={"groups"={"completeUser:write"}}
 *         }
 *     },
 *     denormalizationContext={"groups"={"user:write"}}
 * ) 
 * @ApiFilter(SearchFilter::class, properties={"email": "exact"})
 */

class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"completeClub:read", "simpleCLub:read", "completeClub:write", "completeUser:read", "simpleUser:read"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=false)
     * @Groups({"completeClub:read", "simpleCLub:read", "completeClub:write", "completeUser:read", "user:write", "simpleUser:read"})
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=false)
     * @Groups({"completeClub:read", "simpleCLub:read", "completeClub:write", "completeUser:read", "user:write", "simpleUser:read"})
     */
    private $lastName;

    /**
     * @var \UserType
     *
     * @ORM\ManyToOne(targetEntity="UserType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_type_id", referencedColumnName="id", columnDefinition="INT NOT NULL DEFAULT 1")
     * })
     * @Groups({"completeClub:read", "simpleCLub:read", "completeClub:write", "completeUser:read", "simpleUser:read"})
     */
    private $userType;

    /**
     * @ORM\OneToMany(targetEntity=UsersClubs::class, mappedBy="user")
     * @Groups({"completeUser:read", "simpleUser:read"})
     */
    private $followedClubs;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"completeClub:read", "simpleCLub:read", "completeClub:write", "completeUser:read", "user:write", "simpleUser:read"})
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     * @Groups({"completeUser:read", "simpleUser:read"})
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @Groups("user:write")
     * @SerializedName("password")
     */
    private $plainPassword;

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
    
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

     /**
     * @see UserInterface
     */
    public function getPlainPassword(): string
    {
        return (string) $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }


    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    public function addFollowedClub(UsersClubs $followedClub): self
    {
        if (!$this->followedClubs->contains($followedClub)) {
            $this->followedClubs[] = $followedClub;
            $followedClub->setUser($this);
        }

        return $this;
    }

    public function removeFollowedClub(UsersClubs $followedClub): self
    {
        if ($this->followedClubs->removeElement($followedClub)) {
            // set the owning side to null (unless already changed)
            if ($followedClub->getUser() === $this) {
                $followedClub->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        $this->plainPassword = null;
    }

}
