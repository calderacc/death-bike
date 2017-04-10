<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AbstractController extends Controller
{
    protected function getIncidentList(int $year = null): array
    {
        if ($year) {
            $entityList = $this->getDoctrine()->getRepository('AppBundle:Incident')->findByYear($year);
        } else {
            $entityList = $this->getDoctrine()->getRepository('AppBundle:Incident')->findBy([], ['dateTime' => 'DESC']);
        }

        return $entityList;
    }
}