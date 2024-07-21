<?php

use Core\Database;

if (!isset($_GET['id'])) {
    abort();
}

$db = new Database();

$members = $db->fetch('SELECT * FROM clanovi WHERE id = ?', [$_GET['id']]);

if(empty($members)){
    abort();
}

$pageTitle = 'Clanovi';
// dd($members);
require base_path('views/members/edit.view.php');