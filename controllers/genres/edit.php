<?php

use Core\Database;

if (!isset($_GET['id'])) {
    abort();
}

$db = new Database();

$genre = $db->fetch('SELECT * FROM zanrovi WHERE id = ?', [$_GET['id']]);

if(empty($genre)){
    abort();
}

$pageTitle = 'Žanrovi';

require base_path('views/genres/edit.view.php');