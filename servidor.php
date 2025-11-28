<?php

// Conexão com o banco de dados

$host = "localhost";
$user = "root";
$password = "1234";
$db = "dbloja";

$conn = new mysqli($host, $user, $password, $db);
//if($conn->connect_error) {
//    die("Falha na conexão: " . $conn->connect_error);
//}

//echo "Conexão sucedida!";