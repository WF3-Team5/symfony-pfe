<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ValiditeInscriptionRepository")
 */
class ValiditeInscription
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $praticien;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hash;

    /**
     * @ORM\Column(type="datetime")
     */
    private $hashValidity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPraticien(): ?int
    {
        return $this->praticien;
    }

    public function setPraticien(int $praticien): self
    {
        $this->praticien = $praticien;

        return $this;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getHashValidity(): ?\DateTimeInterface
    {
        return $this->hashValidity;
    }

    public function setHashValidity(\DateTimeInterface $hashValidity): self
    {
        $this->hashValidity = $hashValidity;

        return $this;
    }
}
