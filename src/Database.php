<?php

class Database {
    private $pdo;

    public function __construct() {
        // Указываем путь к файлу базы данных SQLite
        $databaseFile = __DIR__ . '/../database/dogs.db';
        
        // Создаем подключение к SQLite
        $this->pdo = new PDO("sqlite:$databaseFile");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Создаем таблицу, если она не существует
        $this->initializeDatabase();
    }

    private function initializeDatabase() {
        $sql = "CREATE TABLE IF NOT EXISTS dogs (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            breed TEXT NOT NULL,
            sound TEXT NOT NULL,
            can_hunt INTEGER NOT NULL
        )";
        $this->pdo->exec($sql);
    }

    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function fetchAll($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchOne($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }
}