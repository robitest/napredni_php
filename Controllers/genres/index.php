<?php

namespace Controllers\genres;

use Core\Database;

class IndexController
{
    public function execute()
    {
        $db = Database::get();

        $genres = $db->query('SELECT * from zanrovi ORDER BY id')->all();

        $pageTitle = 'Žanrovi';

        require '../views/genres/index.view.php';
    }
}


