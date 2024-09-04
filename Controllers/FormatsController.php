<?php

namespace Controllers;

use Core\Database;
use Core\Session;
use Core\Validator;
use Core\ResourceInUseException;

class FormatsController
{

    private Database $db;



    public function __construct()
    {
        $this->db = Database::get();
    }


    public function index()
    {
        $formats = $this->db->query("SELECT * from mediji ORDER BY id")->all();

        $pageTitle = 'Mediji';
        
        $message = Session::all('message');
        Session::unflash();
        
        require base_path('views/formats/index.view.php');
    }


    public function show()
    {
        if (!isset($_GET['id'])) {
            abort();
        }
    
        $format = $this->db->query("SELECT * from mediji WHERE id = :id", ['id' => $_GET['id']])->findOrFail();

        $pageTitle = 'Mediji';
       
        require base_path('views/formats/show.view.php');
           
    }


    public function edit()
    {
        if (!isset($_GET['id'])) {
            abort();
        }

        $errors = Session::all('errors');
        Session::unflash();
        
        $format = $this->db->query("SELECT * from mediji WHERE id = :id", [':id' => $_GET['id']])->findOrFail();

        $pageTitle = 'Uredi Medij';
        
        require base_path('views/formats/edit.view.php');
    }


    public function update()
    {
        if (!isset($_POST['id'] )) {
            abort();
        }

        $id = $_POST['id'];
        $format = $this->db->query("SELECT * from mediji WHERE id = :id", ['id' => $id])->findOrFail();
        
        // validacija
        $rules = [
            'tip'         => ['required', 'string', 'min:2', 'max:100', 'unique:mediji'],
            'koeficijent' => ['required', 'numeric', 'gt:0', 'lt:100']
        ];
        
        $form = new Validator($rules, $_POST);
        if ($form->notValid()) {
            Session::flash('errors', $form->errors());
            goBack();
        }
        
        $data = $form->getData();
        
        $sql = "UPDATE mediji SET tip = :tip, koeficijent = :koeficijent WHERE id = :id";
        $this->db->query($sql, ['tip' => $data['tip'], 'koeficijent' => $data['koeficijent'], 'id' => $id]);
        
        Session::flash('message', [
            'type' => 'success',
            'message' => "Uspješno uredjeni podaci o mediju {$data['tip']}",
        ]);
        
        redirect('formats');
    }


    public function create()
    {
        $errors = Session::all('errors');
        Session::unflash();
        
        $pageTitle = 'Novi Medij';
        require base_path('views/formats/create.view.php');
    }


    public function store()
    {
        $rules = [
            'tip'         => ['required', 'string', 'min:2', 'max:100', 'unique:mediji'],
            'koeficijent' => ['required', 'numeric', 'gt:0', 'lt:100']
        ];
        
        $form = new Validator($rules, $_POST);
        if ($form->notValid()){
            Session::flash('errors', $form->errors());
            goBack();
        }
        
        $data = $form->getData();
        
        $sql = "INSERT INTO mediji (tip, koeficijent) VALUES (:tip, :koeficijent)";
        
        $this->db->query($sql, ['tip' => $data['tip'], 'koeficijent' => $data['koeficijent']]);
        
        Session::flash('message', [
            'type' => 'success',
            'message' => "Uspjesno kreiran podatak {$data['tip']} iz Medija."
        ]);
        
        redirect('formats');
    }


    public function delete()
    {
        if (!isset($_POST['id'])) {
            abort();
        }
        
        $id = $_POST['id'];
        $format = $this->db->query("SELECT * from mediji WHERE id = :id", ['id' => $id])->findOrFail();
        
        try {
            $this->db->query("DELETE from mediji WHERE id = :id", ['id' => $id]);
        } catch (ResourceInUseException $exception) {
            Session::flash('message', [
                'type' => 'danger',
                'message' => "Ne mozete obrisati medij {$format['tip']} prije nego obrisete sve kopije koje koriste ovaj medij"
            ]);
            goBack();
        }
        
        Session::flash('message', [
            'type' => 'success',
            'message' => "Uspjesno obrisan medij {$format['tip']}"
        ]);
        
        redirect('formats');
    }
    
}