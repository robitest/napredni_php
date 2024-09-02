<?php

namespace Controllers;

use Core\Database;
use Core\Session;
use Core\Validator;
use Core\ResourceInUseException;

class GenresController
{
    private Database $db;

    public function __construct()
    {
        $this->db = Database::get();
    }

    public function index()
    {

        $genres = $this->db->query('SELECT * from zanrovi ORDER BY id')->all();

        $pageTitle = 'Žanrovi';

        require '../views/genres/index.view.php';
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
        
        $genre = $this->db->query('SELECT * FROM zanrovi WHERE id = ?', [$_GET['id']])->findOrFail();
        
        $pageTitle = 'Žanrovi';
        
        require base_path('views/genres/edit.view.php');
    }

    public function update()
    {

    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function delete()
    {

    }
}