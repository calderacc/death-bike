<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function listAction(Request $request, int $year = null): Response
    {
        if (!$year) {
            $dateTime = new \DateTime();
            $year = $dateTime->format('Y');
        }

        $paginator  = $this->get('knp_paginator');

        $query = $this->getDoctrine()->getRepository('AppBundle:Incident')->getListQuery($year);

        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );

        $incidentList = $this->getIncidentList($year);

        $counter = count($incidentList);
        $counterString = sprintf('%03d', $counter);

        return $this->render(
            'AppBundle:Default:list.html.twig',
            [
                'year' => $year,
                'counter' => $counterString,
                'pagination' => $pagination,
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
}
