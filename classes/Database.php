<?php

class Database {

    private $pdo;

    public function __construct()
    {
        $config = require '../config.php';
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

        try {
            $this->pdo = new PDO($dsn, $config['user'], $config['password'], $config['options']);
        } catch (\Throwable $exception) {
            die('Connection to the database has filed! ' . $exception->getMessage());
        }
    }

    public function query($sql, $params = [])
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
    
        $results = $statement->fetchAll();

        return $results;
    }


}