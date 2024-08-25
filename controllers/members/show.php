<?php

use Core\Database;

if (isset($_GET['id'])) {

    $db = Database::get();
    

    $members = $db->query('SELECT * from clanovi WHERE id = :id', ['id' => $_GET['id']])->find();
    if (empty($members)) {
        abort();
    }

    require base_path('views/members/show.view.php');
} else {
    abort();
}