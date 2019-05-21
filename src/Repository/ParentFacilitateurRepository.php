<?php

namespace App\Repository;

use App\Entity\ParentFacilitateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParentFacilitateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParentFacilitateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParentFacilitateur[]    findAll()
 * @method ParentFacilitateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParentFacilitateurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParentFacilitateur::class);
    }

    // /**
    //  * @return ParentFacilitateur[] Returns an array of ParentFacilitateur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ParentFacilitateur
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
