<?php

$db = new Database();

try {
    $sql = "SELECT * FROM clanovi";
    $members = $db->query($sql);
} catch (\Exception $exception) {
    die("Connection failed: {$exception->getmessage()}");
}

$pageTitle = 'Članovi';

require '../views/members/index.view.php';