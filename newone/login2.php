<?php
session_start();
  include('db_connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $em = $_POST['email'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE email = '$em' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        header("Location: admin dashboard.html"); 
        exit();
    } else {
        $error = "Invalid username or password";
    }
}

$conn->close();
?>
