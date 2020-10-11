<?php

namespace App\Repository;

use App\Entity\FrequentationCafet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FrequentationCafet|null find($id, $lockMode = null, $lockVersion = null)
 * @method FrequentationCafet|null findOneBy(array $criteria, array $orderBy = null)
 * @method FrequentationCafet[]    findAll()
 * @method FrequentationCafet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FrequentationCafetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FrequentationCafet::class);
    }

    // /**
    //  * @return FrequentationCafet[] Returns an array of FrequentationCafet objects
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
    public function findOneBySomeField($value): ?FrequentationCafet
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
