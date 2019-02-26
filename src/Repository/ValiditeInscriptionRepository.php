<?php

namespace App\Repository;

use App\Entity\ValiditeInscription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ValiditeInscription|null find($id, $lockMode = null, $lockVersion = null)
 * @method ValiditeInscription|null findOneBy(array $criteria, array $orderBy = null)
 * @method ValiditeInscription[]    findAll()
 * @method ValiditeInscription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValiditeInscriptionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ValiditeInscription::class);
    }

    // /**
    //  * @return ValiditeInscription[] Returns an array of ValiditeInscription objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ValiditeInscription
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
