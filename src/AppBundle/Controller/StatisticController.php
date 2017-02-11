<?php

namespace AppBundle\Controller;

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

        return $this->render(
            'AppBundle:Statistic:index.html.twig',
            [
                'year' => $year,
            ]
        );
    }
}
