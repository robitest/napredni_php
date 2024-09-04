<?php

namespace Controllers;
use Core\Database;
use Core\Validator;
use Core\Session;

class LoginController
{
    private Database $db;


    public function __construct()
    {
        $this->db = Database::get();
    }


    public function create()
    {
        $pageTitle = 'Login';
        $errors = Session::get('errors');
        require_once base_path('views/login/create.view.php');
    }

    public function store()
    {
        // validirati podatke iz forme
        $rules = [
            'email' => ['required', 'email'],
            'password' => ['required', 'password', 'min:3', 'max:255']
        ];

        $form = new Validator($rules, $_POST);
        if ($form->notValid()){
            Session::flash('errors', $form->errors());
            goBack();
        }
        
        $data = $form->getData();
        
        // provjeriti da li postoji user sa datim emailom u bazi
        $user = $this->db->query("SELECT * FROM clanovi WHERE email = ?", [$data['email']]);

        if ($user) {
            // if (password_hash($data['password'], PASSWORD_BCRYPT) === $user['password']) {
            if (password_verify($data['password'], $user['password'])) {
                $this->login($data);
                redirect('dashboard');
            }
        } else {
            // vratiti na login ponovno
            // vratiti gresku da korisnik ne postoji
        }

        $this->login($data);

        redirect('members');
    }

    public function login($data)
    {
        Session::put('user', [
            'ime' => $data['ime'],
            'prezime' => $data['prezime'],
            'email' => $data['email'],
        ]);

        session_regenerate_id();
    }

    public function logout()
    {
        Session::destroy();
    }
}

