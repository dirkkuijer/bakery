<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Supplier
 *
 * @ORM\Table(name="supplier")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SupplierRepository")
 */
class Supplier
{
    /**
     * @ORM\OneToMany(targetEntity="Invoice", mappedBy="supplier")
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var null|int
     *
     * @ORM\Column(name="telephone", type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @var null|string
     *
     * @ORM\Column(name="bankaccountnumber", type="string", length=255, nullable=false)
     */
    private $bankAccountNumber;

    /**
     * @var null|string
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
     * Set name.
     *
     * @param string $name
     *
     * @return Supplier
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
     * Set email.
     *
     * @param string $email
     *
     * @return Supplier
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone.
     *
     * @param null|int $telephone
     *
     * @return Supplier
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
     * Set extraInfo.
     *
     * @param null|string $extraInfo
     *
     * @return Supplier
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
