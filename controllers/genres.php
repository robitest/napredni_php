<?php

// MVC pattern -> Model - View - Controller
// Genres Page Controller
// PDO-OOP


require_once '../functions.php';
require_once '../classes/Database.php';

$db = new Database();

try {
    $sql = "SELECT * from zanrovi ORDER BY id";
    $genres = $db->query($sql);
} catch (\Exception $exception) {
    die("Connection failed: {$exception->getmessage()}");
}

$pageTitle = 'Žanrovi';

require '../views/genres.view.php';
