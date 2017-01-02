<?php

namespace Caldera\Bundle\DeathBikeBundle\Command;

use Curl\Curl;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RefreshCommand extends ContainerAwareCommand
{
    /**
     * @var EntityManager $manager
     */
    protected $manager;

    /**
     * @var OutputInterface $output
     */
    protected $output;

    protected function configure()
    {
        $this
            ->setName('deathbike:refresh')
            ->setDescription('Store death incidents')
            ->addArgument(
                'year',
                InputArgument::REQUIRED,
                'Year for incidents to import'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $year = $input->getArgument('year');

        $curl = new Curl();
        $curl->get('http://cycleways.cw/app_dev.php/api/?incident_type=deadly_accident&year=' . $year);

        $jsonReponse = $curl->response;
        $deathList = json_decode($jsonReponse);

        $entityList = [];

        foreach ($deathList as $death) {
            $entityList[] = json_encode($death);
        }

        $cache = new FilesystemAdapter();

        $cacheItem = $cache->getItem('item-list-' . $year);
        $cacheItem->set($entityList);
        $cache->save($cacheItem);
    }
}
