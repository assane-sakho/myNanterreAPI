<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Crous
 *
 * @ORM\Table(name="crous")
 * @ORM\Entity(repositoryClass="App\Repository\CrousRepository")
 */
class Crous
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_bat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="batiment", type="string", length=30, nullable=true)
     */
    private $batiment;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lieu", type="string", length=30, nullable=true)
     */
    private $lieu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="horaire", type="string", length=70, nullable=true)
     */
    private $horaire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ventes", type="string", length=200, nullable=true)
     */
    private $ventes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="frequentation", type="integer", nullable=true)
     */
    private $frequentation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ouverture", type="integer", nullable=true)
     */
    private $ouverture;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fermeture", type="integer", nullable=true)
     */
    private $fermeture;

    /**
     * @var int|null
     *
     * @ORM\Column(name="burger", type="integer", nullable=true)
     */
    private $burger;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vote", type="string", length=50, nullable=true)
     */
    private $vote;

    public function getIdBat(): ?int
    {
        return $this->idBat;
    }

    public function getBatiment(): ?string
    {
        return $this->batiment;
    }

    public function setBatiment(?string $batiment): self
    {
        $this->batiment = $batiment;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getHoraire(): ?string
    {
        return $this->horaire;
    }

    public function setHoraire(?string $horaire): self
    {
        $this->horaire = $horaire;

        return $this;
    }

    public function getVentes(): ?string
    {
        return $this->ventes;
    }

    public function setVentes(?string $ventes): self
    {
        $this->ventes = $ventes;

        return $this;
    }

    public function getFrequentation(): ?int
    {
        return $this->frequentation;
    }

    public function setFrequentation(?int $frequentation): self
    {
        $this->frequentation = $frequentation;

        return $this;
    }

    public function getOuverture(): ?int
    {
        return $this->ouverture;
    }

    public function setOuverture(?int $ouverture): self
    {
        $this->ouverture = $ouverture;

        return $this;
    }

    public function getFermeture(): ?int
    {
        return $this->fermeture;
    }

    public function setFermeture(?int $fermeture): self
    {
        $this->fermeture = $fermeture;

        return $this;
    }

    public function getBurger(): ?int
    {
        return $this->burger;
    }

    public function setBurger(?int $burger): self
    {
        $this->burger = $burger;

        return $this;
    }

    public function getVote(): ?string
    {
        return $this->vote;
    }

    public function setVote(?string $vote): self
    {
        $this->vote = $vote;

        return $this;
    }


}
