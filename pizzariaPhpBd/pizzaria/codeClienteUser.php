<?php
session_start();
include 'config.php'; // Ensure this file includes your database connection.

if (isset($_POST['adicionarUser'])) {
    // Retrieve form data
    $nome = $_POST['nome'];
    $morada = $_POST['morada'];
    $nif = $_POST['nif'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insert new user into the database
    $query = "INSERT INTO clientes (nome, morada, nif, telefone, email, pass)
              VALUES ('$nome', '$morada', '$nif', '$telefone', '$email', '$password')";

    $user_query_run = mysqli_query($con, $query);

    if ($user_query_run) {
        $_SESSION['status'] = "Utilizador adicionado com sucesso";
        header("Location: principal.html");
        exit;
    } else {
        $_SESSION['status'] = "Falha ao inserir Utilizador";
        header("Location: registar.html");
        exit;
    }
}


?>
