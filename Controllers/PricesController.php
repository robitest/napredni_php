<?php

namespace Controllers;

use Core\Database;
use Core\Session;
use Core\Validator;
use Core\ResourceInUseException;

class PricesController
{

    private Database $db;



    public function __construct()
    {
        $this->db = Database::get();
    }


    public function index()
    {
        $prices = $this->db->query("SELECT * from cjenik ORDER BY id")->all();

        $pageTitle = 'Cjenik';
        
        require '../views/prices/index.view.php';
    }


    public function show()
    {
        if (!isset($_GET['id'])) {
            abort();
        }

        $genre = $this->db->query('SELECT * from zanrovi WHERE id = ?', [$_GET['id']])->findOrFail();
    
        $movies = $this->db->query('SELECT f.*, c.tip_filma FROM filmovi f JOIN cjenik c ON c.id = f.cjenik_id WHERE zanr_id = ?', [$_GET['id']])->all();
    
        require base_path('views/genres/show.view.php');
           
    }


    public function edit()
    {
        if (!isset($_GET['id'])) {
            abort();
        }

        $errors = Session::get('errors');
        Session::unflash();
        
        $genre = $this->db->query('SELECT * FROM zanrovi WHERE id = ?', [$_GET['id']])->findOrFail();
        
        $pageTitle = 'Žanrovi';
        
        require base_path('views/genres/edit.view.php');
    }


    public function update()
    {
        if (!isset($_POST['id'] )) {
            abort();
        }

        $genre = $this->db->query('SELECT * FROM zanrovi WHERE id = ?', [$_POST['id']])->findOrFail();

        $rules = [
            'ime' => ['required', 'string', 'max:100', 'unique:zanrovi'],
        ];

        $form = new Validator($rules, $_POST);
        if ($form->notValid()){
            goBack();
        }

        $data = $form->getData();

        $sql = "UPDATE zanrovi SET ime = ? WHERE id = ?";
        $this->db->query($sql, [$data['ime'], $genre['id']]);

        redirect('genres');
    }


    public function create()
    {
        $errors = Session::all('errors');
        Session::unflash();

        $pageTitle = 'Žanrovi';
        require base_path('views/genres/create.view.php');
    }


    public function store()
    {
        
        $rules = [
            'ime' => ['required', 'string', 'max:100', 'unique:zanrovi'],
        ];
        
        $form = new Validator($rules, $_POST);
        if ($form->notValid()){
            Session::flash('errors', $form->errors());
            goBack();
        }
        
        $data = $form->getData();
        
        $sql = "INSERT INTO zanrovi (ime) VALUES (:ime)";
        $this->db->query($sql, ['ime' => $data['ime']]);
        
        redirect('genres');
    }


    public function delete()
    {
        if (!isset($_POST['id'])) {
            abort();
        }

        $genre = $this->db->query('SELECT * FROM zanrovi WHERE id = ?', [$_POST['id']])->findOrFail();

        try {
            $this->db->query('DELETE FROM zanrovi WHERE id = ?', [$genre['id']]);
        } catch (ResourceInUseException $e) {
            dd('nemere');
        }

        redirect('genres');
    }

}