<?php

if(isset($_POST['submit'])) {

    include_once('servidor.php');

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $result = mysqli_query($conn, "INSERT INTO produto(nome, preco, quantidade) VALUES ('$nome', '$preco', '$quantidade')");

}