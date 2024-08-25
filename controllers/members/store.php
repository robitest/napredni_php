<?php

use Core\Database;
use Core\Validator;
use Core\Session;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $postData = [
        "ime" => $_POST['first_name'],
        "prezime" => $_POST['last_name'],
        "adresa" => $_POST['address'],
        "tel" => $_POST['tel'],
        "email" => $_POST['email'],
        "clanId" => $_POST['member_id']
    ];
    
    $rules = [
        'ime' => ['required', 'string', 'max:100', 'unique:zanrovi'],
        'prezime' => ['required', 'string', 'max:100', 'unique:zanrovi'],
        'adresa' => ['required', 'string', 'max:100', 'unique:zanrovi'],
        'tel' => ['required', 'string', 'max:100', 'unique:zanrovi'],
        'email' => ['required', 'string', 'max:100', 'unique:zanrovi'],
        'clanId' => ['required', 'string', 'max:100', 'unique:clanovi'],
    ];

    $form = new Validator($rules, $postData);
    if ($form->notValid()){
        Session::flash('errors', $form->errors());
        goBack();
    }
    
    $data = $form->getData();
    
    $db = new Database();
    // check if email already exsists in db
    $count = $db->query('SELECT id FROM clanovi WHERE email = ?', [$data['email']])->find();
    if(!empty($count)){
        die("Član sa emailom {$data['email']} vec postoji u nasoj bazi!");
    }

    $sql = "INSERT INTO clanovi (ime, prezime, adresa, telefon, email, clanski_broj) VALUES (:ime, :prezime, :adresa, :telefon, :email, :clanski_broj)";
    
    try {
        $success = $db->query($sql, [
                                        'ime' => $data['ime'], 
                                        'prezime' => $data['prezime'], 
                                        'adresa' => $data['adresa'], 
                                        'telefon' => $data['tel'],
                                        'email' => $data['email'], 
                                        'clanski_broj' => $data['clanId']
                                    ]);

                                    
    } catch (\Throwable $th) {
        throw $th;
    }
    
    redirect('members');
} else {
    dd('Unsupported method!');
}





