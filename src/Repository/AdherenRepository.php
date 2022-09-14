<?php

namespace App\Repository;

use App\Entity\Adheren;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Adheren|null find($id, $lockMode = null, $lockVersion = null)
 * @method Adheren|null findOneBy(array $criteria, array $orderBy = null)
 * @method Adheren[]    findAll()
 * @method Adheren[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdherenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Adheren::class);
    }
    public function recherche($data): array{
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery('SELECT a FROM App\Entity\Adheren a WHERE a.prenom like :critere ')->setParameter('critere', $data['critere']);
        // returns an array of Product objects
        return $query->execute();
    }

    // /**
    //  * @return Adheren[] Returns an array of Adheren objects
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
    public function findOneBySomeField($value): ?Adheren
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
