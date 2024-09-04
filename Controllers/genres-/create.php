<?php

use Core\Session;

$errors = Session::all('errors');
Session::unflash();

$pageTitle = 'Žanrovi';
require base_path('views/genres/create.view.php');