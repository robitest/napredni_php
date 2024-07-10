<?php

// MVC pattern -> Model - View - Controller
// Lending Page Controller

// PDO
// $dsn = "mysql:" . http_build_query($config, '', ';');
$dsn = 'mysql:host=localhost;dbname=videoteka;user=algebra;password=algebra;charset=utf8mb4';

try {
    $pdo = new PDO($dsn);
} catch (\Throwable $th) {
    die("Connection failed:");
}

// posudbi -> samo aktivne posudbe -> posudba* + clan.ime + film * + tocna cijena, zakasnina
$sql = "SELECT  p.id AS posudba_id, 
                p.datum_posudbe AS datum_posudbe,
                p.datum_povrata AS datum_povrata,
                c.ime AS clan_ime, 
                c.prezime AS clan_prezime,  
                f.id AS id_filma,
                f.naslov AS naslov_filma, 
                f.godina AS godina_filma, 
                z.ime AS zanr_filma, 
                cj.cijena AS cijena_filma, 
                cj.zakasnina_po_danu AS zfpd
        FROM posudba p
        JOIN clanovi c ON p.clan_id = c.id
        JOIN posudba_kopija pk ON p.id = pk.posudba_id
        JOIN kopija k ON pk.kopija_id = k.id
        JOIN mediji m ON k.medij_id = m.id
        JOIN filmovi f ON k.film_id = f.id
        JOIN zanrovi z ON f.zanr_id = z.id
        JOIN cjenik cj ON cj.id = f.cjenik_id
        WHERE p.datum_povrata IS NULL
        ORDER BY datum_posudbe ASC;";

$statement = $pdo->prepare($sql);
$statement->execute();

$lendings = $statement->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Posudbe';

require 'views/lending.view.php';

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
