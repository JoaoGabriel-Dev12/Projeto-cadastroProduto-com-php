<?php

    // Salva um cliente

    if(isset($_POST['submit'])) {

        include_once('servidor.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $result = mysqli_query($conn, "INSERT INTO cliente(nome, email, telefone) VALUES ('$nome', '$email', '$telefone')");
        
        if($result) {
            echo "<script type='text/javascript'>
                alert('Cliente registrado com sucesso!');
                window.location.href='index.php';
              </script>";
        }
    }