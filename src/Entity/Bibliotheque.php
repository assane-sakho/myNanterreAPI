<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bibliotheque
 *
 * @ORM\Table(name="bibliotheque")
 * @ORM\Entity(repositoryClass="App\Repository\BibliothequeRepository")
 */
class Bibliotheque
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomSalle", type="string", length=30, nullable=true)
     */
    private $nomsalle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomsalle(): ?string
    {
        return $this->nomsalle;
    }

    public function setNomsalle(?string $nomsalle): self
    {
        $this->nomsalle = $nomsalle;

        return $this;
    }


}
