<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function listAction(Request $request, int $year = null): Response
    {
        if (!$year) {
            $dateTime = new \DateTime();
            $year = $dateTime->format('Y');
        }

        $incidentList = $this->getIncidentList($year);

        $counter = count($incidentList);
        $counterString = sprintf('%03d', $counter);

        return $this->render(
            'AppBundle:Default:list.html.twig',
            [
                'year' => $year,
                'counter' => $counterString,
                'incidentList' => $incidentList
            ]
        );
    }

    public function mapAction(Request $request, int $year = null): Response
    {
        if (!$year) {
            $dateTime = new \DateTime();
            $year = $dateTime->format('Y');
        }

        $incidentList = $this->getIncidentList($year);

        return $this->render(
            'AppBundle:Map:map.html.twig',
            [
                'year' => $year,
                'incidentList' => $incidentList
            ]
        );
    }

    public function faqAction(Request $request): Response
    {
        return $this->render('AppBundle:Default:faq.html.twig');
    }

    public function indexAction(Request $request, int $year = null): Response
    {
        if (!$year) {
            $dateTime = new \DateTime();
            $year = $dateTime->format('Y');
        }

        $incidentList = $this->getIncidentList($year);

        $counter = count($incidentList);
        $counterString = sprintf('%03d', $counter);

        return $this->render(
            'AppBundle:Default:index.html.twig',
            [
                'year' => $year,
                'counter' => $counterString,
                'incidentList' => $incidentList
            ]
        );
    }

    protected function getIncidentList(int $year): array
    {
        $entityList = $this->getDoctrine()->getRepository('AppBundle:Incident')->findBy([], ['dateTime' => 'DESC']);

        return $entityList;
    }
}
