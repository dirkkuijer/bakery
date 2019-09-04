<?php

namespace AppBundle\Entity;

use AppBUndle\Entity\Invoice;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Relation
 *
 * @ORM\Table(name="relation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RelationRepository")
 */
class Relation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Invoice", mappedBy="relation")
     */
    private $invoice;

    /**
     * private $invoices;
     *
     * @var bool
     *
     * @ORM\Column(name="kindOfRelation", type="boolean")
     */
    private $kindOfRelation;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

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
     * @var null|string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
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
     * @ORM\Column(name="allergies", type="string", length=255, nullable=true)
     */
    private $allergies;

    /**
     * @var string
     *
     * @ORM\Column(name="bankAccountNumber", type="string", length=255)
     */
    private $bankAccountNumber;

    /**
     * @var null|string
     *
     * @ORM\Column(name="extraInfo", type="string", length=255, nullable=true)
     */
    private $extraInfo;

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
     * Set kindOfRelation.
     *
     * @param bool $kindOfRelation
     *
     * @return Relation
     */
    public function setKindOfRelation($kindOfRelation)
    {
        $this->kindOfRelation = $kindOfRelation;

        return $this;
    }

    /**
     * Get kindOfRelation.
     *
     * @return bool
     */
    public function getKindOfRelation()
    {
        return $this->kindOfRelation;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Relation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set street.
     *
     * @param null|string $street
     *
     * @return Relation
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
     * @return Relation
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
     * @return Relation
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
     * @return Relation
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
     * @param null|string $telephone
     *
     * @return Relation
     */
    public function setTelephone($telephone = null)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone.
     *
     * @return null|string
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
     * @return Relation
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
     * @return Relation
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
     * Set bankAccountNumber.
     *
     * @param string $bankAccountNumber
     *
     * @return Relation
     */
    public function setBankAccountNumber($bankAccountNumber)
    {
        $this->bankAccountNumber = $bankAccountNumber;

        return $this;
    }

    /**
     * Get bankAccountNumber.
     *
     * @return string
     */
    public function getBankAccountNumber()
    {
        return $this->bankAccountNumber;
    }

    /**
     * Set extraInfo.
     *
     * @param null|string $extraInfo
     *
     * @return Relation
     */
    public function setExtraInfo($extraInfo = null)
    {
        $this->extraInfo = $extraInfo;

        return $this;
    }

    /**
     * Get extraInfo.
     *
     * @return null|string
     */
    public function getExtraInfo()
    {
        return $this->extraInfo;
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
