<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Invoice
 *
 * @ORM\Table(name="invoice")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoiceRepository")
 * @UniqueEntity("invoiceNumber")
 */
class Invoice
{
    /**
     * @ORM\ManyToOne(targetEntity="Relation", inversedBy="invoice")
     * @ORM\JoinColumn(name="relation_id", referencedColumnName="id")
     */
    private $relation;
    // zet bij de entities de toegang niet op private maar op protected.
    //Hierdoor kun je er beter instanties van maken indien nodig.
    // ID zet je ALTIJD op private i.v.m. de veiligheid.

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    // /**
    //  * @var string
    //  *
    //  * @ORM\Column(name="firstname", type="string", length=255)
    //  */
    // private $firstName;

    // /**
    //  * @var string
    //  *
    //  * @ORM\Column(name="lastName", type="string", length=255)
    //  */
    // private $lastName;

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
     * @ORM\Column(name="invoiceNumber", type="string", length=255, unique=true)
     */
    private $invoiceNumber;

    /**
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;
    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float", length=255)
     */
    private $amount;

    /**
     * @var float
     *
     * @ORM\Column(name="amountWithVat", type="float", length=255)
     */
    private $amountWithVat;

    /**
     * @var float
     *
     * @ORM\Column(name="vatAmount", type="float", length=255)
     */
    private $vatAmount;

    /**
     * @var int
     *
     * @ORM\Column(name="vatPercentage", type="integer", length=255)
     */
    private $vatPercentage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="invoiceSend", type="date", nullable=true)
     * @Assert\Date
     */
    private $invoiceSend;

    /**
     * @var boolean
     *
     * @ORM\Column(name="statusPayment", type="boolean")
     */
    private $statusPayment;

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
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @param string $amount
     *
     * @return self
     */
    public function setAmount(string $amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get the value of amountWithVat
     *
     * @return string
     */
    public function getAmountWithVat()
    {
        $this->getAmountWithVat = $this->getAmount() + $this->getVatAmount();

        return $this->amountWithVat;
    }

    /**
     * Set the value of amountWithVat
     *
     * @param string $amountWithVat
     *
     * @return self
     */
    public function setAmountWithVat(string $amountWithVat)
    {
        $this->amountWithVat = $amountWithVat;

        return $this;
    }

    /**
     * Get the value of vatAmount
     *
     * @return string
     */
    public function getVatAmount()
    {
        $amount = $this->getAmount();
        $vat = $this->getVatPercentage();
        $vatAmount = ($amount / 100) * $vat;

        return $this->vatAmount;
    }

    /**
     * Set the value of vatAmount
     *
     * @param string $vatAmount
     *
     * @return self
     */
    public function setVatAmount(string $vatAmount)
    {
        $this->vatAmount = $vatAmount;

        return $this;
    }

    /**
     * Get the value of vatPercentage
     *
     * @return string
     */
    public function getVatPercentage()
    {
        return $this->vatPercentage;
    }

    /**
     * Set the value of vatPercentage
     *
     * @param string $vatPercentage
     *
     * @return self
     */
    public function setVatPercentage(string $vatPercentage)
    {
        $this->vatPercentage = $vatPercentage;

        return $this;
    }

    /**
     * Get the value of relation
     */
    public function getRelation()
    {
        return $this->relation;
    }

    /**
     * Set the value of relation
     *
     * @param mixed $relation
     *
     * @return self
     */
    public function setRelation($relation)
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * Get the value of invoiceSend
     *
     * @return date
     */
    public function getInvoiceSend()
    {
        return $this->invoiceSend;
    }

    /**
     * Set the value of invoiceSend
     *
     * @param date $invoiceSend
     *
     * @return self
     */
    public function setInvoiceSend($invoiceSend)
    {
        $this->invoiceSend = $invoiceSend;

        return $this;
    }

    /**
     * Get the value of statusPayment
     *
     * @return boolean
     */
    public function getStatusPayment()
    {
        return $this->statusPayment;
    }

    /**
     * Set the value of status
     *
     * @param bool  $status
     * @param mixed $statusPayment
     *
     * @return self
     */
    public function setStatusPayment($statusPayment)
    {
        $this->statusPayment = $statusPayment;

        return $this;
    }

    /**
     * Get the value of reference
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set the value of reference
     *
     * @param mixed $reference
     *
     * @return self
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }
}
