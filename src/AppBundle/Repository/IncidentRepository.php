<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

class IncidentRepository extends EntityRepository
{
    public function getListQuery(int $year = null): Query
    {
        $builder = $this->createQueryBuilder('i');

        $builder
            ->select('i')
            ->orderBy('i.dateTime', 'DESC')
        ;

        if ($year) {
            $startDateTime = new \DateTime($year . '-01-01 00:00:00');
            $endDateTime = new \DateTime($year . '-12-31 23:59:59');

            $builder
                ->where($builder->expr()->gte('i.dateTime', ':startDateTime'))
                ->andWhere($builder->expr()->lte('i.dateTime', ':endDateTime'))
                ->setParameter('startDateTime', $startDateTime)
                ->setParameter('endDateTime', $endDateTime)
            ;
        }

        return $builder->getQuery();
    }

    public function findByYear(int $year): array
    {
        $query = $this->getListQuery($year);

        return $query->getResult();
    }
}
