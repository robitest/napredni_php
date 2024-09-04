<?php

use Core\Session;

$errors = Session::all('errors');
Session::unflash();

$pageTitle = 'Novi Medij';
require base_path('views/formats/create.view.php');