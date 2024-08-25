<?php

use Core\Database;
use Core\Validator;
use Core\Session;

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    dd('Unsupported method!');
}

$postData = [ 
    'tip' => $_POST['media_type'],
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

$count = $db->query('SELECT id FROM mediji WHERE tip = ?', [$data['tip']])->find();

if(!empty($count)){
    die("Medij {$data['tip']} vec postoji u nasoj bazi!");
}

$sql = "INSERT INTO mediji (tip, koeficijent) VALUES (:tip, :koeficijent)";


$db->query($sql, [
    'tip' => $data['tip'], 
    'koeficijent' => $data['koeficijent']
]);

redirect('formats');
