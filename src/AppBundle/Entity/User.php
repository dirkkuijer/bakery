<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     */
    protected $plainPassword;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $system = false;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Get the value of system
     */
    public function getSystem()
    {
        return $this->system;
    }

    /**
     * Set the value of system
     *
     * @param mixed $system
     *
     * @return self
     */
    public function setSystem($system)
    {
        $this->system = $system;

        return $this;
    }
}
