<?php

use Core\Database;

if (isset($_GET['id'])) {

    $db = new Database();
    
    try {

        $genre = $db->fetch('SELECT * from zanrovi WHERE id = ?', [$_GET['id']]);
        if (empty($genre)) {
            abort();
        }
    } catch (\PDOException $exception) {
        throw $exception;
    }

    require base_path('views/genres/show.view.php');
} else {
    abort();
}