<?php

namespace App\Repository;

use App\Entity\Formateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Formateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Formateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Formateur[]    findAll()
 * @method Formateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormateurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Formateur::class);
    }

    // /**
    //  * @return Formateur[] Returns an array of Formateur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Formateur
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
