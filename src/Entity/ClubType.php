<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * ClubType
 *
 * @ORM\Table(name="club_type")
 * @ORM\Entity
 * @ApiResource(
 *      attributes={"pagination_enabled"=false},
 *      itemOperations={
 *          "get"={
 *             "normalization_context"={"groups"={"clubType:read"}}
 *         }
 *     },
 *     collectionOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"clubType:read"}}
 *         }
 *     }
 * ) 
 */
class ClubType
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"completeClub:read", "simpleCLub:read", "completeClub:write", "clubType:read"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @Groups({"completeClub:read", "simpleCLub:read", "completeClub:write", "clubType:read"})
     */
    private $name;

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


}
