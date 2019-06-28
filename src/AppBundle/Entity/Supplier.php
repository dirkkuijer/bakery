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
     * @var int|null
     *
     * @ORM\Column(name="telephone", type="integer", nullable=true)
     */
    private $telephone;
   
    /**
     * @var string|null
     *
     * @ORM\Column(name="bankaccountnumber", type="string", length=255, nullable=false)
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
     * @param int|null $telephone
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
     * @return int|null
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set extraInfo.
     *
     * @param string|null $extraInfo
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
     * @return string|null
     */
    public function getExtraInfo()
    {
        return $this->extraInfo;
    }

    /**
     * Get the value of bankAccountNumber
     *
     * @return  string|null
     */ 
    public function getBankAccountNumber()
    {
        return $this->bankAccountNumber;
    }

    /**
     * Set the value of bankAccountNumber
     *
     * @param  string|null  $bankAccountNumber
     *
     * @return  self
     */ 
    public function setBankAccountNumber($bankAccountNumber)
    {
        $this->bankAccountNumber = $bankAccountNumber;

        return $this;
    }
}
