<?php

namespace Caldera\Bundle\DeathBikeBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request): Response
    {
        $year = 2017;

        return $this->render(
            'CalderaDeathBikeBundle:Default:index.html.twig',
            [
                'year' => $year,
                'counter' => 423
            ]
        );
    }
}
