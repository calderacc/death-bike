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

        $statistic['accidentType'] = [
            Incident::ACCIDENT_TYPE_SOLO => 0,
            Incident::ACCIDENT_TYPE_UNKNOWN => 0,
            Incident::ACCIDENT_TYPE_OTHER => 0,
            Incident::ACCIDENT_TYPE_CROSSING => 0,
            Incident::ACCIDENT_TYPE_RAILROADCROSSING => 0,
            Incident::ACCIDENT_TYPE_RIGHTOFWAY => 0,
            Incident::ACCIDENT_TYPE_REDLIGHT => 0,
            Incident::ACCIDENT_TYPE_RIGHTTURN => 0,
            Incident::ACCIDENT_TYPE_FRONTAL => 0,
            Incident::ACCIDENT_TYPE_OVERTAKE => 0,
            Incident::ACCIDENT_TYPE_RAM => 0,
            Incident::ACCIDENT_TYPE_PULLIN => 0,
            Incident::ACCIDENT_TYPE_DOORING => 0,
        ];

        $statistic['infrastructure'] = [
            Incident::ACCIDENT_INFRASTRUCTURE_ROAD => 0,
            Incident::ACCIDENT_INFRASTRUCTURE_CYCLEPATH => 0,
            Incident::ACCIDENT_INFRASTRUCTURE_SIDEWALK => 0,
            Incident::ACCIDENT_INFRASTRUCTURE_FREEDSIDEWALK => 0,
            Incident::ACCIDENT_INFRASTRUCTURE_COMBINED => 0,
            Incident::ACCIDENT_INFRASTRUCTURE_RADFAHRSTREIFEN => 0,
            Incident::ACCIDENT_INFRASTRUCTURE_SCHUTZSTREIFEN => 0,
            Incident::ACCIDENT_INFRASTRUCTURE_FAHRRADSTRASSE => 0,
            Incident::ACCIDENT_INFRASTRUCTURE_OTHER => 0,
        ];

        $statistic['opponent'] = [
            Incident::ACCIDENT_OPPONENT_PEDESTRIAN => 0,
            Incident::ACCIDENT_OPPONENT_CYCLIST => 0,
            Incident::ACCIDENT_OPPONENT_MOTORCYCLE => 0,
            Incident::ACCIDENT_OPPONENT_CAR => 0,
            Incident::ACCIDENT_OPPONENT_TRUCK => 0,
            Incident::ACCIDENT_OPPONENT_TRACTOR => 0,
            Incident::ACCIDENT_OPPONENT_TRAIN => 0,
            Incident::ACCIDENT_OPPONENT_TRAM => 0,
            Incident::ACCIDENT_OPPONENT_ANIMAL => 0,
            Incident::ACCIDENT_OPPONENT_NONE => 0,
            Incident::ACCIDENT_OPPONENT_UNKNOWN => 0,
        ];

        $statistic['pedelec'] = [
            true => 0,
            false => 0,
            null => 0,
        ];

        $statistic['helmet'] = [
            true => 0,
            false => 0,
            null => 0,
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

            $accidentType = $incident->getAccidentType();

            if (!$accidentType) {
                $accidentType = Incident::ACCIDENT_TYPE_UNKNOWN;
            }

            ++$statistic['accidentType'][$accidentType];

            $infrastructure = $incident->getAccidentInfrastructure();

            if (!$infrastructure) {
                $infrastructure = Incident::ACCIDENT_INFRASTRUCTURE_OTHER;
            }

            ++$statistic['infrastructure'][$infrastructure];

            $opponent = $incident->getAccidentOpponent();

            if (!$opponent) {
                $opponent = Incident::ACCIDENT_OPPONENT_UNKNOWN;
            }

            ++$statistic['opponent'][$opponent];

            ++$statistic['pedelec'][$incident->getAccidentPedelec()];

            ++$statistic['helmet'][$incident->getAccidentHelmet()];
        }

        return $statistic;
    }
}
