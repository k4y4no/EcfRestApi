<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CarRepository::class)]
#[ApiResource(
    paginationItemsPerPage: 10,
    paginationMaximumItemsPerPage: 10
)]
class Car
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[Groups(["getCars", "getUsers"])]
    private ?string $id = null;

    #[ORM\Column(length: 20)]
    #[Groups(["getCars", "getUsers"])]
    private ?string $brand = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getCars", "getUsers"])]
    private ?string $model = null;

    #[ORM\Column]
    #[Groups(["getCars", "getUsers"])]
    private ?int $km = null;

    #[ORM\Column]
    #[Groups(["getCars", "getUsers"])]
    private ?int $price = null;

    #[ORM\Column(length: 4)]
    #[Groups(["getCars", "getUsers"])]
    private ?string $dateCar = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getCars", "getUsers"])]
    private ?string $picture = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getCars", "getUsers"])]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'cars')]
    #[Groups(["getUsers"])]
    private ?User $idSeller = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getKm(): ?int
    {
        return $this->km;
    }

    public function setKm(int $km): static
    {
        $this->km = $km;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getDateCar(): ?string
    {
        return $this->dateCar;
    }

    public function setDateCar(string $dateCar): static
    {
        $this->dateCar = $dateCar;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getIdSeller(): ?user
    {
        return $this->idSeller;
    }

    public function setIdSeller(?user $idSeller): static
    {
        $this->idSeller = $idSeller;

        return $this;
    }
}
