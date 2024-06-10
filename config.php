<?php

define('DB_HOST', 'localhost'); // Endereço do servidor do banco de dados
define('DB_USER', 'admin'); 
define('DB_PASS', 'pass'); 
define('DB_NAME', 'xhopii');


define('SITE_NAME', 'Xhopii'); 
function conectarBanco() {
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }
    return $conn;
}