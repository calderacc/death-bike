<?php

namespace Caldera\Bundle\DeathBikeBundle\Command;

use Curl\Curl;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
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
            ->setDescription('Store death incidents');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $curl = new Curl();
        $curl->get('http://cycleways.cw/app_dev.php/api/?incident_type=deadly_accident&year=2011');

        $jsonReponse = $curl->response;
        $deathList = json_decode($jsonReponse);

        foreach ($deathList as $death) {
            $entity = $this->getContainer()->get('jms_serializer')->deserialize(json_encode($death), 'Caldera\Bundle\DeathBikeBundle\Entity\Incident', 'json');
            var_dump($entity);
        }

        $cache = new FilesystemAdapter();

        $cacheItem = $cache->getItem('itemList');


    }
}
