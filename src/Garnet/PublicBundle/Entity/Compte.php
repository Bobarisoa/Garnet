<?php

namespace Garnet\PublicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Compte
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Garnet\PublicBundle\Repository\CompteRepository")
 */
class Compte implements UserInterface, \Serializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_COMPTE", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM_USER", type="string", length=180)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="TOKEN", type="string", length=255)
     */
    private $salt;

    /**
     * @var array
     *
     * @ORM\Column(name="ROLE", type="array")
     */
    private $roles;

    public function __construct(){
        $this->roles = array();
    }
    /**
     * @var string
     *
     * @ORM\Column(name="PRENOM", type="string", length=180)
     */
    private $prenom;

    /**
     * @var \Datetime
     *
     * @ORM\Column(name="DATE_NAISSANCE", type="date")
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="COURRIEL", type="string", length=180)
     */
    private $courriel;

    /**
     * @var string
     *
     * @ORM\Column(name="TELEPHONE", type="string", length=180)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="MOT_DE_PASSE", type="string", length=180)
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATE_INSCRIPTION", type="date")
     */
    private $dateInscription;

    /**
     * @var string
     *
     * @ORM\Column(name="ADRESSE", type="string", length=255)
     */
    private $adresse;

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
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $courriel
     */
    public function setCourriel($courriel)
    {
        $this->courriel = $courriel;
    }

    /**
     * @return string
     */
    public function getCourriel()
    {
        return $this->courriel;
    }

    /**
     * @param \DateTime $dateInscription
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;
    }

    /**
     * @return \DateTime
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * @param \Datetime $dateNaissance
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return \Datetime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param array $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param boolean $supprime
     */
    public function setSupprime($supprime)
    {
        $this->supprime = $supprime;
    }

    /**
     * @return boolean
     */
    public function getSupprime()
    {
        return $this->supprime;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }
    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
// see section on salt below
// $this->salt,
        ));
    }
    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
// see section on salt below
// $this->salt
            ) = unserialize($serialized);
    }
}
