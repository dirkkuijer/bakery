<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * File
 *
 * @ORM\Table(name="file")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FileRepository")
 */
class File
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
     * @ORM\Column(name="filename", type="string", length=255, unique=true, nullable=true)
     */
    private $filename;
   
    /**
     * @var date
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var period
     ** @ORM\Column(name="period", type="integer")
     */
    private $period;
    
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
     * Set filename.
     *
     * @param string $filename
     *
     * @return File
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename.
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }
    /**
     * Get date.
     *
     * @return date
     */
    public function getDate()
    {
        return $this->date;
    }
    
    /**
     * Set date.
     *
     * @param string $date
     *
     * @return File
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of period
     *
     * @return  period
     */ 
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set the value of period
     *
     * @param  period  $period
     *
     * @return  self
     */ 
    public function setPeriod($period)
    {
        $this->period = $period;

        return $this;
    }
}
