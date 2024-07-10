<?php
// MVC pattern -> Model - View - Controller
// Members Page Controller

// PDO
// $dsn = "mysql:" . http_build_query($config, '', ';');
$dsn = 'mysql:host=localhost;dbname=videoteka;user=algebra;password=algebra;charset=utf8mb4';

try {
    $pdo = new PDO($dsn);
} catch (\Throwable $th) {
    die("Connection failed:");
}

$sql = "SELECT * from clanovi";
$statement = $pdo->prepare($sql);
$statement->execute();

$members = $statement->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Članovi';

require 'views/members.view.php';

// Nek se nađe ako zatreba
//

// require 'classes/Db.php';

// $conn = new Db('localhost', 'algebra', 'algebra', 'videoteka');

// $sql = "SELECT * from clanovi;";

// $members = $conn->getData($sql);
// $conn->closeConn();

// $title = "Članovi";

// require 'views/members.view.php';



// MySQLi Procedural
//
// $connection = mysqli_connect('localhost', 'algebra', 'algebra', 'videoteka');

// if($connection === false){
//     die("Connection failed: ". mysqli_connect_error());
// }

// $sql = "SELECT * from clanovi;";
// $result = mysqli_query($connection, $sql);

// if (mysqli_num_rows($result) === 0) {
//     die("There are no memebers in our datbase!");
// }

// $members = mysqli_fetch_all($result, MYSQLI_ASSOC);

// mysqli_close($connection);

// require 'views/members.view.php';
