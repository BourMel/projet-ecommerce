<?php

use Doctrine\ORM\EntityRepository;

class ArticleRepository extends EntityRepository
{
    public function getBestSales($number = 3)
    {
        // @TODO : order by best sales
        $dql = "SELECT * FROM Article ORDER BY price ASC";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setMaxResults($number);
        return $query->getResult();
    }
}