<?php

namespace Garnet\CooperativeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cooperative
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Garnet\CooperativeBundle\Repository\CooperativeRepository")
 */
class Cooperative
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_COOPERATIVE", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM", type="string", length=180)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPTION", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_CREATION", type="date")
     */
    private $dateCreation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ACTIF", type="boolean")
     */
    private $actif;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_DERNIER_CONNEXION", type="date")
     */
    private $dateDerniereConnexion;
    /**
     * @var boolean
     *
     * @ORM\Column(name="SUPPRIME", type="boolean")
     */
    private $supprime;


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
     * Set nom
     *
     * @param string $nom
     * @return Cooperative
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Cooperative
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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Cooperative
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

    /**
     * Set actif
     *
     * @param boolean $actif
     * @return Cooperative
     */
    public function setActif($actif)
    {
        $this->actif = $actif;
    
        return $this;
    }

    /**
     * Get actif
     *
     * @return boolean 
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * @param \DateTime $dateDerniereConnexion
     */
    public function setDateDerniereConnexion($dateDerniereConnexion)
    {
        $this->dateDerniereConnexion = $dateDerniereConnexion;
    }

    /**
     * @return \DateTime
     */
    public function getDateDerniereConnexion()
    {
        return $this->dateDerniereConnexion;
    }



    /**
     * Set supprime
     *
     * @param boolean $supprime
     * @return Cooperative
     */
    public function setSupprime($supprime)
    {
        $this->supprime = $supprime;
    
        return $this;
    }

    /**
     * Get supprime
     *
     * @return boolean 
     */
    public function getSupprime()
    {
        return $this->supprime;
    }
}
