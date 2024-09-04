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

$db = Database::get();
$genres = $db->query('SELECT * FROM zanrovi WHERE id = ?', [$_POST['id']])->findOrFail();

$sql = "UPDATE zanrovi SET ime = ? WHERE id = ?";
$db->query($sql, [$data['zanr'], $data['id']]);

redirect('genres');
