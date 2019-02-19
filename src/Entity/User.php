<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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

    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=50, columnDefinition="ENUM('ROLE_USER' , 'ROLE_ADMIN')")
     */
    private $role;

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
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param mixed $plainPassword
     * @return User
     */
    public function setPlainPassword($plainPassword)
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


}
