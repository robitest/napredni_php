<?php

 namespace Core;
 use PDO;

class Database {

    private $pdo;

    public function __construct()
    {
        $config = require_once base_path('Core/config.php');
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
    
        return $statement;
    }

    public function fetch($sql, $params = [])
    {
       return  $this->query($sql, $params)->fetch();
    }

    // public function exec($sql, $params = [])
    // {
    //    return  $this->query($sql, $params)->fetch();
    // }

}