<?php
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $cnic = mysqli_real_escape_string($conn, $_POST['cnic']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match!";
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if CNIC or Email already exists
    $checkQuery = "SELECT * FROM admins WHERE cnic = '$cnic' OR email = '$email'";
    $result = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($result) > 0) {
        echo "Email or CNIC already exists!";
        exit();
    }

    // Insert new admin user into the database
    $sql = "INSERT INTO admins (name, email, phone, cnic, password) VALUES ('$name', '$email', '$phone', '$cnic', '$hashedPassword')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Signup successful! You can now <a href='/olx-pafiast/admin/HTML/login.html'>Login</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>