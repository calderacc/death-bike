<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

class IncidentRepository extends EntityRepository
{
    public function getListQuery(): Query
    {
        $qb = $this->createQueryBuilder('i');

        $qb->orderBy('i.dateTime', 'DESC');

        return $qb->getQuery();
    }
}
