<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Pizza;
use App\Repository\PizzaRepository;

class PizzaTest extends ApiTestCase
{
    private PizzaRepository $pizzaRepository;

    public function __construct(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;
    }

    public function testlist(): void
    {
        $response = static::createClient()->request('GET', '/pizzas');
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['@id' => '/']);
    }

    public function testView(): void
    {
        $id = 1;
        $response = static::createClient()->request('GET', "/pizzas/${$id}");
        $this->assertResponseIsSuccessful();
        $this->assertJsonContains(['@id' => '/']);
    }
}
