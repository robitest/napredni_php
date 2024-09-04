<?php

use Core\Database;
use Core\Validator;
use Core\Session;

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    dd('Unsupported method!');
}

$postData = [ 
    'movie' => $_POST['movie'],
];

$rules = [
    'movie' => ['required'],
];

$form = new Validator($rules, $postData);
if ($form->notValid()){
    Session::flash('errors', $form->errors());
    goBack();
}
$data = $form->getData();
// dd($data);

// $db = Database::get();

// $count = $db->query('SELECT id FROM mediji WHERE tip = ?', [$data['tip']])->find();

// if(!empty($count)){
//     die("Medij {$data['tip']} vec postoji u nasoj bazi!");
// }

// $sql = "INSERT INTO mediji (tip, koeficijent) VALUES (:tip, :koeficijent)";


// $db->query($sql, [
//     'tip' => $data['tip'], 
//     'koeficijent' => $data['koeficijent']
// ]);

Session::flash('message', [
    'type' => 'success',
    'message' => "Uspješno kreirana posudba filma."
]);

if (parse_url($_SERVER['HTTP_REFERER'])['path'] === '/dashboard') {
    redirect('dashboard');
}

redirect('rentals');