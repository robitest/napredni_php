<?php

include '../functions.php';
include 'Vehicle.php';

class Car extends Vehicle {

    private string $marka;
    private string $model;
    private string $gorivo;
    private int $masa;

    public function __construct(string $marka, string $model, string $gorivo, int $masa)
    {
        $this->marka = $marka;
        $this->model = $model;
        $this->gorivo = $gorivo;
        $this->masa = $masa;

        parent::__construct('Cestovno', 'B');
    }

    public function getMarka()
    {
        return $this->marka;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getMasa(): int
    {
        return $this->masa;
    }

    public function getGorivo(): string
    {
        return $this->gorivo;
    }

    public function getFullName()
    {
        return "$this->marka - $this->model";
    }

}

$car = new Car('Tesla', 'Model S', 'Electric', 2300);