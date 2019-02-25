<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BiometricRepository")
 */
class Biometric
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
    private $patient;

    /**
     * @ORM\Column(type="integer")
     */
    private $praticien;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatient(): ?int
    {
        return $this->patient;
    }

    public function setPatient(int $patient): self
    {
        $this->patient = $patient;

        return $this;
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
}
