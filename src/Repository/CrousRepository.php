<?php

namespace App\Repository;

use App\Entity\Crous;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Crous|null find($id, $lockMode = null, $lockVersion = null)
 * @method Crous|null findOneBy(array $criteria, array $orderBy = null)
 * @method Crous[]    findAll()
 * @method Crous[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CrousRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Crous::class);
    }

    // /**
    //  * @return Crous[] Returns an array of Crous objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Crous
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
