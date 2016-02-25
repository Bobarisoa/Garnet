<?php

namespace Garnet\CooperativeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voyage
 *
 * @ORM\Table(name="VOYAGES")
 * @ORM\Entity(repositoryClass="Garnet\CooperativeBundle\Repository\VoyageRepository")
 */
class Voyage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_VOYAGE", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_VOYAGE", type="datetime")
     */
    private $dateVoyage;

    /**
     * @var String
     *
     * @ORM\Column(name="DEPART", type="string")
     */

    private $depart;

    /**
     * @var String
     *
     * @ORM\Column(name="ARRIVE", type="string")
     */

    private $arrive;
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_COOPERATIVE", type="integer")
     */
    private $idCooperative;

    /**
     * @var integer
     *
     * @ORM\Column(name="NBR_PLACE", type="integer")
     */
    private $nbrPlace;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPTION", type="text")
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="FRAIS", type="integer")
     */
    private $frais;


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
     * Set dATEVOYAGE
     *
     * @param \DateTime $dATEVOYAGE
     * @return Voyage
     */
    public function setDATEVOYAGE($datevoyage)
    {
        $this->dateVoyage = $datevoyage;
    
        return $this;
    }

    /**
     * Get dATEVOYAGE
     *
     * @return \DateTime 
     */
    public function getDateVoyage()
    {
        return $this->dateVoyage;
    }

    /**
     * @param String $arrive
     */
    public function setArrive($arrive)
    {
        $this->arrive = $arrive;
    }

    /**
     * @return String
     */
    public function getArrive()
    {
        return $this->arrive;
    }

    /**
     * @param String $depart
     */
    public function setDepart($depart)
    {
        $this->depart = $depart;
    }

    /**
     * @return String
     */
    public function getDepart()
    {
        return $this->depart;
    }

    /**
     * Set iDCOOPERATIVE
     *
     * @param integer $iDCOOPERATIVE
     * @return Voyage
     */
    public function setIdCooperative($idcooperative)
    {
        $this->idCooperative = $idcooperative;
    
        return $this;
    }

    /**
     * Get iDCOOPERATIVE
     *
     * @return integer 
     */
    public function getIdCooperative()
    {
        return $this->idCooperative;
    }

    /**
     * Set nBRPLACE
     *
     * @param integer $nBRPLACE
     * @return Voyage
     */
    public function setNbrPlace($nbrplace)
    {
        $this->nbrPlace = $nbrplace;
    
        return $this;
    }

    /**
     * Get nBRPLACE
     *
     * @return integer 
     */
    public function getnbrplace()
    {
        return $this->nbrPlace;
    }

    /**
     * Set dESCRIPTION
     *
     * @param string $dESCRIPTION
     * @return Voyage
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get dESCRIPTION
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set fRAIS
     *
     * @param integer $fRAIS
     * @return Voyage
     */
    public function setFrais($frais)
    {
        $this->frais = $frais;
    
        return $this;
    }

    /**
     * Get fRAIS
     *
     * @return integer 
     */
    public function getFrais()
    {
        return $this->frais;
    }
}
