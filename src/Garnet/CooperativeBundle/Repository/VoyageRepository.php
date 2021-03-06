<?php

namespace Garnet\CooperativeBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * VoyageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VoyageRepository extends EntityRepository
{
    /**
     * Lister les voyages par cooperative
     */
    public function getVoyageByCooperative($idCoop){
        $query = $this->createQueryBuilder('v')
            ->where("v.idCooperative = :idCooperative")
            ->orderBy("v.dateVoyage")
            ->setMaxResults(10)
            ->setParameter('idCooperative', $idCoop)
            ->getQuery()
            ->getResult();

        return $query;
    }
}
