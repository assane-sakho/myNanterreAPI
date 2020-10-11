<?php

namespace App\Repository;

use App\Entity\PlannificationSport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlannificationSport|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlannificationSport|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlannificationSport[]    findAll()
 * @method PlannificationSport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlannificationSportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlannificationSport::class);
    }

    // /**
    //  * @return PlannificationSport[] Returns an array of PlannificationSport objects
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
    public function findOneBySomeField($value): ?PlannificationSport
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
