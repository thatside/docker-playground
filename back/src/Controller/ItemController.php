<?php

namespace App\Controller;

use App\Entity\Item;
use App\DTO\ItemBeingAdded;
use App\Repository\ItemRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ItemController extends Controller
{
    /**
     * @var ItemRepository
     */
    private $repository;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(ItemRepository $repository, SerializerInterface $serializer)
    {
        $this->repository = $repository;
        $this->serializer = $serializer;
    }

    public function listAction()
    {
        return new JsonResponse($this->serializer->serialize($this->repository->findAll(), 'json'), 200, [], true);
    }

    public function addAction(ItemBeingAdded $item)
    {
        $newItem = new Item($item->name, $item->content);

        $this->repository->persist($newItem);
        $this->repository->flush($newItem);

        return new JsonResponse(['status' => 'success']);
    }
}