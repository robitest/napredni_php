<?php

// MVC pattern -> Model - View - Controller
// Genre page model

$connection = mysqli_connect('localhost', 'algebra', 'algebra', 'videoteka');

if($connection === false){
    die("Connection failed: ". mysqli_connect_error());
}

$sql = "SELECT * from zanrovi ORDER BY id;";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) === 0) {
    die("There are no generes in our datbase!");
}

$genres = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($connection);

require 'views/genres.view.php';
