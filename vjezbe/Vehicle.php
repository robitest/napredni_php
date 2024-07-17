<?php

class Vehicle {

    private string $tip;
    private string $kategorija;

    public function __construct(string $tip, string $kategorija)
    {
        $this->tip = $tip;
        $this->kategorija = $kategorija;
    }

    public function getTip()
    {
        return $this->tip;
    }

    public function getKategorija(): string
    {
        return $this->kategorija;
    }

}