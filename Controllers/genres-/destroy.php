<?php

use Core\Database;

if (!isset($_POST['id'] ) || !isset($_POST['_method']) || $_POST['_method'] !== 'DELETE') {
    abort();
}

$db = new Database();

$db->query('DELETE FROM zanrovi WHERE id = ?', [$_POST['id']]);

redirect('genres');
