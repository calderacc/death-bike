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
    public function indexAction(Request $request, string $year = null): Response
    {
        if (!$year) {
            $dateTime = new \DateTime();
            $year = $dateTime->format('Y');
        }

        $entityList = $this->getEntityList($year);

        $counter = count($entityList);
        $counterString = sprintf('%03d', $counter);

        return $this->render(
            'CalderaDeathBikeBundle:Default:index.html.twig',
            [
                'year' => $year,
                'counter' => $counterString,
                'entityList' => $entityList
            ]
        );
    }

    protected function getEntityList(int $year): array
    {
        $cache = new FilesystemAdapter();

        $cacheItem = $cache->getItem('item-list-' . $year);

        if (!$cacheItem->isHit()) {
            return [];
        }

        $jsonList = $cacheItem->get();

        $entityList = [];

        foreach ($jsonList as $json) {
            $entityList[] = $this->get('jms_serializer')->deserialize($json, 'Caldera\Bundle\DeathBikeBundle\Entity\Incident', 'json');
        }

        return $entityList;
    }
}
