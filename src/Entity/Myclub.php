<?php

namespace App\Entity;

use App\Repository\MyclubRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MyclubRepository::class)
 */
class Myclub
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $clubname;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
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
}
