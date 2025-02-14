<?php

class Dog {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function add($name, $breed, $sound, $canHunt) {
        $sql = "INSERT INTO dogs (name, breed, sound, can_hunt) VALUES (:name, :breed, :sound, :can_hunt)";
        $params = [
            ':name' => $name,
            ':breed' => $breed,
            ':sound' => $sound,
            ':can_hunt' => $canHunt ? 1 : 0
        ];
        $this->db->query($sql, $params);
    }

    public function update($id, $name, $breed, $sound, $canHunt) {
        $sql = "UPDATE dogs SET name = :name, breed = :breed, sound = :sound, can_hunt = :can_hunt WHERE id = :id";
        $params = [
            ':id' => $id,
            ':name' => $name,
            ':breed' => $breed,
            ':sound' => $sound,
            ':can_hunt' => $canHunt ? 1 : 0
        ];
        $this->db->query($sql, $params);
    }

    public function delete($id) {
        $sql = "DELETE FROM dogs WHERE id = :id";
        $this->db->query($sql, [':id' => $id]);
    }

    public function getAll() {
        $sql = "SELECT * FROM dogs";
        return $this->db->fetchAll($sql);
    }

    public function getById($id) {
        $sql = "SELECT * FROM dogs WHERE id = :id";
        return $this->db->fetchOne($sql, [':id' => $id]);
    }
}