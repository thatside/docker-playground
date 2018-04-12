<?php

namespace App\Repository;

use App\Entity\Item;
use Doctrine\ORM\EntityManagerInterface;

class ItemRepository
{
    /** @var EntityManager */
    private $em;
    private $repo;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repo = $em->getRepository(Item::class);
    }

    public function findAll() : array
    {
        return $this->repo->findAll();
    }

    public function persist(Item $item)
    {
        $this->em->persist($item);
    }

    public function flush(Item $item)
    {
        $this->em->flush($item);
    }
}