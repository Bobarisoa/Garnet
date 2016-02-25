<?php

namespace Garnet\CooperativeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Messages
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Garnet\CooperativeBundle\Repository\MessagesRepository")
 */
class Messages
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_MESSAGE", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_SRC", type="integer")
     */
    private $idSrc;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_DST", type="integer")
     */
    private $idDst;

    /**
     * @var string
     *
     * @ORM\Column(name="MESSAGE", type="string", length=255)
     */
    private $message;

    /**
     * @var boolean
     *
     * @ORM\Column(name="SUPPRIME_DST", type="boolean")
     */
    private $supprimeDst;

    /**
     * @var boolean
     *
     * @ORM\Column(name="SUPPRIME_SRC", type="boolean")
     */
    private $supprimeSrc;

    /**
     * @var boolean
     *
     * @ORM\Column(name="LU", type="boolean")
     */
    private $lu;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idSrc
     *
     * @param integer $idSrc
     * @return Messages
     */
    public function setIdSrc($idSrc)
    {
        $this->idSrc = $idSrc;
    
        return $this;
    }

    /**
     * Get idSrc
     *
     * @return integer 
     */
    public function getIdSrc()
    {
        return $this->idSrc;
    }

    /**
     * Set idDst
     *
     * @param integer $idDst
     * @return Messages
     */
    public function setIdDst($idDst)
    {
        $this->idDst = $idDst;
    
        return $this;
    }

    /**
     * Get idDst
     *
     * @return integer 
     */
    public function getIdDst()
    {
        return $this->idDst;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Messages
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set supprimeDst
     *
     * @param boolean $supprimeDst
     * @return Messages
     */
    public function setSupprimeDst($supprimeDst)
    {
        $this->supprimeDst = $supprimeDst;
    
        return $this;
    }

    /**
     * Get supprimeDst
     *
     * @return boolean 
     */
    public function getSupprimeDst()
    {
        return $this->supprimeDst;
    }

    /**
     * Set supprimeSrc
     *
     * @param boolean $supprimeSrc
     * @return Messages
     */
    public function setSupprimeSrc($supprimeSrc)
    {
        $this->supprimeSrc = $supprimeSrc;
    
        return $this;
    }

    /**
     * Get supprimeSrc
     *
     * @return boolean 
     */
    public function getSupprimeSrc()
    {
        return $this->supprimeSrc;
    }

    /**
     * Set lu
     *
     * @param boolean $lu
     * @return Messages
     */
    public function setLu($lu)
    {
        $this->lu = $lu;
    
        return $this;
    }

    /**
     * Get lu
     *
     * @return boolean 
     */
    public function getLu()
    {
        return $this->lu;
    }
}
