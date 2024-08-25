<?php

use Core\Database;

if (isset($_GET['id'])) {

    $db = Database::get();

    $genre = $db->query('SELECT * from zanrovi WHERE id = ?', [$_GET['id']])->findOrFail();

    $movies = $db->query('SELECT f.*, c.tip_filma FROM filmovi f JOIN cjenik c ON c.id = f.cjenik_id WHERE zanr_id = ?', [$_GET['id']])->all();
    if (empty($movies)) {
        abort();
    }

    require base_path('views/genres/show.view.php');
} else {
    abort();
}