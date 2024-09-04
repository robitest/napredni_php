<?php

use Core\Database;
use Core\Session;

$db = Database::get();

const QUERY = [
    'movies' => "SELECT f.id,
                    f.naslov AS title, 
                    COUNT(f.id) AS stock,
                    f.godina AS year_released, 
                    z.id AS genre_id, 
                    z.ime AS genre_name
                FROM kopija k
                JOIN filmovi f ON k.film_id = f.id
                JOIN zanrovi z ON f.zanr_id = z.id
                WHERE k.dostupan = 1
                GROUP BY f.id, f.naslov
                ORDER BY f.naslov",
    'members' => "SELECT * FROM clanovi ORDER BY id",
    'formats' => "SELECT * FROM mediji ORDER BY id",
    'activeRentals' => "SELECT 
                    p.id AS pid,
                    k.id AS kid,
                    p.datum_posudbe, 
                    CONCAT(c.clanski_broj, ' - ' , c.ime, ' ', c.prezime) AS clan, 
                    f.naslov, 
                    m.tip,
                    CONCAT(cj.cijena, ' € - ', cj.tip_filma) AS cijena_tip_filma
                FROM posudba p
                JOIN posudba_kopija pk ON p.id = pk.posudba_id
                JOIN kopija k ON k.id = pk.kopija_id
                JOIN filmovi f ON f.id = k.film_id
                JOIN clanovi c ON c.id = p.clan_id
                JOIN cjenik cj ON cj.id = f.cjenik_id
                JOIN mediji m ON m.id = k.medij_id
                WHERE p.datum_povrata IS NULL
                ORDER BY p.id DESC",
];

$movies = $db->query(QUERY['movies'])->all();
$members = $db->query(QUERY['members'])->all();
$formats = $db->query(QUERY['formats'])->all();
$activeRentals = $db->query(QUERY['activeRentals'])->all();

$pageTitle = 'Kontrolna Ploča';

$errors = Session::all('errors');
$message = Session::all('message');
Session::unflash();

require base_path('views/dashboard/index.view.php');