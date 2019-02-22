<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class Praticien
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\PraticienRepository")
 */
class Praticien implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $civility;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $birth_name;

    /**
     * @ORM\Column(type="date")
     */
    private $birth_date;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $birth_department;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $place_of_birth;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $nationality;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email_pro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address_pro;

    /**
     * @ORM\Column(type="integer")
     */
    private $postal_code_pro;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $city_pro;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $phone_number_pro;

    /**
     * @ORM\Column(type="integer")
     */
    private $mobile_phone_number_pro;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $role="ROLE_MEDIC";

    /**
     * @ORM\Column(type="date")
     */
    private $dateInscription;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $etat;

    /**
     * @ORM\Column(type="integer")
     */
    private $RPPS;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $speciality;

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

    public function getBirthDepartment(): ?string
    {
        return $this->birth_department;
    }

    public function setBirthDepartment(?string $birth_department): self
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

    public function getEmailPro(): ?string
    {
        return $this->email_pro;
    }

    public function setEmailPro(string $email_pro): self
    {
        $this->email_pro = $email_pro;

        return $this;
    }

    public function getAddressPro(): ?string
    {
        return $this->address_pro;
    }

    public function setAddressPro(string $address_pro): self
    {
        $this->address_pro = $address_pro;

        return $this;
    }

    public function getPostalCodePro(): ?int
    {
        return $this->postal_code_pro;
    }

    public function setPostalCodePro(int $postal_code_pro): self
    {
        $this->postal_code_pro = $postal_code_pro;

        return $this;
    }

    public function getCityPro(): ?string
    {
        return $this->city_pro;
    }

    public function setCityPro(string $city_pro): self
    {
        $this->city_pro = $city_pro;

        return $this;
    }

    public function getPhoneNumberPro(): ?int
    {
        return $this->phone_number_pro;
    }

    public function setPhoneNumberPro(?int $phone_number_pro): self
    {
        $this->phone_number_pro = $phone_number_pro;

        return $this;
    }

    public function getMobilePhoneNumberPro(): ?int
    {
        return $this->mobile_phone_number_pro;
    }

    public function setMobilePhoneNumberPro(int $mobile_phone_number_pro): self
    {
        $this->mobile_phone_number_pro = $mobile_phone_number_pro;

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

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getRPPS(): ?int
    {
        return $this->RPPS;
    }

    public function setRPPS(int $RPPS): self
    {
        $this->RPPS = $RPPS;

        return $this;
    }

    public function getSpeciality(): ?string
    {
        return $this->speciality;
    }

    public function setSpeciality(string $speciality): self
    {
        $this->speciality = $speciality;

        return $this;
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
            $this->email_pro,
            $this->password,
            $this->address_pro,
            $this->postal_code_pro,
            $this->city_pro,
            $this->phone_number_pro,
            $this->mobile_phone_number_pro,
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
            $this->email_pro,
            $this->password,
            $this->address_pro,
            $this->postal_code_pro,
            $this->city_pro,
            $this->phone_number_pro,
            $this->mobile_phone_number_pro,
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
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->getEmailPro();
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
}