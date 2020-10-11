<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Batiments
 *
 * @ORM\Table(name="batiments")
 * @ORM\Entity(repositoryClass="App\Repository\BatimentsRepository")
 */
class Batiments
{
    /**
     * @var int
     *
     * @ORM\Column(name="idBatiment", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idbatiment;

    /**
     * @var string
     *
     * @ORM\Column(name="nomBatiment", type="text", length=65535, nullable=false)
     */
    private $nombatiment;

    public function getIdbatiment(): ?int
    {
        return $this->idbatiment;
    }

    public function getNombatiment(): ?string
    {
        return $this->nombatiment;
    }

    public function setNombatiment(string $nombatiment): self
    {
        $this->nombatiment = $nombatiment;

        return $this;
    }


}
