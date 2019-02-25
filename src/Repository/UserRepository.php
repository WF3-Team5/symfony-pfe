<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Tools\Pagination\Paginator;
use InvalidArgumentException;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
    public function findAllUsersExceptAdmins($page, $nbMaxParPage)
    {
        if (!is_numeric($page)) {
            throw new InvalidArgumentException(
                'La valeur de l\'argument $page est incorrecte (valeur : ' . $page . ').'
            );
        }

        if ($page < 1) {
            throw new NotFoundHttpException('La page demandée n\'existe pas');
        }

        if (!is_numeric($nbMaxParPage)) {
            throw new InvalidArgumentException(
                'La valeur de l\'argument $nbMaxParPage est incorrecte (valeur : ' . $nbMaxParPage . ').'
            );
        }

        $premierResultat = ($page - 1) * $nbMaxParPage;

        $qb = $this->createQueryBuilder('u')
            ->andWhere('u.role=:role')
            ->setParameter('role', 'ROLE_USER')
            ->orderBy('u.last_name', 'ASC')
            ->getQuery()
            ->setFirstResult($premierResultat)
            ->setMaxResults($nbMaxParPage);

        $paginator = new Paginator($qb);

        if ( ($paginator->count() <= $premierResultat) && $page != 1) {
            throw new NotFoundHttpException('La page demandée n\'existe pas.'); // page 404
        }

        return $paginator;

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

    /**
     * @param $token
     * @return mixed
     */
    public function findOneByResetPasswordToken($token)
    {
        try {
            return $this->createQueryBuilder('u')
                ->andWhere('u.hash=:token')
                ->setParameter('token', $token)
                ->getQuery()
                ->getSingleResult();
        } catch (NoResultException $e) {
        } catch (NonUniqueResultException $e) {
        }
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
