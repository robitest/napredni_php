<?php

use Core\Database;

if (!isset($_POST['id'] ) || !isset($_POST['_method']) || $_POST['_method'] !== 'PATCH') {
    abort();
}

//TODO: do a validation
    
$data = [
    "id" => $_POST['id'],
    "zanr" => $_POST['zanr'],
];

$db = new Database();
$genres = $db->query('SELECT * FROM zanrovi WHERE id = ?', [$_POST['id']]);

if(empty($genres)){
    abort();
}

try {
    $sql = "UPDATE zanrovi SET ime = ? WHERE id = ?";
    $db->query($sql, [$data['zanr'], $data['id']]);

    redirect('genres');
} catch (PDOException $e) {
    // log the error
    echo "<p>There was an error processing your request. Please try again.</p>";
    throw $e;
}