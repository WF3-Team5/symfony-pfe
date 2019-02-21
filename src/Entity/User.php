<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class User
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="Il existe déjà un utilisateur avec cet email")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, columnDefinition="ENUM('M','Mme')")
     */
    private $civility;

    /**
     * @ORM\Column(type="string", length=50, columnDefinition="ENUM('H','F')")
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Le nom est obligatoire")
     * @Assert\Length(max="50",
     *     maxMessage="Le nom ne doit pas faire plus de {{ limit }} caractères")
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Le prénom est obligatoire")
     * @Assert\Length(max="50",
     *     maxMessage="Le prénom ne doit pas faire plus de {{ limit }} caractères")
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Length(max="50",
     *     maxMessage="Le nom de naissance ne doit pas faire plus de {{ limit }} caractères")
     */
    private $birth_name;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="La date de naissance est obligatoire")
     *
     */
    private $birth_date;

    /**
     * @ORM\ManyToOne(targetEntity="Departement")
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $birth_department;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $place_of_birth;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $nationality;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="L'e-mail est obligatoire")
     * @Assert\Email(message="L'e-mail n'est pas valide")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="L'adresse est obligatoire")
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Le code postal est obligatoire")
     */
    private $postal_code;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="La ville est obligatoire")
     */
    private $city;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $phone_number;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Le Numéro de portable est obligatoire")
     */
    private $mobile_phone_number;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=50, columnDefinition="ENUM('patient', 'medic', 'assistant', 'admin')")
     *
     */
    private $status;

    /**
     * Mot de passe en clair pour interagir avec le formulaire d'inscription
     * @var string
     * @Assert\NotBlank(message="Le mot de passe est obligatoire")
     */
    private $plainPassword;

    /**

     * @ORM\Column(type="string", length=50, columnDefinition="ENUM('ROLE_USER' , 'ROLE_MEDIC' , 'ROLE_ASSISTANT' ,'ROLE_ADMIN')")
     */
    private $role="ROLE_USER";

    /**
     * @ORM\Column(type="date", nullable=true)
     *
     */
    private $dateInscription;

    /**
     * 3 etats possibles: active - inactive - attente
     *  @ORM\Column(type="string", length=20, nullable=false, options={"default":"attente"})
     *  @Assert\NotBlank(message="Le Numéro de portable est obligatoire")
     */
    private $etat;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $codeActivation;


    /**
     * @ORM\Column(type="string", length=15, nullable=false)
     * @Assert\NotBlank(message="Le numero de sécurité sociale ne peut pas être vide!")
     * @Assert\Length(min="15",max="15",
     *     exactMessage="Le numéro de sécurité sociale doit comporter exactement {{ limit }} caractères.")
     */
    private $numeroSecu;

    /**
     * @return mixed
     */
    public function getNumeroSecu()
    {
        return $this->numeroSecu;
    }

    /**
     * @param mixed $numeroSecu
     * @return User
     */
    public function setNumeroSecu($numeroSecu)
    {
        $this->numeroSecu = $numeroSecu;
        return $this;
    }




    /**
     * @return mixed
     */
    public function getCodeActivation()
    {
        return $this->codeActivation;
    }

    /**
     * @param string $codeActivation
     * @return User
     */
    public function setCodeActivation($codeActivation): User
    {
        $this->codeActivation = $codeActivation;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     * @return User
     */
    public function setEtat($etat): User
    {
        $this->etat = $etat;
        return $this;
    }



    /**
     * @return date
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * @param mixed $dateInscription
     * @return User
     */
    public function setDateInscription($dateInscription): User
    {
        $this->dateInscription = $dateInscription;
        return $this;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCivility(): ?string
    {
        return $this->civility;
    }

    public function setCivility(string $civility): self
    {
        $this->civility = $civility;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getBirthName(): ?string
    {
        return $this->birth_name;
    }

    public function setBirthName(string $birth_name): self
    {
        $this->birth_name = $birth_name;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birth_date;
    }

    public function setBirthDate(\DateTimeInterface $birth_date): self
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    public function getBirthDepartment(): ?Departement
    {
        return $this->birth_department;
    }

    public function setBirthDepartment(?Departement $birth_department): self
    {
        $this->birth_department = $birth_department;

        return $this;
    }

    public function getPlaceOfBirth(): ?string
    {
        return $this->place_of_birth;
    }

    public function setPlaceOfBirth(?string $place_of_birth): self
    {
        $this->place_of_birth = $place_of_birth;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(?string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postal_code;
    }

    public function setPostalCode(int $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(?int $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getMobilePhoneNumber(): ?int
    {
        return $this->mobile_phone_number;
    }

    public function setMobilePhoneNumber(int $mobile_phone_number): self
    {
        $this->mobile_phone_number = $mobile_phone_number;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param mixed $plainPassword
     * @return User
     */
    public function setPlainPassword($plainPassword): User
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return User
     */
    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }

    public function __toString(): string
    {
        return $this->first_name." ".$this->last_name;
    }

    /**
     * String representation of object
     * @link https://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize([
            $this->id,
            $this->last_name,
            $this->first_name,
            $this->civility,
            $this->gender,
            $this->birth_name,
            $this->birth_date,
            $this->birth_department,
            $this->place_of_birth,
            $this->nationality,
            $this->email,
            $this->password,
            $this->address,
            $this->postal_code,
            $this->city,
            $this->phone_number,
            $this->mobile_phone_number,
            $this->status,
            $this->role,
        ]);
    }

    /**
     * Constructs the object
     * @link https://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->last_name,
            $this->first_name,
            $this->civility,
            $this->gender,
            $this->birth_name,
            $this->birth_date,
            $this->birth_department,
            $this->place_of_birth,
            $this->nationality,
            $this->email,
            $this->password,
            $this->address,
            $this->postal_code,
            $this->city,
            $this->phone_number,
            $this->mobile_phone_number,
            $this->status,
            $this->role,
            )= unserialize($serialized);
    }



    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return ['ROLE_USER'];
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return [$this->role];
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->getEmail();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
