<?php

use Core\Database;

if (isset($_GET['id'])) {

    $db = new Database();

    $sql = 'SELECT * from clanovi WHERE id = :id';
    
    try {
        $members = $db->fetch($sql, [
            'id' => $_GET['id']
        ]);

        if (empty($members)) {
            abort();
        }
    } catch (\PDOException $exception) {
        throw $exception;
    }

    require base_path('views/members/show.view.php');
} else {
    abort();
}