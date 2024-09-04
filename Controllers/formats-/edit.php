<?php

use Core\Database;

if (!isset($_GET['id'])) {
    abort();
}

$db = Database::get();

$format = $db->query('SELECT * FROM mediji WHERE id = ?', [$_GET['id']])->findOrFail();

$pageTitle = 'Uredi medij';

require base_path('views/formats/edit.view.php');