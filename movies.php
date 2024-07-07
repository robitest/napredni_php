<?php

// MVC pattern -> Model - View - Controller
// Movies page model

$connection = mysqli_connect('localhost', 'algebra', 'algebra', 'videoteka');

if($connection === false){
    die("Connection failed: ". mysqli_connect_error());
}

$sql = "SELECT 
            f.id,
            f.naslov,
            f.godina,
            z.ime AS zanr,
            c.tip_filma AS cjenik
        FROM 
            filmovi f
        JOIN zanrovi z ON z.id = f.zanr_id
        JOIN cjenik c ON c.id = f.cjenik_id
        ORDER BY f.id;";

$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) === 0) {
    die("There are no memebers in our datbase!");
}

$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($connection);

require 'views/movies.view.php';