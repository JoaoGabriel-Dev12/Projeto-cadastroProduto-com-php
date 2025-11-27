<?php

if(isset($_POST['submit'])) {

    include_once('servidor.php');

    $id_cliente = $_POST['id_cliente'];
    $id_produto = $_POST['id_produto'];
    $quantidade = $_POST['quantidade'];

    if(empty($id_cliente) || empty($id_produto) || empty($quantidade)){
        die("Por favor, selecione cliente, produto e quantidade.");
    }

    $sql = "INSERT INTO compra(id_cliente, id_produto, quantidade) VALUES ('$id_cliente', '$id_produto', '$quantidade')";
    $result = mysqli_query($conn, $sql);

    $update = "UPDATE produto SET quantidade = quantidade - $quantidade WHERE idproduto = '$id_produto'";
    $resultUpdate = mysqli_query($conn, $update);

}