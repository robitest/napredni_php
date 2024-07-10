<?php

function dd($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}

class Vlasnik {
    private string $ime;
    private string $prezime;
    private string $godine;
    private string $spol;
    private ?string $adresa;

    public function __construct(string $ime, string $prezime, int $godine, string $spol, $adresa) {
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->godine = $godine;
        $this->spol = $spol;
        $this->adresa = $adresa;
    }

    public function posjeduje()
    {
        
    }

}

$robi = new Vlasnik('Robert', 'Hlobik', 31, 'M', null);
dd($robi);