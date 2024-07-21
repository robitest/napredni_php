<?php

use Core\Database;

if (isset($_GET['id'])) {

    $db = new Database();

    $sql = 'SELECT * from mediji WHERE id = :id';
    
    try {
        $media = $db->fetch($sql, [
            'id' => $_GET['id']
        ]);

        if (empty($media)) {
            abort();
        }
    } catch (\PDOException $exception) {
        throw $exception;
    }

    require base_path('views/media/show.view.php');
} else {
    abort();
}