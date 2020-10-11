<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sports
 *
 * @ORM\Table(name="sports", indexes={@ORM\Index(name="fk_categorie_sport", columns={"categorie"})})
 * @ORM\Entity(repositoryClass="App\Repository\SportsRepository")
 */
class Sports
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_sport", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSport;

    /**
     * @var int|null
     *
     * @ORM\Column(name="categorie", type="integer", nullable=true)
     */
    private $categorie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sport", type="string", length=60, nullable=true)
     */
    private $sport;

    /**
     * @var string|null
     *
     * @ORM\Column(name="horaire", type="string", length=1000, nullable=true)
     */
    private $horaire;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=100, nullable=true)
     */
    private $image;

    public function getIdSport(): ?int
    {
        return $this->idSport;
    }

    public function getCategorie(): ?int
    {
        return $this->categorie;
    }

    public function setCategorie(?int $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getSport(): ?string
    {
        return $this->sport;
    }

    public function setSport(?string $sport): self
    {
        $this->sport = $sport;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }


}
