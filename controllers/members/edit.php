<?php

use Core\Database;
use Core\Session;

if (!isset($_GET['id'])) {
    abort();
}

$db = Database::get();

$members = $db->query('SELECT * FROM clanovi WHERE id = ?', [$_GET['id']])->findOrFail();

$pageTitle = 'Uredi Člana';

$errors = Session::all('errors');
Session::unflash();

require base_path('views/members/edit.view.php');