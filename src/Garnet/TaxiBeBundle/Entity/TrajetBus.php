<?php

namespace Garnet\TaxiBeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrajetBus
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Garnet\TaxiBeBundle\Repository\TrajetBusRepository")
 */
class TrajetBus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Ligne", type="string", length=255)
     */
    private $ligne;

    /**
     * @var string
     *
     * @ORM\Column(name="Endroit", type="string", length=255)
     */
    private $endroit;


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
     * Set ligne
     *
     * @param string $ligne
     * @return TrajetBus
     */
    public function setLigne($ligne)
    {
        $this->ligne = $ligne;
    
        return $this;
    }

    /**
     * Get ligne
     *
     * @return string 
     */
    public function getLigne()
    {
        return $this->ligne;
    }

    /**
     * Set endroit
     *
     * @param string $endroit
     * @return TrajetBus
     */
    public function setEndroit($endroit)
    {
        $this->endroit = $endroit;
    
        return $this;
    }

    /**
     * Get endroit
     *
     * @return string 
     */
    public function getEndroit()
    {
        return $this->endroit;
    }
}
