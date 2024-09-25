<?php

namespace App\Repository;

use App\Entity\StyleS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StyleS>
 *
 * @method StyleS|null find($id, $lockMode = null, $lockVersion = null)
 * @method StyleS|null findOneBy(array $criteria, array $orderBy = null)
 * @method StyleS[]    findAll()
 * @method StyleS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StyleSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StyleS::class);
    }

//    /**
//     * @return StyleS[] Returns an array of StyleS objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?StyleS
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
