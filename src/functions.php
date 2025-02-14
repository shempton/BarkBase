<?php

require_once 'Database.php';
require_once 'Dog.php';

function init() {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $db = new Database();
    $dog = new Dog($db);

    return $dog;
}