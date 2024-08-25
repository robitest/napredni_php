<?php

use Core\Database;

$db = Database::get();

$genres = $db->query('SELECT * from zanrovi ORDER BY id')->all();

$pageTitle = 'Žanrovi';

require '../views/genres/index.view.php';