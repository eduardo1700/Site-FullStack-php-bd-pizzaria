<?php
// Start a session
session_start();

// Include your database connection code
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform user authentication (replace this with your authentication logic)
    // For example, you can query your database to check if the user exists and the password is correct
    $query = "SELECT id FROM clientes WHERE email = ? AND pass = ?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
            // Authentication successful
            mysqli_stmt_bind_result($stmt, $user_id);
            mysqli_stmt_fetch($stmt);

            // Store user ID in the session
            $_SESSION['user_id'] = $user_id;

            // Redirect to the principal page after successful login
            header("Location: principal.html");
            exit();
        } else {
            // Authentication failed
            $error_message = "Invalid email or password. Please try again.";
        }

        mysqli_stmt_close($stmt);
    }

    // Close the database connection
    mysqli_close($con);
}

// If authentication failed, you can display the error message and optionally include the login form.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (your HTML head content) ... -->
</head>
<body>
    <!-- Display the error message if authentication failed -->
    <?php if (isset($error_message)) { ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php } ?>

    <!-- Your existing login form -->
    <form action="login.php" method="post">
        <!-- ... (your form fields) ... -->
    </form>
</body>
</html>
