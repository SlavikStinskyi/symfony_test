<?php

namespace App\Service;

use App\Entity\Pizza;
use App\Repository\PizzaRepository;

class PizzaService
{
    private PizzaRepository $pizzaRepository;

    public function __construct(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;
    }

    public function createPizza(mixed $data): Pizza
    {
        $pizza = new Pizza();
        $pizza->setName($data['name']);
        $pizza->setPrice($data['price']);
        $pizza->setSize($data['size']);
        $pizza->setVegan($data['vegan']);
        $pizza->setVegetarian($data['vegetarian']);
        $pizza->setSweet($data['sweet']);
        $pizza->setSpicy($data['spicy']);

        return $this->pizzaRepository->add($pizza);
    }

    public function update($id, mixed $data): Pizza
    {
        $pizza = $this->pizzaRepository->find($id);

        !empty($data['name']) ? $pizza->setName($data['name']) : true ;
        !empty($data['price']) ? $pizza->setPrice($data['price']) : true ;
        !empty($data['size']) ? $pizza->setSize($data['size']) : true ;
        !empty($data['spicy']) ? $pizza->setSpicy($data['spicy']) : true ;
        !empty($data['sweet']) ? $pizza->setSweet($data['sweet']) : true ;
        !empty($data['vegan']) ? $pizza->setVegan($data['vegan']) : true ;
        !empty($data['vegetarian']) ? $pizza->setVegetarian($data['vegetarian']) : true ;
        !empty($data['glutenfree']) ? $pizza->setGlutenfree($data['glutenfree']) : true ;

        return $this->pizzaRepository->update($pizza);
    }
}