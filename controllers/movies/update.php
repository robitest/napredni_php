<?php

use Core\Database;

if (!isset($_POST['id'] ) || !isset($_POST['_method']) || $_POST['_method'] !== 'PATCH') {
    abort();
}

//TODO: do a validation
    
$data = [
    "id" => $_POST['id'],
    "naslov" => $_POST['movie_title'],
    "godina" => $_POST['movie_year'],
    "zanr_id" => $_POST['genre'],
    "cjenik_id" => $_POST['price'],
];
$db = new Database();
$movies = $db->query('SELECT * FROM filmovi WHERE id = ? ', [$data['id']]);


if(empty($movies)){
    abort();
}

try {
    $sql = "UPDATE filmovi SET naslov = ?, godina = ?, zanr_id = ?, cjenik_id = ? WHERE id = ? ";
    $db->query($sql, [$data['naslov'], $data['godina'], $data['zanr_id'], $data['cjenik_id'], $data['id']]);

    redirect('movies');
} catch (PDOException $e) {
    // log the error
    echo "<p>There was an error processing your request. Please try again.</p>";
    throw $e;
}