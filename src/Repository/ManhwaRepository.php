<?php

namespace App\Repository;

use App\Entity\Manhwa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Manhwa>
 *
 * @method Manhwa|null find($id, $lockMode = null, $lockVersion = null)
 * @method Manhwa|null findOneBy(array $criteria, array $orderBy = null)
 * @method Manhwa[]    findAll()
 * @method Manhwa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ManhwaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Manhwa::class);
    }

//    /**
//     * @return Manhwa[] Returns an array of Manhwa objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Manhwa
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
