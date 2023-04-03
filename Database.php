<?php

class Database {
    private $pdo;

    public function __construct($host, $dbname, $username, $password) {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $this->pdo = new PDO($dsn, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function prepare($sql) {
        return $this->pdo->prepare($sql);
    }

    public function query($sql) {
        return $this->pdo->query($sql);
    }
}
?>
