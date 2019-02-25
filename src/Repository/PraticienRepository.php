<?php

namespace App\Repository;

use App\Entity\Praticien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Praticien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Praticien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Praticien[]    findAll()
 * @method Praticien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PraticienRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Praticien::class);
    }

    public function findOneByEmail($email)
    {
        try {
            return $this->createQueryBuilder('u')
                ->andWhere('u.email_pro=:email')
                ->setParameter('email', $email)
                ->getQuery()
                ->getSingleResult();
        } catch (NoResultException $e) {
        } catch (NonUniqueResultException $e) {
        }
    }


    public function findAllMedics($page, $nbMaxParPage)
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
            ->setParameter('role', 'ROLE_MEDIC')
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
    public function findTotalPraticienCount(){
        try {
            return $this->createQueryBuilder('u')
                ->select('COUNT(u)')
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NonUniqueResultException $e) {
        }
    }

    // /**
    //  * @return Praticien[] Returns an array of Praticien objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Praticien
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
