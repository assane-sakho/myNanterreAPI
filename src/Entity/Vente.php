<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vente
 *
 * @ORM\Table(name="vente")
 * @ORM\Entity(repositoryClass="App\Repository\VenteRepository")
 */
class Vente
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_p", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idP;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_bat", type="integer", nullable=true)
     */
    private $idBat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="produit", type="string", length=100, nullable=true)
     */
    private $produit;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dispo", type="integer", nullable=true)
     */
    private $dispo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vote", type="string", length=50, nullable=true)
     */
    private $vote;

    /**
     * @var int|null
     *
     * @ORM\Column(name="produitquantite", type="integer", nullable=true)
     */
    private $produitquantite;

    public function getIdP(): ?int
    {
        return $this->idP;
    }

    public function getIdBat(): ?int
    {
        return $this->idBat;
    }

    public function setIdBat(?int $idBat): self
    {
        $this->idBat = $idBat;

        return $this;
    }

    public function getProduit(): ?string
    {
        return $this->produit;
    }

    public function setProduit(?string $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getDispo(): ?int
    {
        return $this->dispo;
    }

    public function setDispo(?int $dispo): self
    {
        $this->dispo = $dispo;

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

    public function getProduitquantite(): ?int
    {
        return $this->produitquantite;
    }

    public function setProduitquantite(?int $produitquantite): self
    {
        $this->produitquantite = $produitquantite;

        return $this;
    }


}
