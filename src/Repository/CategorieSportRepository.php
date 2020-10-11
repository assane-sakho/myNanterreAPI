<?php

namespace App\Repository;

use App\Entity\CategorieSport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieSport|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieSport|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieSport[]    findAll()
 * @method CategorieSport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieSportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieSport::class);
    }

    // /**
    //  * @return CategorieSport[] Returns an array of CategorieSport objects
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
    public function findOneBySomeField($value): ?CategorieSport
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findAll()
    {
        return $this->findBy(array(), array('categorie' => 'ASC'));
    }
}
