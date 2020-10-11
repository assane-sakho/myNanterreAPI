<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FrequentationCafet
 *
 * @ORM\Table(name="frequentation_cafet", indexes={@ORM\Index(name="fk_frequentation_crous_batiment", columns={"id_cafet"})})
 * @ORM\Entity(repositoryClass="App\Repository\FrequentationCafetRepository")
 */
class FrequentationCafet
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
     * @var int
     *
     * @ORM\Column(name="heure", type="integer", nullable=false)
     */
    private $heure;

    /**
     * @var int
     *
     * @ORM\Column(name="proportion", type="integer", nullable=false)
     */
    private $proportion;

    /**
     * @var \Crous
     *
     * @ORM\ManyToOne(targetEntity="Crous")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cafet", referencedColumnName="id_bat")
     * })
     */
    private $idCafet;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeure(): ?int
    {
        return $this->heure;
    }

    public function setHeure(int $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getProportion(): ?int
    {
        return $this->proportion;
    }

    public function setProportion(int $proportion): self
    {
        $this->proportion = $proportion;

        return $this;
    }

    public function getIdCafet(): ?Crous
    {
        return $this->idCafet;
    }

    public function setIdCafet(?Crous $idCafet): self
    {
        $this->idCafet = $idCafet;

        return $this;
    }


}
