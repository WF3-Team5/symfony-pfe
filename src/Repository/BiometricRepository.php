<?php

namespace App\Repository;

use App\Entity\Biometric;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Biometric|null find($id, $lockMode = null, $lockVersion = null)
 * @method Biometric|null findOneBy(array $criteria, array $orderBy = null)
 * @method Biometric[]    findAll()
 * @method Biometric[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BiometricRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Biometric::class);
    }

    // /**
    //  * @return Biometric[] Returns an array of Biometric objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Biometric
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
