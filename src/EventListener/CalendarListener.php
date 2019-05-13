<?php


namespace App\EventListener;

use App\Repository\EvenementPlanningRepository;
use CalendarBundle\Entity\Event;
use CalendarBundle\Event\CalendarEvent;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CalendarListener
{
    /**
     * @var EvenementPlanningRepository
     */
    private $evenementPlanningRepository;
    /**
     * @var UrlGeneratorInterface
     */
    private $router;

    public function __construct(EvenementPlanningRepository $evenementPlanningRepository, UrlGeneratorInterface $router)
    {

        $this->evenementPlanningRepository = $evenementPlanningRepository;
        $this->router = $router;
    }

    public function loadAction(CalendarEvent $calendar)
    {
        $start = $calendar->getStart();
        $end = $calendar->getEnd();
        $filters = $calendar->getFilters();

        dd($calendar);


        $evenements = $this->evenementPlanningRepository
            ->createQueryBuilder('evenement_planning')
            ->where('evenement_planning.beginAt BETWEEN :start and :end')
            ->andWhere('evenement_planning.formateur = :formateur')
            ->setParameter('start', $start->format('Y-m-d H:i:s'))
            ->setParameter('end', $end->format('Y-m-d H:i:s'))
            ->setParameter('formateur', 1)
            ->getQuery()
            ->getResult();

        foreach ($evenements as $evenement){

            $evenementPlanning = new Event(
                $evenement->getTitle(),
                $evenement->getBeginAt(),
                $evenement->getEndAt(),
                [
                    'formateur' => $evenement->getFormateur()
                ]
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