<?php

use Core\Database;

if (isset($_GET['id'])) {

    $db = Database::get();

    $sql = 'SELECT * from mediji WHERE id = :id';
    
    $media = $db->query($sql, ['id' => $_GET['id']])->findOrFail();
   
    require base_path('views/formats/show.view.php');
} else {
    abort();
}