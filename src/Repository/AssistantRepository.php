<?php

namespace App\Repository;

use App\Entity\Assistant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Tools\Pagination\Paginator;
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

    public function findAllAsst($page, $nbMaxParPage)
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
            ->setParameter('role', 'ROLE_ASST')
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
    public function findTotalAssistantCount(){
        try {
            return $this->createQueryBuilder('u')
                ->select('COUNT(u)')
                ->getQuery()
                ->getSingleScalarResult();
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
