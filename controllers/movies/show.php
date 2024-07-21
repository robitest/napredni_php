<?php

use Core\Database;

const QUERY = [
    "movies" => 'SELECT
    f.id,
    f.naslov,
    f.godina,
    z.ime AS zanr,
    c.tip_filma
    from
        filmovi f
        JOIN cjenik c ON f.cjenik_id = c.id
        JOIN zanrovi z ON f.zanr_id = z.id
    WHERE f.id = ?'
];

if (!isset($_GET['id'])) {
    abort();
}

$db = new Database();

try {
    $movies = $db->fetch(QUERY['movies'], [$_GET['id']]); // Eto spremno za novu funkciju 
    if (empty($movies)) {
        abort();
    }
} catch (\PDOException $exception) {
    throw $exception;
}

require base_path('views/movies/show.view.php');
