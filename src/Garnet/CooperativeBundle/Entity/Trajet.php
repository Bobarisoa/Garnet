<?php

namespace Garnet\CooperativeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trajet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Garnet\CooperativeBundle\Repository\TrajetRepository")
 */
class Trajet
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
     * @var integer
     *
     * @ORM\Column(name="ID_COOPERATIVE", type="integer")
     *
     */
    private $idCooperative;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_VILLE", type="integer")
     */
    private $idVille;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getIdCooperative()
    {
        return $this->idCooperative;
    }

    /**
     * Set idVille
     *
     * @param integer $idVille
     * @return Trajet
     */
    public function setIdVille($idVille)
    {
        $this->idVille = $idVille;
    
        return $this;
    }

    /**
     * Get idVille
     *
     * @return integer 
     */
    public function getIdVille()
    {
        return $this->idVille;
    }
}
