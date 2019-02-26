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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $antecedents;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $biometric;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $consultations;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ordonnance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $resultatAnalyses;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $numDossier;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="dossierPatient")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Praticien", inversedBy="dossierPatient")
     */
    private $praticien;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return DossierPatient
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }



    /**
     * @return string
     */
    public function getNumDossier()
    {
        return $this->numDossier;
    }

    /**
     * @param mixed $numDossier
     * @return DossierPatient
     */
    public function setNumDossier($numDossier): DossierPatient
    {
        $this->numDossier = $numDossier;
        return $this;
    }

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

    public function getPraticien()
    {
        return $this->praticien;
    }

    public function setPraticien($praticien): self
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
