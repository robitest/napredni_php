<?php
require_once '../functions.php';

use Core\Database;




if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $data = [
        "ime" => $_POST['movie_title'],
        "godina" => $_POST['movie_year'],
        "zanr" => $_POST['genre'],
        "cijena" => $_POST['price'],
    ];
    
    // Validacija forme pomoću foreach petlje
    foreach ($data as $key => $value) {
        // Provjera ima li praznih polja
        if(empty($value)){
            dd("Polje $key ne smije biti prazno");
        }
        if($data['zanr'] === "Odaberite zanr"){
            dd("Odaberite Zanr");
        }
        if($data['cijena'] === "Odaberite cijenu"){
            dd("Odaberite cijenu");
        }
    }
    
    // Provjera je li niz imena i prezimena između 3 i 30 slova  
    if(strlen($data['ime']) < 1 || strlen($data['ime']) > 60) {
        dd("Polje ime treba imati izmedu 3 i 60 slova");
    }
    
    // dd($data);
    $db = new Database();
    // check if email already exsists in db
    $sql = "SELECT id FROM filmovi WHERE naslov = ?";
    $count = $db->query($sql, [$data['ime']]);
    
    if(!empty($count)){
        die("Film {$data['ime']} vec postoji u nasoj bazi!");
    }

    $sql = "INSERT INTO filmovi (naslov, godina, zanr_id, cjenik_id) VALUES (:naslov, :godina, :zanr_id, :cjenik_id)";

    try {
        $success = $db->query($sql, [
                                        'naslov' => $data['ime'], 
                                        'godina' => $data['godina'], 
                                        'zanr_id' => $data['zanr'], 
                                        'cjenik_id' => $data['cijena']
                                    ]);
    } catch (\Throwable $th) {
        throw $th;
    }
                                
    http_response_code(200);
    header('Location:/movies');
}



