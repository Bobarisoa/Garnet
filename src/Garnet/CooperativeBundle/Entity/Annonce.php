<?php

namespace Garnet\CooperativeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Garnet\CooperativeBundle\Entity\Cooperative;

/**
 * Annonce
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Garnet\CooperativeBundle\Repository\AnnonceRepository")
 */
class Annonce
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_ANNONCE", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="TEXT_ANNONCE", type="string", length=255)
     */
    private $textAnnonce;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Garnet\CooperativeBundle\Entity\Cooperative")
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $cooperative;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_CREATION", type="date")
     */
    private $dateCreation;


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
     * Set textAnnonce
     *
     * @param string $textAnnonce
     * @return Annonce
     */
    public function setTextAnnonce($textAnnonce)
    {
        $this->textAnnonce = $textAnnonce;
    
        return $this;
    }

    /**
     * Get textAnnonce
     *
     * @return string 
     */
    public function getTextAnnonce()
    {
        return $this->textAnnonce;
    }

    /**
     * Set idCooperative
     *
     * @param Garnet\CooperativeBundle\Entity\Cooperative $cooperative
     * @return Annonce
     */
    public function setCooperative(Cooperative $cooperative)
    {
        $this->cooperative = $cooperative;
    
        return $this;
    }

    /**
     * Get idCooperative
     *
     * @return Garnet\CooperativeBundle\Entity\Cooperative
     */
    public function getCooperative()
    {
        return $this->cooperative;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Annonce
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    
        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }
}
