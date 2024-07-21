<?php

use Core\Database;

if (!$_SERVER['REQUEST_METHOD'] === 'POST' || !isset($_POST['storeMedia'])) {
    abort();
}

$data = [ 
    'tip' => $_POST['media_type'],
    'koeficijent' => $_POST['coefficient'],
];

$db = new Database();
$count = $db->fetch('SELECT id FROM mediji WHERE tip = ?', [$data['tip']]);

if(!empty($count)){
    die("Medij {$data['tip']} vec postoji u nasoj bazi!");
}

$sql = "INSERT INTO mediji (tip, koeficijent) VALUES (:tip, :koeficijent)";

try {
    $success = $db->query($sql, [
                                    'tip' => $data['tip'], 
                                    'koeficijent' => $data['koeficijent']
                                ]);

    redirect('media');
                                
} catch (\Throwable $th) {
    throw $th;
}