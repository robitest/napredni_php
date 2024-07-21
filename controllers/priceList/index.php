<?php

use Core\Database;

$db = new Database();

try {
    $sql = "SELECT * from cjenik ORDER BY id";
    $prices = $db->query($sql);
} catch (\Exception $exception) {
    die("Connection failed: {$exception->getmessage()}");
}

$pageTitle = 'Cjenik';

require '../views/priceList/index.view.php';