<?php

namespace App\Repository;

use App\Entity\Accomodation;
use App\Entity\Booking;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use function Doctrine\ORM\QueryBuilder;

/**
 * @method Booking|null find($id, $lockMode = null, $lockVersion = null)
 * @method Booking|null findOneBy(array $criteria, array $orderBy = null)
 * @method Booking[]    findAll()
 * @method Booking[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Booking::class);
    }

    // /**
    //  * @return Booking[] Returns an array of Booking objects
    //  */
//retourne l'id des 3 logements les plus réservés
    public function findMostBooking()
    {
        $in = $this->getEntityManager()->getRepository(Booking::class)
            ->createQueryBuilder('b')
            ->select('(b.accomodation)') //
            ->orderBy('count(b.id)', 'DESC')
            ->groupBy("b.accomodation")
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();

        $querry = $this->getEntityManager()->getRepository(Accomodation::class)
            ->createQueryBuilder('a')
            ->andWhere('a.id IN (:in) ')
            ->setParameter('in', $in);


        return $querry->getQuery()->getResult();
    }


    /*
    public function findOneBySomeField($value): ?Booking
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
