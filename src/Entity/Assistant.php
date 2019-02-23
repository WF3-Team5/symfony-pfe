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
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="L'email est obligatoire")
     * @Assert\Email(message="Email non valide")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $password;

    /**
     * Mot de passe en clair pour interagir avec le formulaire d'inscription
     * @var string
     * @Assert\NotBlank(message="Le mot de passe est obligatoire")
     */
    private $plainPassword;


    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }


    /**
     * @param $password
     * @return Assistant
     */
    public function setPassword($password): self
    {
        $this->password = $password;
        return $this;
    }


    /**
     * @return string|null
     */
    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     * @return Assistant
     */
    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }



    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Assistant
     */
    public function setEmail($email): Assistant
    {
        $this->email = $email;
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

    /**
     * @ORM\column(type="string", length=255, nullable=true)
     */
    private $hash;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     */
    private $hashValidity;

    /**
     * @return mixed
     */
    public function getHashValidity()
    {
        return $this->hashValidity;
    }

    /**
     * @param $hashValidity
     * @return User|null
     *
     */
    public function setHashValidity($hashValidity): ?Assistant
    {
        $this->hashValidity = $hashValidity;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getHash()
    {
        return $this->hash;
    }
}
