<?php

use Core\Database;
use Core\Validator;
use Core\Session;
if (!isset($_POST['id'] ) || !isset($_POST['_method']) || $_POST['_method'] !== 'PATCH') {
    abort();
}

$postData = [
    "id" => $_POST['id'],
];

$rules = [
    'id' => ['numeric'],
];
// dd($postData);
// $form = new Validator($rules, $postData);
// if ($form->notValid()){
//     Session::flash('errors', $form->errors());
//     goBack();
// }

// $data = $form->getData();
$db = Database::get();
$rentals = $db->query('SELECT * FROM posudba WHERE id = ?', [$_POST['id']])->findOrFail();
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