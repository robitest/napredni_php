<?php

use Core\Database;

if (isset($_GET['id'])) {

    $db = new Database();

    $sql = 'SELECT * from zanrovi WHERE id = :id';
    
    try {
        $genre = $db->fetch($sql, [
            'id' => $_GET['id']
        ]);

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