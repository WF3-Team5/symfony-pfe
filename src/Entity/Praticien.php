<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(type="string", length=100, columnDefinition="ENUM('M','Mme')")
     */
    private $civility;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $first_name;

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
     * @Assert\NotBlank(message="L'email est obligatoire")
     * @Assert\Email(message="Email non valide")
     */
    private $email_pro;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="L'email est obligatoire")
     * @Assert\Email(message="Email non valide")
     */
    private $email_secretariat;

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
    private $etat = 'actif';

    /**
     * @ORM\Column(type="integer")
     */
    private $RPPS;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="App\Entity\Specialite", mappedBy="praticien")
     * @ORM\Column(type="string", length=50)
     */
    private $speciality;

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
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="App\Entity\Booking", mappedBy="id")
     */
    private $booking;

    public function __construct()
    {
        $this->speciality=new ArrayCollection();
        $this->booking=new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getEmailSecretariat()
    {
        return $this->email_secretariat;
    }

    /**
     * @param mixed $email_secretariat
     * @return Praticien
     */
    public function setEmailSecretariat($email_secretariat)
    {
        $this->email_secretariat = $email_secretariat;
        return $this;
    }


    /**
     * @return ArrayCollection
     */
    public function getBooking(): Collection
    {
        return $this->booking;
    }

    /**
     * @param Booking $booking
     * @return Praticien
     */
    public function addBooking(Booking $booking): self
    {
        if (!$this->booking->contains($booking)) {
            $this->booking[] = $booking;
            $booking->setPraticien($this);
        }

        return $this;
    }

    /**
     * @param Booking $booking
     * @return Praticien
     */
    public function removeBooking(Booking $booking): self
    {
        if ($this->booking->contains($booking)) {
            $this->booking->removeElement($booking);
            if ($booking->getPraticien() === $this) {
                $booking->setPraticien(null);
            }
        }

        return $this;
    }
    
    
    
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
    public function setHashValidity($hashValidity): ?Praticien
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

    /**
     * @return Collection|Specialite[]
     */
    public function getSpeciality(): Collection
    {
        return $this->speciality;
    }

    public function addSpecialite(Specialite $specialite): self
    {
        if (!$this->speciality->contains($specialite)) {
            $this->speciality[] = $specialite;
            $specialite->setPraticien($this);
        }

        return $this;
    }

    public function removeSpecialite(Specialite $specialite): self
    {
        if ($this->speciality->contains($specialite)) {
            $this->speciality->removeElement($specialite);
            if ($specialite->getPraticien() === $this) {
                $specialite->setPraticien(null);
            }
        }

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

    public function __toString()
    {
        return $this->first_name." ".$this->last_name;
    }


}
