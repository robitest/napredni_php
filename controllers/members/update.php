<?php

use Core\Database;

if (!isset($_POST['id'] ) || !isset($_POST['_method']) || $_POST['_method'] !== 'PATCH') {
    abort();
}

//TODO: do a validation
    
$data = [
    "id" => $_POST['id'],
    "ime" => $_POST['first_name'],
    "prezime" => $_POST['last_name'],
    "adresa" => $_POST['address'],
    "telefon" => $_POST['tel'],
    "email" => $_POST['email'],
    "clan_id" => $_POST['member_id'],
];

$db = new Database();
$members = $db->query('SELECT * FROM clanovi WHERE id = ? ', [$data['id']]);

if(empty($members)){
    abort();
}

try {
    $sql = "UPDATE clanovi SET ime = ?, prezime = ?, adresa = ?, telefon = ?, email = ?, clanski_broj = ? WHERE id = ? ";
    $db->query($sql, [$data['ime'], $data['prezime'], $data['adresa'], $data['telefon'], $data['email'], $data['clan_id'], $data['id']]);

    redirect('members');
} catch (PDOException $e) {
    // log the error
    echo "<p>There was an error processing your request. Please try again.</p>";
    throw $e;
}