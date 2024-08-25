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

$db = Database::get();

$movies = $db->query(QUERY['movies'], [$_GET['id']])->find();
if (empty($movies)) {
    abort();
}

require base_path('views/movies/show.view.php');
