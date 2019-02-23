<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AssistantRepository")
 */
class Assistant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Le nom est obligatoire")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Le prénom est obligatoire")
     */
    private $prenom;

    /**
     *
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank(message="Le mot de passe est obligatoire")
     */
    private $mdp;
    /**
     * @ORM\Column(type="string", length=200)
     * @Assert\NotBlank(message="l'adresse mailest obligatoire")
     */
  private $email;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Assistant
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     * @return Assistant
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }
}
