<?php

namespace App\Repository;

use App\Entity\AssistanteMaternelle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AssistanteMaternelle|null find($id, $lockMode = null, $lockVersion = null)
 * @method AssistanteMaternelle|null findOneBy(array $criteria, array $orderBy = null)
 * @method AssistanteMaternelle[]    findAll()
 * @method AssistanteMaternelle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssistanteMaternelleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AssistanteMaternelle::class);
    }

    // /**
    //  * @return AssistanteMaternelle[] Returns an array of AssistanteMaternelle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AssistanteMaternelle
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
