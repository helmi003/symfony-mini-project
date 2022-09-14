<?php

namespace App\Entity;
use App\Entity\Clubname;
use App\Repository\ClubsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClubsRepository::class)
 */
class Clubs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $clubname;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $clubmail;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $clubnumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $clubadresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClubname(): ?string
    {
        return $this->clubname;
    }

    public function setClubname(string $clubname): self
    {
        $this->clubname = $clubname;

        return $this;
    }

    public function getClubmail(): ?string
    {
        return $this->clubmail;
    }

    public function setClubmail(string $clubmail): self
    {
        $this->clubmail = $clubmail;

        return $this;
    }

    public function getClubnumber(): ?string
    {
        return $this->clubnumber;
    }

    public function setClubnumber(string $clubnumber): self
    {
        $this->clubnumber = $clubnumber;

        return $this;
    }

    public function getClubadresse(): ?string
    {
        return $this->clubadresse;
    }

    public function setClubadresse(string $clubadresse): self
    {
        $this->clubadresse = $clubadresse;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
