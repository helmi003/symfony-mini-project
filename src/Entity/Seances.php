<?php

namespace App\Entity;

use App\Repository\SeancesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeancesRepository::class)
 */
class Seances
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idm;

    /**
     * @ORM\Column(type="integer")
     */
    private $ida;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $heure;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbheure;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdm(): ?int
    {
        return $this->idm;
    }

    public function setIdm(int $idm): self
    {
        $this->idm = $idm;

        return $this;
    }

    public function getIda(): ?int
    {
        return $this->ida;
    }

    public function setIda(int $ida): self
    {
        $this->ida = $ida;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?string
    {
        return $this->heure;
    }

    public function setHeure(string $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getNbheure(): ?int
    {
        return $this->nbheure;
    }

    public function setNbheure(int $nbheure): self
    {
        $this->nbheure = $nbheure;

        return $this;
    }
}
