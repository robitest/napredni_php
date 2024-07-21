<?php

use Core\Database;

const QUERY = [
    'genres' => "SELECT * FROM zanrovi ORDER BY id",
    'priceList' => "SELECT * FROM cjenik ORDER BY id"
];

$db = new Database();

// Dohvacanje zanrova
// Dohvacanje cjenika
try {
    $genres = $db->query(QUERY['genres']);
    $priceList = $db->query(QUERY['priceList']);
} catch (\Exception $exception) {
    die("Connection failed: {$exception->getmessage()}");
}

require '../views/movies/create.view.php';

