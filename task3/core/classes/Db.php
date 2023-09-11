<?php

final class Db {
    private PDO $connection;
    private PDOStatement $stmt;
    private static ?Db $instance = null;

    private function __construct() {}

    public function getConnection(array $db_config) : Db
    {
        $dsn = "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset={$db_config['charset']}";

        try {
            $this -> connection = new PDO($dsn, $db_config['username'], $db_config['password'], $db_config['options']);
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
        return $this;
    }

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query($query, $params = []) : Db | bool
    {
        try {
            $this->stmt = $this -> connection -> prepare($query);
            $this->stmt -> execute($params);
        }
        catch (PDOException $e){
            return false;
        }

        return $this;
    }

    public function findAll() : array | false {
        return $this->stmt->fetchAll();
    }
    public function find(){
        return $this->stmt->fetch();
    }
}

