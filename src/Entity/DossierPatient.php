<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DossierPatientRepository")
 */
class DossierPatient
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

    /**
     * @ORM\Column(type="integer")
     */
    private $antecedents;

    /**
     * @ORM\Column(type="integer")
     */
    private $biometric;

    /**
     * @ORM\Column(type="integer")
     */
    private $consultations;

    /**
     * @ORM\Column(type="integer")
     */
    private $ordonnance;

    /**
     * @ORM\Column(type="integer")
     */
    private $resultatAnalyses;

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

    public function getAntecedents(): ?int
    {
        return $this->antecedents;
    }

    public function setAntecedents(int $antecedents): self
    {
        $this->antecedents = $antecedents;

        return $this;
    }

    public function getBiometric(): ?int
    {
        return $this->biometric;
    }

    public function setBiometric(int $biometric): self
    {
        $this->biometric = $biometric;

        return $this;
    }

    public function getConsultations(): ?int
    {
        return $this->consultations;
    }

    public function setConsultations(int $consultations): self
    {
        $this->consultations = $consultations;

        return $this;
    }

    public function getOrdonnance(): ?int
    {
        return $this->ordonnance;
    }

    public function setOrdonnance(int $ordonnance): self
    {
        $this->ordonnance = $ordonnance;

        return $this;
    }

    public function getResultatAnalyses(): ?int
    {
        return $this->resultatAnalyses;
    }

    public function setResultatAnalyses(int $resultatAnalyses): self
    {
        $this->resultatAnalyses = $resultatAnalyses;

        return $this;
    }
}
