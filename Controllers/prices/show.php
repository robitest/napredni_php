<?php

use Core\Database;

if (isset($_GET['id'])) {

    $db = Database::get();
    
    try {
        $prices= $db->query('SELECT * FROM cjenik WHERE id = ?', [$_GET['id']])->find();
        if(empty($prices)){
            abort();
        }
    } catch (\PDOException $exception) {
        throw $exception;
    }

    require base_path('views/prices/show.view.php');
} else {
    abort();
}