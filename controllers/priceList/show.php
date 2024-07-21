<?php

use Core\Database;

if (isset($_GET['id'])) {

    $db = new Database();
    
    try {
        $priceList= $db->fetch('SELECT * FROM cjenik WHERE id = ?', [$_GET['id']]);
        if(empty($priceList)){
            abort();
        }
    } catch (\PDOException $exception) {
        throw $exception;
    }

    require base_path('views/priceList/show.view.php');
} else {
    abort();
}