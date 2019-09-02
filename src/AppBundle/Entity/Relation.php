<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Relation
 *
 * @ORM\Table(name="relation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RelationRepository")
 */
class Relation
{
    
    
    public function __construct()
    {
        $this->invoices = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
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
     * @var string|null
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=true)
     */
    private $street;

    /**
     * @var string|null
     *
     * @ORM\Column(name="houseNumber", type="string", length=255, nullable=true)
     */
    private $houseNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postalCode", type="string", length=255, nullable=true)
     */
    private $postalCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string|null
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
     * @var string|null
     *
     * @ORM\Column(name="extraInfo", type="string", length=255, nullable=true)
     */
    private $extraInfo;

    
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
     * @param string|null $street
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
     * @return string|null
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set houseNumber.
     *
     * @param string|null $houseNumber
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
     * @return string|null
     */
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
     * Set postalCode.
     *
     * @param string|null $postalCode
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
     * @return string|null
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set city.
     *
     * @param string|null $city
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
     * @return string|null
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set telephone.
     *
     * @param string|null $telephone
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
     * @return string|null
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email.
     *
     * @param string|null $email
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
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set allergies.
     *
     * @param string|null $allergies
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
     * @return string|null
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
     * @param string|null $extraInfo
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
     * @return string|null
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
