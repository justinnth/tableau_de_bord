<?php

namespace App\Repository;

use App\Entity\EvenementPlanning;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EvenementPlanning|null find($id, $lockMode = null, $lockVersion = null)
 * @method EvenementPlanning|null findOneBy(array $criteria, array $orderBy = null)
 * @method EvenementPlanning[]    findAll()
 * @method EvenementPlanning[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvenementPlanningRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EvenementPlanning::class);
    }

    // /**
    //  * @return EvenementPlanning[] Returns an array of EvenementPlanning objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EvenementPlanning
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
