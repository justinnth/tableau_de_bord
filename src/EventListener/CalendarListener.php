<?php


namespace App\EventListener;

use App\Repository\SessionFormationRepository;
use CalendarBundle\Entity\Event;
use CalendarBundle\Event\CalendarEvent;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CalendarListener
{
    /**
     * @var SessionFormationRepository
     */
    private $sessionFormationRepository;
    /**
     * @var UrlGeneratorInterface
     */
    private $router;

    public function __construct(SessionFormationRepository $sessionFormationRepository, UrlGeneratorInterface $router)
    {

        $this->sessionFormationRepository = $sessionFormationRepository;
        $this->router = $router;
    }

    public function load(CalendarEvent $calendar)
    {
        $start = $calendar->getStart();
        $end = $calendar->getEnd();
        $filters = $calendar->getFilters();

        if ($filters['all']){
            $evenements = $this->sessionFormationRepository
                ->createQueryBuilder('session_formation')
                ->where('session_formation.beginAt BETWEEN :start and :end')
                ->setParameter('start', $start->format('Y-m-d H:i:s'))
                ->setParameter('end', $end->format('Y-m-d H:i:s'))
                ->getQuery()
                ->getResult();
        } elseif (!empty($filters['formateur'])){
            $evenements = $this->sessionFormationRepository
                ->createQueryBuilder('S')
                ->leftJoin('S.formateurs', 'SF')
                ->where('S.beginAt BETWEEN :start and :end')
                ->andWhere('SF.id = :formateur')
                ->setParameter('start', $start->format('Y-m-d H:i:s'))
                ->setParameter('end', $end->format('Y-m-d H:i:s'))
                ->setParameter('formateur', $filters['formateur'])
                ->getQuery()
                ->getResult();
        } else {
            $evenements = $this->sessionFormationRepository
                ->createQueryBuilder('S')
                ->leftJoin('S.formateurs', 'SF')
                ->where('S.beginAt BETWEEN :start and :end')
                ->andWhere('SF.id = :formateur')
                ->setParameter('start', $start->format('Y-m-d H:i:s'))
                ->setParameter('end', $end->format('Y-m-d H:i:s'))
                ->setParameter('formateur', $filters['formateur'])
                ->getQuery()
                ->getResult();
        }

        foreach ($evenements as $evenement){

            $sessionFormation = new Event(
                $evenement->getTitle(),
                $evenement->getBeginAt(),
                $evenement->getEndAt(),
                [
                    "formation" => $evenement->getFormation(), "formateurs" => $evenement->getFormateurs(), "participants" => $evenement->getParticipants(), "parentsFacilitateur" => $evenement->getParentsFacilitateurs()
                ]
            );

            $sessionFormation->setOptions([
                'backgroundColor' => 'red',
                'borderColor' => 'red',
            ]);

            $sessionFormation->addOption(
                'url',
                $this->router->generate('session_formation_show', [
                    'id' => $evenement->getId(),
                ])
            );

            $calendar->addEvent($sessionFormation);
        }
    }

}