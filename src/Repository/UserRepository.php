<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * @return mixed
     */
    public function findAllUsersExceptAdmins(){
        return $this->createQueryBuilder('u')
            ->andWhere('u.role=:role')
            ->setParameter('role', 'ROLE_USER')
            ->getQuery()
            ->getResult();
    }


    /**
     * @return mixed
     */
    public function findAllAdmins(){
        return $this->createQueryBuilder('u')
            ->andWhere('u.role=:role')
            ->setParameter('role', 'ROLE_ADMIN')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return mixed
     */
    public function findTotalUserCount(){
        try {
            return $this->createQueryBuilder('u')
                ->select('COUNT(u)')
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NonUniqueResultException $e) {
        }
    }

    /**
     * @return mixed
     */
    public function findTotalAdminCount(){
        try {
            return $this->createQueryBuilder('u')
                ->select('COUNT(u)')
                ->andWhere('u.role=:role')
                ->setParameter('role', 'ROLE_ADMIN')
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NonUniqueResultException $e) {
        }
    }



}
