<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieSport
 *
 * @ORM\Table(name="categorie_sport")
 * @ORM\Entity(repositoryClass="App\Repository\CategorieSportRepository")
 */
class CategorieSport
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_categorie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCategorie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="categorie", type="string", length=100, nullable=true)
     */
    private $categorie;

    public function getIdCategorie(): ?int
    {
        return $this->idCategorie;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(?string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }


}
