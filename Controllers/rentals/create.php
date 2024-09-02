<?php

use Core\Database;
use Core\Session;

$errors = Session::all('errors');
$returnData = Session::all('returnData');
Session::unflash();

const QUERY = [
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

$db = Database::get();

$movies = $db->query(QUERY['movies'])->all();
$members = $db->query(QUERY['members'])->all();
$formats = $db->query(QUERY['formats'])->all();

$pageTitle = 'Nova Posudbe';
require base_path('views/rentals/create.view.php');

