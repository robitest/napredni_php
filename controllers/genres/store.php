<?php

use Core\Database;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $data = [ 
        'zanr' => $_POST['zanr'],
    ];

    $db = new Database();
    $count = $db->fetch('SELECT id FROM zanrovi WHERE ime = ?', [$data['zanr']]);
    
    if(!empty($count)){
        die("Zanr {$data['zanr']} vec postoji u nasoj bazi!");
    }
    
    $sql = "INSERT INTO zanrovi (ime) VALUES (:ime)";

    try {
        $db->query($sql, ['ime' => $data['zanr']]);
    } catch (\Throwable $th) {
        throw $th;
    }

    redirect('genres');
} else {
    dd('Unsupported method!');
}