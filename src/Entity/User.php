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
     * @Groups({"club:read", "club:write"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=false)
     * @Groups({"club:read", "club:write"})
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=false)
     * @Groups({"club:read", "club:write"})
     */
    private $lastName;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="birthdate", type="datetime", nullable=true)
     * @Groups({"club:read", "club:write"})
     */
    private $birthDate;

    /**
     * @var int
     *
     * @ORM\Column(name="university_id", type="integer", nullable=false)
     * @Groups({"club:read", "club:write"})
     */
    private $universityId;

    /**
     * @var \Grade
     *
     * @ORM\ManyToOne(targetEntity="Grade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grade_id", referencedColumnName="id")
     * })
     * @Groups({"club:read", "club:write"})
     */
    private $grade;

    /**
     * @var \UserType
     *
     * @ORM\ManyToOne(targetEntity="UserType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_type_id", referencedColumnName="id")
     * })
     * @Groups({"club:read", "club:write"})
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

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(?\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getUniversityId(): ?int
    {
        return $this->universityId;
    }

    public function setUniversityId(int $universityId): self
    {
        $this->universityId = $universityId;

        return $this;
    }

    public function getGrade(): ?Grade
    {
        return $this->grade;
    }

    public function setGrade(?Grade $grade): self
    {
        $this->grade = $grade;

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
