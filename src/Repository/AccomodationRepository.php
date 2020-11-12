<?php

namespace App\Repository;

use App\Entity\Accomodation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Accomodation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Accomodation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Accomodation[]    findAll()
 * @method Accomodation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccomodationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Accomodation::class);
    }

    // /**
    //  * @return Accomodation[] Returns an array of Accomodation objects
    //  */
    public function findRequest($type_id, $min, $max)
    {
        $qb = $this->createQueryBuilder('a')
            ->where('a.type = :type')
            ->andWhere('a.price < :max')
            ->andWhere('a.price > :min')
            ->setParameter('type', $type_id)
            ->setParameter('min', $min)
            ->setParameter('max', $max);


        return $qb->getQuery()->getResult();


    }


    /*
    public function findOneBySomeField($value): ?Accomodation
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
