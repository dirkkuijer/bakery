<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CustomerRepository")
 */
class Customer
{
    /**
     * @ORM\OneToMany(targetEntity="Invoice", mappedBy="customer")
     */
    private $invoices;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var null|string
     *
     * @ORM\Column(name="firstName", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var null|string
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=true)
     */
    private $street;

    /**
     * @var null|string
     *
     * @ORM\Column(name="houseNumber", type="string", length=255, nullable=true)
     */
    private $houseNumber;

    /**
     * @var null|string
     *
     * @ORM\Column(name="postalCode", type="string", length=255, nullable=true)
     */
    private $postalCode;

    /**
     * @var null|string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="string", length=14)
     * @Assert\NotBlank
     * @Assert\Length(
     *     min=8,
     *     max=14,
     *     minMessage="Minimaal {{ limit }} cijfers invoeren aub.",
     *     maxMessage="Maximaal {{ limit }} cijfers invoeren aub."
     * )
     */
    private $telephone;

    /**
     * @var null|string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var null|string
     *
     * @ORM\Column(name="bankaccountnumber", type="string", length=255, nullable=false)
     */
    private $bankAccountNumber;

    /**
     * @var null|string
     *
     * @ORM\Column(name="allergies", type="string", length=255, nullable=true)
     */
    private $allergies;

    public function __construct()
    {
        $this->invoices = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName.
     *
     * @param null|string $firstName
     *
     * @return Customer
     */
    public function setFirstName($firstName = null)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return null|string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName.
     *
     * @param string $lastName
     *
     * @return Customer
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Get fullName.
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    /**
     * Set street.
     *
     * @param null|string $street
     *
     * @return Customer
     */
    public function setStreet($street = null)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street.
     *
     * @return null|string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set houseNumber.
     *
     * @param null|string $houseNumber
     *
     * @return Customer
     */
    public function setHouseNumber($houseNumber = null)
    {
        $this->houseNumber = $houseNumber;

        return $this;
    }

    /**
     * Get houseNumber.
     *
     * @return null|string
     */
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
     * Set postalCode.
     *
     * @param null|string $postalCode
     *
     * @return Customer
     */
    public function setPostalCode($postalCode = null)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode.
     *
     * @return null|string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set city.
     *
     * @param null|string $city
     *
     * @return Customer
     */
    public function setCity($city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city.
     *
     * @return null|string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set telephone.
     *
     * @param null|int $telephone
     *
     * @return Customer
     */
    public function setTelephone($telephone = null)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone.
     *
     * @return null|int
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email.
     *
     * @param null|string $email
     *
     * @return Customer
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return null|string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set allergies.
     *
     * @param null|string $allergies
     *
     * @return Customer
     */
    public function setAllergies($allergies = null)
    {
        $this->allergies = $allergies;

        return $this;
    }

    /**
     * Get allergies.
     *
     * @return null|string
     */
    public function getAllergies()
    {
        return $this->allergies;
    }

    /**
     * Get the value of bankAccountNumber
     *
     * @return null|string
     */
    public function getBankAccountNumber()
    {
        return $this->bankAccountNumber;
    }

    /**
     * Set the value of bankAccountNumber
     *
     * @param null|string $bankAccountNumber
     *
     * @return self
     */
    public function setBankAccountNumber($bankAccountNumber)
    {
        $this->bankAccountNumber = $bankAccountNumber;

        return $this;
    }

    /**
     * Get the value of invoices
     */
    public function getInvoices()
    {
        return $this->invoices;
    }

    /**
     * Set the value of invoices
     *
     * @param mixed $invoices
     *
     * @return self
     */
    public function setInvoices($invoices)
    {
        $this->invoices = $invoices;

        return $this;
    }
}
