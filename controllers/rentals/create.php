<?php

use Core\Database;


$db = new Database();
// Dohvacanje Članova iz baze
try {
    $sql = "select *, count('tip')
from(
    SELECT 
           f.id,
           f.naslov,
           m.tip
        FROM kopija k
        LEFT JOIN filmovi f ON k.film_id = f.id
        LEFT JOIN mediji m ON k.medij_id = m.id
        WHERE k.dostupan = 1) as v 
group by 1,2,3;";

    $movies = $db->query($sql);

} catch (\Exception $exception) {
    die("Connection failed: {$exception->getmessage()}");
}

try {
    $sql = "SELECT * FROM clanovi;";

    $members = $db->query($sql);

} catch (\Exception $exception) {
    die("Connection failed: {$exception->getmessage()}");
}


$pageTitle = 'Posudbe';
require base_path('views/rentals/create.view.php');

