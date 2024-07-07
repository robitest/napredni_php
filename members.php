<?php
// MVC pattern -> Model - View - Controller
// Members page model

// PDO
require 'controllers/Db.php';

$conn = new Db('localhost', 'algebra', 'algebra', 'videoteka');

$sql = "SELECT * from clanovi;";

$members = $conn->getData($sql);
$conn->closeConn();

require 'views/members.view.php';



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
