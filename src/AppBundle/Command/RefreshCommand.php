<?php

namespace AppBundle\Command;

use Curl\Curl;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Console\Helper\ProgressBar;
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

        $apiUrl = $this->getContainer()->getParameter('cycleways.api');
        $apiUrl .= '?incident_type=deadly_accident&year=' . $year;

        $curl = new Curl();
        $curl->get($apiUrl);

        $jsonReponse = $curl->response;
        $deathList = json_decode($jsonReponse);

        $entityList = [];

        $progress = new ProgressBar($output, count($deathList));
        $progress->start();

        foreach ($deathList as $death) {
            $entityList[] = json_encode($death);
            $progress->advance();
        }

        $cache = new FilesystemAdapter();

        $cacheItem = $cache->getItem('item-list-' . $year);
        $cacheItem->set($entityList);
        $cache->save($cacheItem);

        $progress->finish();
    }
}
