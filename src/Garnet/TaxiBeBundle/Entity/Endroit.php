<?php

namespace Garnet\TaxiBeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Endroit
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Garnet\TaxiBeBundle\Repository\EndroitRepository")
 */
class Endroit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_ENDROIT", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBELLE", type="string", length=255)
     */
    private $libelle;


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
     * Set libelle
     *
     * @param string $libelle
     * @return Endroit
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    
        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
}
