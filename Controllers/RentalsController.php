<?php

namespace Controllers;

use Core\Database;
use Core\Session;
use Core\Validator;
use Core\ResourceInUseException;
use PDOException;


class RentalsController
{

    private Database $db;



    public function __construct()
    {
        $this->db = Database::get();
    }


    public function index()
    {
        $errors = Session::all('errors');
        $message = Session::all('message');
        Session::unflash();
            
        // posudbe -> samo aktivne posudbe -> posudba* + clan.ime + film * + tocna cijena, zakasnina
        $sql = "SELECT  p.id AS posudba_id, 
                        p.datum_posudbe AS datum_posudbe,
                        p.datum_povrata AS datum_povrata,
                        c.ime AS clan_ime, 
                        c.prezime AS clan_prezime,  
                        f.id AS id_filma,
                        f.naslov AS naslov_filma, 
                        f.godina AS godina_filma, 
                        z.ime AS zanr_filma, 
                        cj.cijena AS cijena_filma, 
                        cj.zakasnina_po_danu AS zfpd
                FROM posudba p
                JOIN clanovi c ON p.clan_id = c.id
                JOIN posudba_kopija pk ON p.id = pk.posudba_id
                JOIN kopija k ON pk.kopija_id = k.id
                JOIN mediji m ON k.medij_id = m.id
                JOIN filmovi f ON k.film_id = f.id
                JOIN zanrovi z ON f.zanr_id = z.id
                JOIN cjenik cj ON cj.id = f.cjenik_id
                WHERE p.datum_povrata IS NULL
                ORDER BY datum_posudbe ASC;";
        
        $rentals = $this->db->query($sql)->all();
        
        $pageTitle = 'Posudbe';
        
        require '../views/rentals/index.view.php';
    }


    public function show()
    {
        if (!isset($_GET['id'])) {
            abort();
        }
            
        $sql = 'SELECT * from posudba WHERE id = :id';
        
        $rental = $this->db->query($sql, ['id' => $_GET['id']])->find();

        require base_path('views/rentals/show.view.php');
           
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
        if (!isset($_POST['id'] )) {
            abort();
        }

        $rules = [
            'id' => ['numeric'],
        ];

        $form = new Validator($rules, $_POST);
        if ($form->notValid()){
            Session::flash('errors', $form->errors());
            goBack();
        }
        
        $data = $form->getData();
        $rentals = $this->db->query('SELECT * FROM posudba WHERE id = ?', [$_POST['id']])->findOrFail();
        dd($rentals);
        
        try {
            $sql = "UPDATE posudba SET datum_povrata = ? WHERE id = ?";
            $db->query($sql, [$data['zanr'], $data['id']]);
        
            redirect('genres');
        } catch (PDOException $e) {
            // log the error
            echo "<p>There was an error processing your request. Please try again.</p>";
            throw $e;
        }
    }


    public function create()
    {
        $errors = Session::all('errors');
        $returnData = Session::all('returnData');
        Session::unflash();
        
        $sqls = [
            'movies' => "SELECT f.id, f.naslov AS title, COUNT(f.id) AS 'stock', f.godina AS year_released, z.id AS genre_id, z.ime AS genre_name
                        FROM kopija k
                        JOIN filmovi f ON k.film_id = f.id
                        JOIN zanrovi z ON f.zanr_id = z.id
                        WHERE k.dostupan = 1
                        GROUP BY f.id, f.naslov
                        ORDER BY f.naslov",
            'members' => "SELECT * FROM clanovi ORDER BY id",
            'formats' => "SELECT * FROM mediji ORDER BY id",
        ];
        
        $movies = $this->db->query($sqls['movies'])->all();
        $members = $this->db->query($sqls['members'])->all();
        $formats = $this->db->query($sqls['formats'])->all();
        
        $pageTitle = 'Nova Posudbe';
        require base_path('views/rentals/create.view.php');
    }


    public function store() //treba rijesit
    {
        $rules = [
            'movie' => ['required'],
        ];
        
        $form = new Validator($rules, $_POST);
        if ($form->notValid()){
            Session::flash('errors', $form->errors());
            goBack();
        }
        $data = $form->getData();
        // popravit upit
        $count = $this->db->query('SELECT id FROM mediji WHERE tip = ?', [$data['tip']])->find();
        
        if(!empty($count)){
            die("Medij {$data['tip']} vec postoji u nasoj bazi!");
        }
        
        $sql = "INSERT INTO mediji (tip, koeficijent) VALUES (:tip, :koeficijent)";
        
        
        $this->db->query($sql, [
            'tip' => $data['tip'], 
            'koeficijent' => $data['koeficijent']
        ]);
        
        Session::flash('message', [
            'type' => 'success',
            'message' => "Uspješno kreirana posudba filma."
        ]);
        
        if (parse_url($_SERVER['HTTP_REFERER'])['path'] === '/dashboard') {
            redirect('dashboard');
        }
        
        redirect('rentals');
    }


    public function delete()
    {
        if (!isset($_POST['id'])) {
            abort();
        }

        $rental = $this->db->query('SELECT * from posudba WHERE id = :id', ['id' => $_POST['pid']])->findOrFail();
        $copy   = $this->db->query("SELECT * from kopija WHERE id = :id", ['id' => $_POST['kid']])->findOrFail();

        $rentals = $this->db->query('SELECT posudba_id from posudba_kopija WHERE posudba_id = :posudba_id', ['posudba_id' => $_POST['pid']])->all();

        try {
            $this->db->connection()->beginTransaction(); 

            if (count($rentals) === 1) {
                // samo jedna kopija je u posudbi, oznaci posudbu kao vraceno
                $this->db->query('UPDATE posudba SET datum_povrata = ?, updated_at = ? WHERE id = ?', [
                    date('Y-m-d'), date("Y-m-d H:i:s"), $_POST['pid']
                ]);
            }else{
                // posudba ima jos ne vracenih koopija , samo osvjezi updated_at
                $this->db->query("UPDATE posudba SET updated_at = :d WHERE id = :pid", [
                    'pid' => $rental['id'],
                    'd' => date("Y-m-d H:i:s")
                ]);
            }

            $this->db->query("DELETE from posudba_kopija WHERE posudba_id = :pid AND kopija_id = :kid", [
                'pid' => $rental['id'],
                'kid' => $copy['id'],
            ]);

            $this->db->query("UPDATE kopija SET dostupan = 1 WHERE id = :kid", ['kid' => $copy['id']]);
        } catch (PDOException $e) {
            $this->db->connection()->rollBack();
            Session::flash('message', [
                'type' => 'danger',
                'message' => 'Something wrong'
            ]);
            goBack();
        }

        $this->db->connection()->commit();

        Session::flash('message', [
            'type' => 'success',
            'message' => "Uspjesno vracena kopija {$copy['id']}"
        ]);
        goBack();

    }
    
}