<?php

// MVC pattern -> Model - View - Controller
// Media Page Controller

// PDO
// $dsn = "mysql:" . http_build_query($config, '', ';');
$dsn = 'mysql:host=localhost;dbname=videoteka;user=algebra;password=algebra;charset=utf8mb4';

try {
    $pdo = new PDO($dsn);
} catch (\Throwable $th) {
    die("Connection failed:");
}

$sql = "SELECT * from mediji";
$statement = $pdo->prepare($sql);
$statement->execute();

$media = $statement->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Mediji';

require '../views/media.view.php';

?>