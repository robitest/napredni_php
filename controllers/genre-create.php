<?php

require_once '../functions.php';
require_once '../classes/Database.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
    $zanrName = $_POST['zanr'];


    $db = new Database();

    // check if name already exsists in db
    $sql = "SELECT id FROM zanrovi WHERE ime = ?";
    $count = $db->query($sql, [$zanrName]);

    if(!empty($count)){
        die("Ime $zanrName vec postoji u nasoj bazi!");
    }
    
    $sql = "INSERT INTO zanrovi (ime) VALUES (:ime)";

    try {
        $success = $db->query($sql, ['ime' => $zanrName]);
    } catch (\Throwable $th) {
        throw $th;
    }

    http_response_code(200);
    header('Location:/controllers/genres.php');

}

require '../views/genre-create.view.php';

?>