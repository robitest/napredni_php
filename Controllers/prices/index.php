<?php

use Core\Database;

$db = Database::get();

$prices = $db->query("SELECT * from cjenik ORDER BY id")->all();

$pageTitle = 'Cjenik';

require '../views/prices/index.view.php';