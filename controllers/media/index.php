<?php

use Core\Database;

$db = new Database();

try {
    $sql = "SELECT * from mediji ORDER BY id";
    $media = $db->query($sql);
} catch (\Exception $exception) {
    die("Connection failed: {$exception->getmessage()}");
}

$pageTitle = 'Mediji';

require base_path('views/media/index.view.php');


