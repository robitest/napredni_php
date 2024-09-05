<?php

namespace Controllers;

use Core\Database;
use Core\Session;
use Core\Validator;
use Core\ResourceInUseException;

class MoviesController
{

    private Database $db;



    public function __construct()
    {
        $this->db = Database::get();
    }


    public function index()
    {
        $message = Session::all('message');
        Session::unflash();

        $sql = "SELECT
            f.id,
            f.naslov,
            f.godina,
            z.ime AS zanr,
            c.tip_filma
            from
                filmovi f
                JOIN cjenik c ON f.cjenik_id = c.id
                JOIN zanrovi z ON f.zanr_id = z.id
            ORDER BY
                f.id";
        
        $movies = $this->db->query($sql)->all();
    
        $pageTitle = 'Filmovi';
        
        require '../views/movies/index.view.php';
    }


    public function show()
    {
        if (!isset($_GET['id'])) {
            abort();
        }

        $sql = [
            "movies" => 'SELECT
            f.id,
            f.naslov,
            f.godina,
            z.ime AS zanr,
            c.tip_filma
            from
                filmovi f
                JOIN cjenik c ON f.cjenik_id = c.id
                JOIN zanrovi z ON f.zanr_id = z.id
            WHERE f.id = ?'
        ];
        
        $movies = $this->db->query($sql['movies'], [$_GET['id']])->findOrFail();
        
        require base_path('views/movies/show.view.php');
           
    }


    public function edit()
    {
        if (!isset($_GET['id'])) {
            abort();
        }

        $sqls = [
            "movies" => "SELECT
                            f.*,
                            z.ime AS ime_zanra,
                            c.tip_filma,
                            c.cijena,
                            c.zakasnina_po_danu
                        from
                                filmovi f
                        JOIN cjenik c ON f.cjenik_id = c.id
                        JOIN zanrovi z ON f.zanr_id = z.id 
                        WHERE f.id = ?",
            "genres" => "SELECT * FROM zanrovi ORDER BY id",
            "priceList" => "SELECT * FROM cjenik ORDER BY id"
        ];
        
        $db = Database::get();
        
        $movies = $db->query($sqls['movies'], [$_GET['id']])->findOrFail();

        $genres = $db->query($sqls['genres'])->all();

        $priceList = $db->query($sqls['priceList'])->all();
        
        $pageTitle = 'Filmovi';
        
        require base_path('views/movies/edit.view.php');
    }


    public function update()
    {
        if (!isset($_POST['id'] )) {
            abort();
        }

        $rules = [
            'movie_title' => ['required', 'string', 'max:100', 'unique:filmovi'],
            'movie_year' => ['required'],
            'genre' => ['required'],
            'price' => ['required'],
        ];

        $form = new Validator($rules, $_POST);
        if ($form->notValid()){
            goBack();
        }
        
        $data = $form->getData();

        $movies = $this->db->query('SELECT * FROM filmovi WHERE id = ? ', [$data['id']]);

        $sql = "UPDATE filmovi SET naslov = ?, godina = ?, zanr_id = ?, cjenik_id = ? WHERE id = ? ";
        $this->db->query($sql, [$data['movie_title'], $data['movie_year'], $data['genre'], $data['price'], $data['id']]);

        redirect('movies');

    }


    public function create()
    {
        $errors = Session::all('errors');
        $returnData = Session::all('returnData');
        Session::unflash();
        
        $sqls = [
            'genres' => "SELECT * FROM zanrovi ORDER BY id",
            'prices' => "SELECT * FROM cjenik ORDER BY id"
        ];
        
        // Dohvacanje zanrova
        $genres = $this->db->query($sqls['genres'])->all();
        // Dohvacanje cjenika
        $prices = $this->db->query($sqls['priceList'])->all();
        
        require '../views/movies/create.view.php';
    }


    public function store()
    {
        
        $rules = [
            'naslov' => ['required', 'string', 'max:100', 'min:2'],
            'godina' => ['required', 'numeric','max:4'],
            'zanr' => ['required', 'numeric', 'exists:zanrovi,id'],
            'cjenik' => ['required', 'numeric', 'exists:cjenik,id'],
        ];
        
        $form = new Validator($rules, $_POST);
        if ($form->notValid()){
            goBack();
        }
        
        $data = $form->getData();
        
        $sql = "INSERT INTO filmovi (naslov, godina, zanr_id, cjenik_id) VALUES (:naslov, :godina, :zanr_id, :cjenik_id)";
        
        $this->db->query($sql, [
            'naslov' => $data['naslov'],
            'godina' => $data['godina'],
            'zanr_id' => $data['zanr'],
            'cjenik_id' => $data['cjenik']
        ]);
        
        redirect('movies');
    }


    public function delete()
    {
        if (!isset($_POST['id'])) {
            abort();
        }

        $sql = "DELETE FROM filmovi WHERE id = ?";
        $this->db->query($sql, [$_POST['id']]);
        redirect('movies');

    }

}