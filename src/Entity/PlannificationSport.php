<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlannificationSport
 *
 * @ORM\Table(name="plannification_sport")
 * @ORM\Entity(repositoryClass="App\Repository\PlannificationSportRepository")
 */
class PlannificationSport
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_rdv", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRdv;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="heured", type="time", nullable=true)
     */
    private $heured;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="heuref", type="time", nullable=true)
     */
    private $heuref;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sport", type="string", length=150, nullable=true)
     */
    private $sport;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lieu", type="string", length=150, nullable=true)
     */
    private $lieu;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numero", type="integer", nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="dateRdv", type="string", length=10, nullable=false)
     */
    private $daterdv;

    /**
     * @var int|null
     *
     * @ORM\Column(name="categorie", type="integer", nullable=true)
     */
    private $categorie;

    /**
     * @var int
     *
     * @ORM\Column(name="nbInscrit", type="integer", nullable=false)
     */
    private $nbinscrit = '0';

    public function getIdRdv(): ?int
    {
        return $this->idRdv;
    }

    public function getHeured(): ?\DateTimeInterface
    {
        return $this->heured;
    }

    public function setHeured(?\DateTimeInterface $heured): self
    {
        $this->heured = $heured;

        return $this;
    }

    public function getHeuref(): ?\DateTimeInterface
    {
        return $this->heuref;
    }

    public function setHeuref(?\DateTimeInterface $heuref): self
    {
        $this->heuref = $heuref;

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

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(?int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getDaterdv(): ?string
    {
        return $this->daterdv;
    }

    public function setDaterdv(string $daterdv): self
    {
        $this->daterdv = $daterdv;

        return $this;
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

    public function getNbinscrit(): ?int
    {
        return $this->nbinscrit;
    }

    public function setNbinscrit(int $nbinscrit): self
    {
        $this->nbinscrit = $nbinscrit;

        return $this;
    }


}
