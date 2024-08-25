<?php

use Core\Database;

if (!isset($_GET['id'])) {
    abort();
}

$db = new Database();

$media = $db->query('SELECT * FROM mediji WHERE id = ?', [$_GET['id']])->findOrFail();

$pageTitle = 'Uredi medij';

require base_path('views/media/edit.view.php');