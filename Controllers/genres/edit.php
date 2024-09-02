<?php

use Core\Database;

if (!isset($_GET['id'])) {
    abort();
}

$db = Database::get();

$genre = $db->query('SELECT * FROM zanrovi WHERE id = ?', [$_GET['id']])->findOrFail();

$pageTitle = 'Žanrovi';

require base_path('views/genres/edit.view.php');