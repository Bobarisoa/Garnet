<?php

namespace Garnet\CooperativeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Garnet\CooperativeBundle\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_VOYAGE", type="integer")
     */
    private $iDVOYAGE;

    /**
     * @var integer
     *
     * @ORM\Column(name="PLACE", type="integer")
     */
    private $pLACE;

    /**
     * @var integer
     *
     * @ORM\Column(name="NUM_PLACE", type="integer")
     */
    private $nUMPLACE;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_CLIENT", type="integer")
     */
    private $iDCLIENT;

    /**
     * @var string
     *
     * @ORM\Column(name="CODE_RESERVATION", type="string", length=180)
     */
    private $cODERESERVATION;


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
     * Set iDVOYAGE
     *
     * @param integer $iDVOYAGE
     * @return Reservation
     */
    public function setIDVOYAGE($iDVOYAGE)
    {
        $this->iDVOYAGE = $iDVOYAGE;
    
        return $this;
    }

    /**
     * Get iDVOYAGE
     *
     * @return integer 
     */
    public function getIDVOYAGE()
    {
        return $this->iDVOYAGE;
    }

    /**
     * Set pLACE
     *
     * @param integer $pLACE
     * @return Reservation
     */
    public function setPLACE($pLACE)
    {
        $this->pLACE = $pLACE;
    
        return $this;
    }

    /**
     * Get pLACE
     *
     * @return integer 
     */
    public function getPLACE()
    {
        return $this->pLACE;
    }

    /**
     * Set nUMPLACE
     *
     * @param integer $nUMPLACE
     * @return Reservation
     */
    public function setNUMPLACE($nUMPLACE)
    {
        $this->nUMPLACE = $nUMPLACE;
    
        return $this;
    }

    /**
     * Get nUMPLACE
     *
     * @return integer 
     */
    public function getNUMPLACE()
    {
        return $this->nUMPLACE;
    }

    /**
     * Set iDCLIENT
     *
     * @param integer $iDCLIENT
     * @return Reservation
     */
    public function setIDCLIENT($iDCLIENT)
    {
        $this->iDCLIENT = $iDCLIENT;
    
        return $this;
    }

    /**
     * Get iDCLIENT
     *
     * @return integer 
     */
    public function getIDCLIENT()
    {
        return $this->iDCLIENT;
    }

    /**
     * Set cODERESERVATION
     *
     * @param string $cODERESERVATION
     * @return Reservation
     */
    public function setCODERESERVATION($cODERESERVATION)
    {
        $this->cODERESERVATION = $cODERESERVATION;
    
        return $this;
    }

    /**
     * Get cODERESERVATION
     *
     * @return string 
     */
    public function getCODERESERVATION()
    {
        return $this->cODERESERVATION;
    }
}
