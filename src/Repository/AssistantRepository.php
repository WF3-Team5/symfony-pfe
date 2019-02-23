<?php

namespace App\Repository;

use App\Entity\Assistant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Assistant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Assistant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Assistant[]    findAll()
 * @method Assistant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssistantRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Assistant::class);
    }

    public function findOneByEmail($email)
    {
        try {
            return $this->createQueryBuilder('u')
                ->andWhere('u.email=:email')
                ->setParameter('email', $email)
                ->getQuery()
                ->getSingleResult();
        } catch (NoResultException $e) {
        } catch (NonUniqueResultException $e) {
        }
    }

    // /**
    //  * @return Assistant[] Returns an array of Assistant objects
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
    public function findOneBySomeField($value): ?Assistant
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
