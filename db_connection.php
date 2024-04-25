<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'login';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['new-username']) && isset($_POST['new-password']) && isset($_POST['new-email'])) {
        $newUsername = $_POST['new-username'];
        $newPassword = password_hash($_POST['new-password'], PASSWORD_DEFAULT);
        $newEmail = $_POST['new-email'];

        $stmt = mysqli_prepare($conn, "INSERT INTO signup (username, password, email) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $newUsername, $newPassword, $newEmail);

        if (mysqli_stmt_execute($stmt)) {
            echo "Sign-up successful!";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);
?>
