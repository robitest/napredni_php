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
 
        $prices= $this->db->query('SELECT * FROM cjenik WHERE id = ?', [$_GET['id']])->findOrFail();

        require base_path('views/prices/show.view.php');

           
    }


    public function edit()
    {
        if (!isset($_GET['id'])) {
            abort();
        }

        $errors = Session::get('errors');
        Session::unflash();
        
        $prices = $this->db->query('SELECT * FROM cjenik WHERE id = ?', [$_GET['id']])->findOrFail();
        
        $pageTitle = 'Cjenik';
        
        require base_path('views/prices/edit.view.php');
    }


    public function update()
    {

        if (!isset($_POST['id'] )) {
            abort();
        }

        $rules = [
            'price_type' => ['required', 'unique:cjenik', 'string', 'max:20', 'min:2'],
            'price_amount' => ['required', 'numeric', 'max:10'],
            'late_fee' => ['required', 'numeric', 'max:10'],
        ];

        $form = new Validator($rules, $_POST);
        if ($form->notValid()){
            Session::flash('errors', $form->errors());
            goBack();
        }

        $data = $form->getData();

        $sql = "UPDATE cjenik SET tip_filma = ?, cijena = ?, zakasnina_po_danu = ? WHERE id = ?";
        $this->db->query($sql, [$data['price_type'], $data['price_amount'], $data['late_fee'], $_POST['id']]);
    
        Session::flash('message', [
            'type' => 'success',
            'message' => "Uspješno uređeni cjenik {$data['price_type']}."
        ]); 
        redirect('prices');

    }


    public function create()
    {
        $errors = Session::all('errors');
        Session::unflash();

        $pageTitle = 'Novi Cjenik';
        require base_path('views/prices/create.view.php');
    }


    public function store()
    {
        if (!isset($_POST['id'] )) {
            abort();
        }
        
        $rules = [
            'price_type' => ['required', 'unique:cjenik', 'string', 'max:20', 'min:2'],
            'price_amount' => ['required', 'numeric', 'max:10'],
            'late_fee' => ['required', 'numeric', 'max:10'],
        ];
        
        $form = new Validator($rules, $_POST);
        if ($form->notValid()){
            Session::flash('errors', $form->errors());
            goBack();
        }
        
        $data = $form->getData();
        
        $sql = "INSERT INTO cjenik (tip_filma, cijena, zakasnina_po_danu) VALUES (?, ?, ?)";
        $this->db->query($sql, [$data['price_type'], $data['price_amount'], $data['late_fee']]);

        Session::flash('message', [
            'type' => 'success',
            'message' => "Uspješno kreiran tip filma {$data['tip_filma']}."
        ]);   

        redirect('prices');

    }


    public function delete()
    {
        if (!isset($_POST['id'] )) {
            abort();
        }
        
        $sql = 'SELECT * from cjenik WHERE id = :id';
        $price = $this->db->query($sql, ['id' => $_POST['id']])->findOrFail();
        
        $sql = "DELETE from cjenik WHERE id = ?";
        
        try {
            $this->db->query($sql, [$_POST['id']]);
        } catch (ResourceInUseException $e) {
            Session::flash('message', [
                'type' => 'danger',
                'message' => "Ne možete obrisati cjenik {$price['tip_filma']} prije nego obrišete njegove posudbe."
            ]);
            goBack();
        }
        
        Session::flash('message', [
            'type' => 'success',
            'message' => "Uspješno obrisan cjenik '{$price['tip_filma']}'."
        ]);
        
        redirect('prices');

    }

}