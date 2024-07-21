<?php

use Core\Database;

if (!isset($_GET['id'])) {
    abort();
}

$db = new Database();

$media = $db->fetch('SELECT * FROM mediji WHERE id = ?', [$_GET['id']]);

if(empty($media)){
    abort();
}

$pageTitle = 'Uredi medij';

require base_path('views/media/edit.view.php');