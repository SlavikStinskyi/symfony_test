<?php

namespace App\Repository;

use App\Entity\Pizza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @extends ServiceEntityRepository<Pizza>
 *
 * @method Pizza|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pizza|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pizza[]    findAll()
 * @method Pizza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PizzaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pizza::class);
    }

    public function add(Pizza $pizza): Pizza
    {
        $this->getEntityManager()->persist($pizza);

        $this->getEntityManager()->flush();

        return $pizza;
    }

    public function remove(Pizza $entity): void
    {
        $this->getEntityManager()->remove($entity);

        $this->getEntityManager()->flush();
    }

    public function update(Pizza $entity): Pizza
    {
        $this->getEntityManager()->persist($entity);

        $this->getEntityManager()->flush();

        return $entity;
    }
}
