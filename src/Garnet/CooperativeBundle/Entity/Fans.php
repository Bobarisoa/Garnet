<?php

namespace Garnet\CooperativeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trajet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Garnet\CooperativeBundle\Repository\TrajetRepository")
 */
class Fans
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
     * @ORM\Column(name="ID_COMPTE", type="integer")
     */
    private $idCompte;

    /**
     * @param int $idCompte
     */
    public function setIdCompte($idCompte)
    {
        $this->idCompte = $idCompte;
    }

    /**
     * @return int
     */
    public function getIdCompte()
    {
        return $this->idCompte;
    }

    /**
     * @param int $idCooperative
     */
    public function setIdCooperative($idCooperative)
    {
        $this->idCooperative = $idCooperative;
    }

    /**
     * @return int
     */
    public function getIdCooperative()
    {
        return $this->idCooperative;
    }


}
