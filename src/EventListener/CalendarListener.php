<?php


namespace App\EventListener;

use App\Repository\EvenementPlanningRepository;
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

        $evenements = $this->sessionFormationRepository
            ->createQueryBuilder('session_formation')
            ->where('session_formation.beginAt BETWEEN :start and :end')
            ->andWhere('session_formation.formateur = :formateur')
            ->setParameter('start', $start->format('Y-m-d H:i:s'))
            ->setParameter('end', $end->format('Y-m-d H:i:s'))
            ->setParameter('formateur', $filters['formateur'])
            ->getQuery()
            ->getResult();

        foreach ($evenements as $evenement){

            $evenementPlanning = new Event(
                $evenement->getTitle(),
                $evenement->getBeginAt(),
                $evenement->getEndAt()
            );

            $evenementPlanning->setOptions([
                'backgroundColor' => 'red',
                'borderColor' => 'red',
            ]);

            $evenementPlanning->addOption(
                'url',
                $this->router->generate('evenement_planning_show', [
                    'id' => $evenement->getId(),
                ])
            );

            $calendar->addEvent($evenementPlanning);
        }
    }

}