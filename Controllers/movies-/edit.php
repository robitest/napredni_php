<?php

use Core\Database;

if (!isset($_GET['id'])) {
    abort();
}

const QUERY = [
    "movies" => 
    "SELECT
        f.*,
        z.ime AS ime_zanra,
        c.tip_filma,
        c.cijena,
        c.zakasnina_po_danu
    from
            filmovi f
    JOIN cjenik c ON f.cjenik_id = c.id
    JOIN zanrovi z ON f.zanr_id = z.id 
    WHERE f.id = ?",
    "genres" => "SELECT * FROM zanrovi ORDER BY id",
    "priceList" => "SELECT * FROM cjenik ORDER BY id"
];

$db = Database::get();

$movies = $db->query(QUERY['movies'], [$_GET['id']])->find();
if(empty($movies)){
    abort();
}
$genres = $db->query(QUERY['genres'])->all();
if(empty($genres)){
    abort();
}
$priceList = $db->query(QUERY['priceList'])->all();
if(empty($priceList)){
    abort();
}

$pageTitle = 'Filmovi';

require base_path('views/movies/edit.view.php');