<?php

use Core\Database;

if (!isset($_GET['id'])) {
    abort();
}

$db = Database::get();

$prices = $db->query('SELECT * FROM cjenik WHERE id = ?', [$_GET['id']])->find();

if(empty($prices)){
    abort();
}

$pageTitle = 'Cjenik';

require base_path('views/prices/edit.view.php');