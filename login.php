<?php
require_once "DBconnect.php";
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'car_showroom';

$conn = mysqli_connect($host, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["new-username"];
    $password = $_POST["new-password"];

    // You should hash the password before storing and comparing in a real scenario
    $query = "SELECT user_id FROM user WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $user = $stmt->get_result();

    if ($user) {
        // Successful login
        // Redirect to dashboard or home page
        header("Location: home.html");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>


