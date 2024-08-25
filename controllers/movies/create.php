<?php

use Core\Database;
use Core\Session;

$errors = Session::all('errors');
$returnData = Session::all('returnData');
Session::unflash();

const QUERY = [
    'genres' => "SELECT * FROM zanrovi ORDER BY id",
    'priceList' => "SELECT * FROM cjenik ORDER BY id"
];

$db = Database::get();

// Dohvacanje zanrova
$genres = $db->query(QUERY['genres'])->all();
// Dohvacanje cjenika
$priceList = $db->query(QUERY['priceList'])->all();



require '../views/movies/create.view.php';

