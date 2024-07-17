<?php

$db = new Database();
// Dohvacanje zanrova
// zfpd = Zakasnina Filma Po Danu
try {
    $sql = "SELECT * FROM zanrovi ORDER BY id";

    $genres = $db->query($sql);

} catch (\Exception $exception) {
    die("Connection failed: {$exception->getmessage()}");
}

// Dohvacanje cjenika
try {
    $sql = "SELECT * FROM cjenik ORDER BY id";

    $priceList = $db->query($sql);

} catch (\Exception $exception) {
    die("Connection failed: {$exception->getmessage()}");
}

require '../views/movies/create.view.php';