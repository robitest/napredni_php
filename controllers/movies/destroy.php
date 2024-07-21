<?php
// Ne radi, treba obrisati foreign key 
use Core\Database;

if (!isset($_POST['id'] ) || !isset($_POST['_method']) || $_POST['_method'] !== 'DELETE') {
    abort();
}

$db = new Database();

try {
    $sql = "DELETE FROM filmovi WHERE id= ?";
    $db->query($sql, [$_POST['id']]);
    redirect('movies');
} catch (PDOException $e) {
    // log the error
    echo "<p>There was an error processing your request. Please try again.</p>";
    throw $e;
}