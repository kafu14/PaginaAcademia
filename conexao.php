<?php

const DB_HOST = 'localhost';
const DB_PORT = '3307';
const DB_NAME = 'formulariosite';
const DB_USER = 'root';
const DB_PASS = '';

try {

    $pdo = new PDO(
        "mysql:host=" . DB_HOST .
        ";port=" . DB_PORT .
        ";dbname=" . DB_NAME .
        ";charset=utf8",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

} catch (PDOException $e) {

    die("Erro ao conectar ao banco de dados: " . $e->getMessage());

}

?>