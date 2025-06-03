<?php

namespace App\Repository;

use App\Entity\Series;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Series>
 */
class SeriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Series::class);
    }

//    /**
//     * @return Series[] Returns an array of Series objects
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

//    public function findOneBySomeField($value): ?Series
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function salvar(Series $serie): Series
    {
        $this->getEntityManager()->persist($serie);
        $this->getEntityManager()->flush();
        return $serie;
    }

     public function remove(Series $serie): Void
    {
        $this->getEntityManager()->remove($serie);
        $this->getEntityManager()->flush();
    }

    public function buscarTemporadasEepsodiosPorSerie(){
        return $this->createQueryBuilder('s')
            ->innerJoin('s.temporadas','t')
            ->innerJoin('t.episodeos','e')
            ->select('s.nome as serie, t.numero as temporadas, e.numero as episodeos')
            ->getQuery()
            ->getResult()
        ;
       
    }
    

}

