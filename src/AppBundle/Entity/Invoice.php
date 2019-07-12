<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invoice
 *
 * @ORM\Table(name="invoice")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoiceRepository")
 */
class Invoice
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
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="invoiceNumber", type="string", length=255)
     */
    private $invoiceNumber;

     /**
     * @var string
     *
     * @ORM\Column(name="amount", type="string", length=255)
     */
    private $amount;

    /**
     * @var string
     * 
     * @ORM\Column(name="amountWithVat", type="string", length=255)
     */
    private $amountWithVat;

    /**
     * @var string
     * 
     * @ORM\Column(name="vatAmount", type="string", length=255)
     */
    private $vatAmount;

    /**
     * @var string
     * 
     * @ORM\Column(name="vatPercentage", type="string", length=255)
     */
    private $vatPercentage;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstName
     *
     * @return Invoice
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Invoice
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Invoice
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Invoice
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set invoiceNumber
     *
     * @param string $invoiceNumber
     *
     * @return Invoice
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    /**
     * Get invoiceNumber
     *
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * Get the value of amount
     *
     * @return  string
     */ 
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @param  string  $amount
     *
     * @return  self
     */ 
    public function setAmount(string $amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get the value of amountWithVat
     *
     * @return  string
     */ 
    public function getAmountWithVat()
    {
        return $this->amountWithVat;
    }

    /**
     * Set the value of amountWithVat
     *
     * @param  string  $amountWithVat
     *
     * @return  self
     */ 
    public function setAmountWithVat(string $amountWithVat)
    {
        $this->amountWithVat = $amountWithVat;

        return $this;
    }

    /**
     * Get the value of vatAmount
     *
     * @return  string
     */ 
    public function getVatAmount()
    {
        return $this->vatAmount;
    }

    /**
     * Set the value of vatAmount
     *
     * @param  string  $vatAmount
     *
     * @return  self
     */ 
    public function setVatAmount(string $vatAmount)
    {
        $this->vatAmount = $vatAmount;

        return $this;
    }

    /**
     * Get the value of vatPercentage
     *
     * @return  string
     */ 
    public function getVatPercentage()
    {
        return $this->vatPercentage;
    }

    /**
     * Set the value of vatPercentage
     *
     * @param  string  $vatPercentage
     *
     * @return  self
     */ 
    public function setVatPercentage(string $vatPercentage)
    {
        $this->vatPercentage = $vatPercentage;

        return $this;
    }
}

