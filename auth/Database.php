<?php

class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'aecgs';
    private $connection;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        try {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
            $this->connection->set_charset("utf8mb4");
            
            if ($this->connection->connect_error) {
                throw new Exception("Erreur de connexion à la base de données: " . $this->connection->connect_error);
            }
        } catch (Exception $e) {
            die("Erreur de connexion: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->connection;
    }

    public function prepare($query) {
        return $this->connection->prepare($query);
    }

    public function query($query) {
        return $this->connection->query($query);
    }

    public function escape($string) {
        return $this->connection->real_escape_string($string);
    }

    public function lastInsertId() {
        return $this->connection->insert_id;
    }

    public function close() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}
