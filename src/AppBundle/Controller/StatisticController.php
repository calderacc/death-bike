<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Incident;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StatisticController extends AbstractController
{
    public function indexAction(Request $request, int $year = null): Response
    {
        if (!$year) {
            $dateTime = new \DateTime();
            $year = $dateTime->format('Y');
        }

        $incidentList = $this->getIncidentList($year);

        $statistic = $this->calculateStatistic($incidentList);

        return $this->render(
            'AppBundle:Statistic:index.html.twig',
            [
                'year' => $year,
                'statistic' => $statistic,
            ]
        );
    }

    protected function calculateStatistic(array $incidentList): array
    {
        $statistic = [];

        $statistic['sex'] = [
            'f' => 0,
            'm' => 0,
            'unknown' => 0,
        ];

        $statistic['age'] = [
            10 => 0,
            20 => 0,
            30 => 0,
            40 => 0,
            50 => 0,
            60 => 0,
            70 => 0,
            80 => 0,
            90 => 0,
            100 => 0,
            'unkown' => 0,
        ];

        /** @var Incident $incident */
        foreach ($incidentList as $incident) {
            $sex = $incident->getAccidentSex();

            if (!$sex) {
                $sex = 'unknwon';
            }

            ++$statistic['sex'][$sex];

            /*************************/

            $age = $incident->getAccidentAge();

            if (!$age) {
                $ageCluster = 'unkown';
            } else {
                $ageCluster = ceil($age/10.0)*10;
            }

            ++$statistic['age'][$ageCluster];
        }





        return $statistic;
    }
}
