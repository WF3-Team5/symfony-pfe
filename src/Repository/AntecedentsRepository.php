<?php

namespace App\Repository;

use App\Entity\Antecedents;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Antecedents|null find($id, $lockMode = null, $lockVersion = null)
 * @method Antecedents|null findOneBy(array $criteria, array $orderBy = null)
 * @method Antecedents[]    findAll()
 * @method Antecedents[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AntecedentsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Antecedents::class);
    }

    // /**
    //  * @return Antecedents[] Returns an array of Antecedents objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Antecedents
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
