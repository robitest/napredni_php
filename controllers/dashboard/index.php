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
    'activeRentals' => "SELECT p.id AS rental_id, 
                            p.datum_posudbe AS rental_date,
                            c.id AS member_id, 
                            c.ime AS member_name, 
                            c.prezime AS member_lastname,  
                            c.clanski_broj AS membership_number,  
                            f.id AS movie_id,
                            f.naslov AS movie_title, 
                            f.godina AS movie_year, 
                            m.tip AS movie_media, 
                            z.ime AS movie_genre, 
                            cj.cijena AS movie_price, 
                            cj.zakasnina_po_danu AS late_fee_per_day
                        FROM posudba p
                        JOIN clanovi c ON p.clan_id = c.id
                        JOIN posudba_kopija pk ON p.id = pk.posudba_id
                        JOIN kopija k ON pk.kopija_id = k.id
                        JOIN mediji m ON k.medij_id = m.id
                        JOIN filmovi f ON k.film_id = f.id
                        JOIN zanrovi z ON f.zanr_id = z.id
                        JOIN cjenik cj ON cj.id = f.cjenik_id
                        WHERE p.datum_povrata IS NULL
                        ORDER BY datum_posudbe ASC",
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