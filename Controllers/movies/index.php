<?php

use Core\Database;
use Core\Session;

$db = Database::get();

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

    $movies = $db->query($sql)->all();

} catch (\Exception $exception) {
    die("Connection failed: {$exception->getmessage()}");
}

$message = Session::all('message');
Session::unflash();

$pageTitle = 'Filmovi';

require '../views/movies/index.view.php';