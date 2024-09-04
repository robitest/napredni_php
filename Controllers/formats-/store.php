<?php

use Core\Database;
use Core\Session;
use Core\Validator;

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    dd('Unsupported method!');
}

$postData = [ 
    'tip' => $_POST['test'],
    'koeficijent' => $_POST['coefficient'],
];

$rules = [
    'tip' => ['required', 'string', 'max:30', 'unique:mediji'],
    'koeficijent' => ['required', 'numeric', 'max:10'],
];

$form = new Validator($rules, $postData);

if ($form->notValid()){
    Session::flash('errors', $form->errors());
    goBack();
}

$data = $form->getData();

$db = Database::get();

$sql = "INSERT INTO mediji (tip, koeficijent) VALUES (:tip, :koeficijent)";


$db->query($sql, [
    'tip' => $data['tip'], 
    'koeficijent' => $data['koeficijent']
]);

Session::flash('message', [
    'type' => 'success',
    'message' => "Uspjesno kreiran podatak {$data['tip']} iz Medija."
]);

redirect('formats');
