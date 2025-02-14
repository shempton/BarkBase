<?php
require_once '../src/Database.php';
require_once '../src/Dog.php';

$db = new Database();
$dog = new Dog($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $dog->add($_POST['name'], $_POST['breed'], $_POST['sound'], isset($_POST['can_hunt']));
    } elseif (isset($_POST['update'])) {
        $dog->update($_POST['id'], $_POST['name'], $_POST['breed'], $_POST['sound'], isset($_POST['can_hunt']));
    } elseif (isset($_POST['delete'])) {
        $dog->delete($_POST['id']);
    }
}

$dogs = $dog->getAll();
include '../templates/header.php';
include '../templates/dogs.php';
include '../templates/footer.php';