<?php

use Core\Database;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $data = [
        "ime" => $_POST['first_name'],
        "prezime" => $_POST['last_name'],
        "adresa" => $_POST['address'],
        "tel" => $_POST['tel'],
        "email" => $_POST['email'],
        "clanId" => $_POST['member_id']
    ];

    // Validacija forme pomoću foreach petlje
    foreach ($data as $key => $value) {
        // Provjera ima li praznih polja
        if(empty($value)){
            dd("Polje $key ne smije biti prazno");
        }
    }

    // Provjera je li niz imena i prezimena između 3 i 30 slova  
    if(checkStringLength($data['ime'], 3, 30) && checkStringLength($data['ime'], 3, 30)){ // todo checkStringLength($string, $min, $max);
        dd("Polje ime treba imati izmedu 3 i 30 slova"); 
    }
    
    // Provjera da li adresa nema vise od 100 slova 
    if(checkStringLength($data['adresa'], 0, 100)){
        dd("Polje ime treba imati izmedu 3 i 30 slova");
    }
    
    // Provjera je li telefon broj  
    if(!filter_var($data['tel'], FILTER_VALIDATE_INT)){
        dd("Polje telefon treba sadrzavati samo brojeve");
    }

    // Provjera li je email validan 
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        dd("Polje treba sadrzavati validnu email adresu");
    }
    
    $db = new Database();
    // check if email already exsists in db
    $sql = "SELECT id FROM clanovi WHERE email = ?";
    $count = $db->query($sql, [$data['email']]);
    
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





