<?php

namespace App\Repository;

use App\Entity\LocationTag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LocationTag|null find($id, $lockMode = null, $lockVersion = null)
 * @method LocationTag|null findOneBy(array $criteria, array $orderBy = null)
 * @method LocationTag[]    findAll()
 * @method LocationTag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocationTagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LocationTag::class);
    }

    // /**
    //  * @return LocationTag[] Returns an array of LocationTag objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LocationTag
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
