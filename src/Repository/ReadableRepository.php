<?php

namespace App\Repository;

use App\Entity\Readable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Readable>
 *
 * @method Readable|null find($id, $lockMode = null, $lockVersion = null)
 * @method Readable|null findOneBy(array $criteria, array $orderBy = null)
 * @method Readable[]    findAll()
 * @method Readable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReadableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Readable::class);
    }

//    /**
//     * @return Readable[] Returns an array of Readable objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Readable
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
