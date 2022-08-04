<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PizzaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PizzaRepository::class)]
#[ApiResource(
    collectionOperations: ['get' => ['normalization_context' => ['groups' => 'pizza:list']]],
    itemOperations: ['get' => ['normalization_context' => ['groups' => 'pizza:item']]],
    paginationEnabled: false,
)]
class Pizza
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['pizza:list', 'pizza:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    #[Groups(['pizza:list', 'pizza:item'])]
    #[Assert\NotBlank]
    private ?string $name = null;

    #[ORM\Column]
    #[Groups(['pizza:list', 'pizza:item'])]
    #[Assert\NotBlank]
    private ?int $price = null;

    #[ORM\Column]
    #[Groups(['pizza:list', 'pizza:item'])]
    #[Assert\NotBlank]
    private ?int $size = null;

    #[ORM\Column(options: ['default'=>false])]
    #[Groups(['pizza:list', 'pizza:item'])]
    #[Assert\NotBlank]
    private ?bool $vegan = false;

    #[ORM\Column(options: ['default'=>false])]
    #[Groups(['pizza:list', 'pizza:item'])]
    #[Assert\NotBlank]
    private ?bool $vegetarian = false;

    #[ORM\Column(options: ['default'=>false])]
    #[Groups(['pizza:list', 'pizza:item'])]
    #[Assert\NotBlank]
    private ?bool $glutenfree = false;

    #[ORM\Column(options: ['default'=>false])]
    #[Groups(['pizza:list', 'pizza:item'])]
    #[Assert\NotBlank]
    private ?bool $spicy = false;

    #[ORM\Column(options: ['default'=>false])]
    #[Groups(['pizza:list', 'pizza:item'])]
    #[Assert\NotBlank]
    private ?bool $sweet = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function isVegan(): ?bool
    {
        return $this->vegan;
    }

    public function setVegan(bool $vegan): self
    {
        $this->vegan = $vegan;

        return $this;
    }

    public function isVegetarian(): ?bool
    {
        return $this->vegetarian;
    }

    public function setVegetarian(bool $vegetarian): self
    {
        $this->vegetarian = $vegetarian;

        return $this;
    }

    public function isGlutenfree(): ?bool
    {
        return $this->glutenfree;
    }

    public function setGlutenfree(bool $glutenfree): self
    {
        $this->glutenfree = $glutenfree;

        return $this;
    }

    public function isSpicy(): ?bool
    {
        return $this->spicy;
    }

    public function setSpicy(bool $spicy): self
    {
        $this->spicy = $spicy;

        return $this;
    }

    public function isSweet(): ?bool
    {
        return $this->sweet;
    }

    public function setSweet(bool $sweet): self
    {
        $this->sweet = $sweet;

        return $this;
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'size' => $this->getSize(),
            'vegan' => $this->isVegan(),
            'vegetarian' => $this->isVegetarian(),
            'glutenfree' => $this->isGlutenfree(),
            'spicy' => $this->isSpicy(),
            'sweet' => $this->isSweet(),
        ];
    }

}
