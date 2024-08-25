<?php

use Core\Database;

if (!isset($_POST['id'] ) || !isset($_POST['_method']) || $_POST['_method'] !== 'DELETE') {
    abort();
}

$db = Database::get();

$sql = "DELETE FROM mediji WHERE id= ?";
$db->query($sql, [$_POST['id']])->find();

redirect('media');
