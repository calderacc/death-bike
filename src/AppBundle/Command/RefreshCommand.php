<?php

namespace AppBundle\Command;

use AppBundle\Entity\Incident;
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
        $serializer = $this->getContainer()->get('jms_serializer');

        /** @var EntityManager $manager */
        $manager = $this->getContainer()->get('doctrine')->getManager();

        $year = $input->getArgument('year');

        $apiUrl = $this->getContainer()->getParameter('cycleways.api');
        $apiUrl .= '?incident_type=deadly_accident&year=' . $year;

        $curl = new Curl();
        $curl->get($apiUrl);

        $jsonReponse = $curl->response;
        $incidentList = json_decode($jsonReponse);

        $progress = new ProgressBar($output, count($incidentList));
        $progress->start();

        foreach ($incidentList as $json) {
            /** @var Incident $incident */
            $incident = $serializer->deserialize(json_encode($json), 'AppBundle\Entity\Incident', 'json');

            //if ($manager->getUnitOfWork()->isEntityScheduled($incident)) {
                $manager->merge($incident);
            //} else {
            //    $manager->persist($incident);
            //}

            $progress->advance();
        }

        $manager->flush();

        $progress->finish();
    }
}
