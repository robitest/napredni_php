<?php

// MVC pattern -> Model - View - Controller
// Genres Page Controller

// PDO
// $dsn = "mysql:" . http_build_query($config, '', ';');
$dsn = 'mysql:host=localhost;dbname=videoteka;user=algebra;password=algebra;charset=utf8mb4';

try {
    $pdo = new PDO($dsn);
} catch (\Throwable $th) {
    die("Connection failed:");
}

$sql = "SELECT * from zanrovi";
$statement = $pdo->prepare($sql);
$statement->execute();

$genres = $statement->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Zanrovi';

require 'views/genres.view.php';

// Nek se nađe ako zatreba
//

// PDO
//
// require 'classes/Db.php';

// $conn = new Db('localhost', 'algebra', 'algebra', 'videoteka');

// $sql = "SELECT * from zanrovi ORDER BY id;";

// $genres = $conn->getData($sql);
// $conn->closeConn();

// $title = "Žanrovi";

// var_dump($_SERVER);

// require 'views/genres.view.php';



// MySQLi Procedural
//
// $connection = mysqli_connect('localhost', 'algebra', 'algebra', 'videoteka');

// if($connection === false){
//     die("Connection failed: ". mysqli_connect_error());
// }

// $sql = "SELECT * from zanrovi ORDER BY id;";
// $result = mysqli_query($connection, $sql);

// if (mysqli_num_rows($result) === 0) {
//     die("There are no generes in our datbase!");
// }

// $genres = mysqli_fetch_all($result, MYSQLI_ASSOC);

// mysqli_close($connection);

// require 'views/genres.view.php';
