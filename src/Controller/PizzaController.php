<?php

namespace App\Controller;

use App\Repository\PizzaRepository;
use App\Service\PizzaService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PizzaController extends AbstractController
{
    private PizzaRepository $pizzaRepository;
    private PizzaService $pizzaService;

    public function __construct(PizzaRepository $pizzaRepository, PizzaService $pizzaService)
    {
        $this->pizzaRepository = $pizzaRepository;
        $this->pizzaService = $pizzaService;
    }

    #[Route('/pizzas', name: 'app_pizza', methods: "GET")]
    public function list(): JsonResponse
    {
        return $this->json($this->pizzaRepository->findAll(), Response::HTTP_OK);
    }

    #[Route('/pizzas/{id}', name: 'pizza', methods: "GET")]
    public function view($id): JsonResponse
    {
        return $this->json($this->pizzaRepository->find($id), Response::HTTP_OK);
    }

    #[Route('/pizzas', name: 'add_pizza', methods: "POST")]
    public function add(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        return $this->json($this->pizzaService->createPizza($data), Response::HTTP_CREATED);
    }

    #[Route('/pizzas/{id}', name: 'remove_pizza', methods: "DELETE")]
    public function delete($id): JsonResponse
    {
        $pizza = $this->pizzaRepository->find($id);
        $this->pizzaRepository->remove($pizza);
        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    #[Route('/pizzas/{id}', name: 'update_pizza', methods: "PUT")]
    public function update($id, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        return $this->json($this->pizzaService->update($id, $data), Response::HTTP_OK);
    }
}
