<?php

use Core\Database;

if (!isset($_GET['id'])) {
    abort();
}

$db = new Database();

$prices = $db->fetch('SELECT * FROM cjenik WHERE id = ?', [$_GET['id']]);

if(empty($prices)){
    abort();
}

$pageTitle = 'Cjenik';

require base_path('views/priceList/edit.view.php');