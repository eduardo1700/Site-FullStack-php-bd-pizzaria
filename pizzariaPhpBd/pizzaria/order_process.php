<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include your database connection code
    include('config.php');

    // Retrieve user ID from the session
    $user_id = $_SESSION['user_id'];

    // Get product ID from the form submission
    $product_id = $_POST['product_id'];

    // Get the name and address of the customer based on their ID
    $query = "SELECT nome, morada FROM clientes WHERE id = ?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $nome_cliente, $morada_cliente);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }

    // Get the name of the product based on its ID
    $query = "SELECT nome FROM produtos WHERE id = ?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $product_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $nome_produto);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }

    // Insert the order into the encomenda table with customer name, address, and product name
    $query = "INSERT INTO encomenda (id_cliente, id_produto, nome_cliente, nome_produto, local) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "iisss", $user_id, $product_id, $nome_cliente, $nome_produto, $morada_cliente);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    // Close the database connection
    mysqli_close($con);

    // Redirect back to the menu page or another appropriate page
    header("Location: encomendar.php");
    exit();
} else {
    // Handle invalid requests, e.g., direct access to this PHP file
    header("Location: encomendar.php");
    exit();
}

?>
