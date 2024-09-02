<?php

use Core\Database;
use Core\Session;

if (!isset($_POST['id'] ) || !isset($_POST['_method']) || $_POST['_method'] !== 'DELETE') {
    abort();
}
$db = Database::get();
$db->query('DELETE FROM mediji WHERE id= ?', [$_POST['id']])->find();

Session::flash('message', [
    'type' => 'success',
    'message' => "Uspjesno obrisan podatak iz Medija."
]);

redirect('formats');
