<?php

use Core\Database;
use Core\Validator;
use Core\Session;

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    dd('Unsupported method!');
}

$postData = [
    "naslov" => $_POST['movie_title'],
    "godina" => $_POST['movie_year'],
    "zanr" => $_POST['movie_genre'],
    "cijena" => $_POST['price'],
    // "dvd_stock" => $_POST['dvd_stock'],
    // "blu-ray_stock" => $_POST['blu-ray_stock'],
    // "vhs_stock" => $_POST['vhs_stock'],
];

$rules = [
    'naslov' => ['required', 'string', 'max:100', 'unique:filmovi'],
    'godina' => ['required', 'numeric', 'max:4'],
    'zanr' => ['required'],
    'cijena' => ['required'],
    // 'dvd_stock' => ['required', 'string', 'max:100', 'unique:filmovi'],
    // 'blu-ray_stock' => ['required', 'string', 'max:100', 'unique:filmovi'],
    // 'vhs_stock' => ['required', 'string', 'max:100', 'unique:filmovi'],
];
$form = new Validator($rules, $postData);
if ($form->notValid()){
    Session::flash('errors', $form->errors());
    Session::flash('returnData', $form->getData());
    goBack();
}

// dd($postData['zanr']);
$data = $form->getData();

$db = Database::get();
// check if movie already exsists in db
$sql = "SELECT id FROM filmovi WHERE naslov = ?";
$count = $db->query($sql, [$data['naslov']])->find();
if(!empty($count)){
    die("Film {$postData['naslov']} vec postoji u nasoj bazi!");
}


$sql = "INSERT INTO filmovi (naslov, godina, zanr_id, cjenik_id) VALUES (:naslov, :godina, :zanr_id, :cjenik_id)";


$success = $db->query($sql, [
                                'naslov' => $data['naslov'], 
                                'godina' => $data['godina'], 
                                'zanr_id' => $data['zanr'], 
                                'cjenik_id' => $data['cijena']
                            ]);

redirect('movies');



