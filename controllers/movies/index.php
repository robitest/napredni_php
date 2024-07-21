<?php

use Core\Database;

$db = new Database();

try {
    $sql = "SELECT
        f.id,
        f.naslov,
        f.godina,
        z.ime AS zanr,
        c.tip_filma
        from
            filmovi f
            JOIN cjenik c ON f.cjenik_id = c.id
            JOIN zanrovi z ON f.zanr_id = z.id
        ORDER BY
            f.id";

    $movies = $db->query($sql);

} catch (\Exception $exception) {
    die("Connection failed: {$exception->getmessage()}");
}

$pageTitle = 'Filmovi';

require '../views/movies/index.view.php';