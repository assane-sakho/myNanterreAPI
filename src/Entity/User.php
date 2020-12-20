<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="university_id", columns={"university_id"})}, indexes={@ORM\Index(name="user_type_id", columns={"user_type_id"}), @ORM\Index(name="grade_id", columns={"grade_id"})})
 * @ORM\Entity
 */
class User
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
     * @ORM\Column(name="firstname", type="string", length=255, nullable=false)
     * @Groups({"club:read", "club:write", "clubInfos:read"})
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=false)
     * @Groups({"club:read", "club:write", "clubInfos:read"})
     */
    private $lastName;

    /**
     * @var \UserType
     *
     * @ORM\ManyToOne(targetEntity="UserType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_type_id", referencedColumnName="id")
     * })
     * @Groups({"club:read", "club:write", "clubInfos:read"})
     */
    private $userType;

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

}
