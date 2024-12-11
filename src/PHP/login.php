<?php
session_start();
require_once 'connection.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to fetch user
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['role'] = $user['role'];
            
            // Redirect to dashboard
            header('Location: user_dashboard.php');
            exit();
        } else {
            echo "<script>alert('Invalid credentials!');</script>";
        }
    } else {
        echo "<script>alert('User not found!');</script>";
    }
}
?>
