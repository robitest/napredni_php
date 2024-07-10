<?php
// MVC pattern -> Model - View - Controller
// Movies Page Controller

// PDO
// $dsn = "mysql:" . http_build_query($config, '', ';');
$dsn = 'mysql:host=localhost;dbname=videoteka;user=algebra;password=algebra;charset=utf8mb4';

try {
    $pdo = new PDO($dsn);
} catch (\Throwable $th) {
    die("Connection failed:");
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
$statement = $pdo->prepare($sql);
$statement->execute();

$movies = $statement->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Filmovi';

require 'views/movies.view.php';

// Nek se nađe ako zatreba
//

// require 'controllers/Db.php';

// $conn = new Db('localhost', 'algebra', 'algebra', 'videoteka');

// $sql = "SELECT 
//             f.id,
//             f.naslov,
//             f.godina,
//             z.ime AS zanr,
//             c.tip_filma AS cjenik
//         FROM 
//             filmovi f
//         JOIN zanrovi z ON z.id = f.zanr_id
//         JOIN cjenik c ON c.id = f.cjenik_id
//         ORDER BY f.id;";

// $movies = $conn->getData($sql);
// $conn->closeConn();


// MySQLi Procedural
//
// $connection = mysqli_connect('localhost', 'algebra', 'algebra', 'videoteka');

// if($connection === false){
//     die("Connection failed: ". mysqli_connect_error());
// }

// $sql = "SELECT 
//             f.id,
//             f.naslov,
//             f.godina,
//             z.ime AS zanr,
//             c.tip_filma AS cjenik
//         FROM 
//             filmovi f
//         JOIN zanrovi z ON z.id = f.zanr_id
//         JOIN cjenik c ON c.id = f.cjenik_id
//         ORDER BY f.id;";

// $result = mysqli_query($connection, $sql);

// if (mysqli_num_rows($result) === 0) {
//     die("There are no movies in our datbase!");
// }

// $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);

// mysqli_close($connection);

// require 'views/movies.view.php';