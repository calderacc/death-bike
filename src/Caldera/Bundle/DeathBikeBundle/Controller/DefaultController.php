<?php

namespace Caldera\Bundle\DeathBikeBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request): Response
    {
        $year = 2016;

        $entityList = $this->getItemList($year);

        var_dump($entityList);

        return $this->render(
            'CalderaDeathBikeBundle:Default:index.html.twig',
            [
                'year' => $year,
                'counter' => 423
            ]
        );
    }

    protected function getItemList(int $year): array
    {
        $cache = new FilesystemAdapter();

        $cacheItem = $cache->getItem('item-list-' . $year);

        var_dump($cacheItem);
        $entityList = $cacheItem->get();

        if (is_array($entityList)) {
            return $entityList;
        }

        return [];
    }
}
