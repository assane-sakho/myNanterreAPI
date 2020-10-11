<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FrequentationBu
 *
 * @ORM\Table(name="frequentation_bu", indexes={@ORM\Index(name="id_bu", columns={"id_bu"})})
 * @ORM\Entity(repositoryClass="App\Repository\FrequentationBuRepository")
 */
class FrequentationBu
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
     * @ORM\Column(name="proportion", type="integer", nullable=false)
     */
    private $proportion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="heure", type="integer", nullable=true)
     */
    private $heure;

    /**
     * @var \Bibliotheque
     *
     * @ORM\ManyToOne(targetEntity="Bibliotheque")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_bu", referencedColumnName="id")
     * })
     */
    private $idBu;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getHeure(): ?int
    {
        return $this->heure;
    }

    public function setHeure(?int $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getIdBu(): ?Bibliotheque
    {
        return $this->idBu;
    }

    public function setIdBu(?Bibliotheque $idBu): self
    {
        $this->idBu = $idBu;

        return $this;
    }


}
