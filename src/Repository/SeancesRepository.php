<?php

namespace App\Repository;

use App\Entity\Seances;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Seances|null find($id, $lockMode = null, $lockVersion = null)
 * @method Seances|null findOneBy(array $criteria, array $orderBy = null)
 * @method Seances[]    findAll()
 * @method Seances[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeancesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Seances::class);
    }
    public function recherche($data): array{
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery('SELECT s FROM App\Entity\Seances s WHERE s.date like :critere ')->setParameter('critere', $data['critere']);
        // returns an array of Product objects
        return $query->execute();
    }

    // /**
    //  * @return Seances[] Returns an array of Seances objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Seances
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
