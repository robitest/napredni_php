<?php

class Car{

    private $make;
    private $model;
    private $fuel;
    private $weight;


    private function belongsTo()
    {
        
    }

    public function getMake()
    {
        return $this->make;
    }
    
    public function setMake(string $make)
    {
        $this->make = $make;
    }

    public function getModel()
    {
        return $this->model;
    }
    
    public function setModel(string $model)
    {
        $this->model = $model;
    }
   
    public function getFuel()
    {
        return $this->fuel;
    }
    
    public function setFuel(int $fuel)
    {
        $this->fuel = $fuel;
    }

    public function getWeight()
    {
        return $this->weight;
    }
    
    public function setWeight(int $weight)
    {
        $this->weight = $weight;
    }




}

$tesla = new Car();
$tesla->setMake('Tesla');
$tesla->setModel('S');
$tesla->setWeight(1523);



