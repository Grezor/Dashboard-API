<?php

namespace App\Repository;

use App\Entity\DevTo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DevTo|null find($id, $lockMode = null, $lockVersion = null)
 * @method DevTo|null findOneBy(array $criteria, array $orderBy = null)
 * @method DevTo[]    findAll()
 * @method DevTo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DevToRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DevTo::class);
    }

    // /**
    //  * @return DevTo[] Returns an array of DevTo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DevTo
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
