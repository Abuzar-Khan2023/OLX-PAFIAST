<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch and sanitize inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $gender = $_POST['gender'];
    $role = $_POST['role'];
    $stdFaculty = $_POST['stdFaculty'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Password Confirmation Check
    if ($password !== $confirmPassword) {
        die("Passwords do not match! <a href='signup.html'>Go back</a>");
    }

    // Hash the password securely
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert into the database
    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, gender, role, stdFaculty, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $email, $phone, $gender, $role, $stdFaculty, $hashedPassword);

    // Execute the query and check success
    if ($stmt->execute()) {
        echo "Registration successful! <a href='login.html'>Login here</a>";
    } else {
        if ($stmt->errno === 1062) { // Handle duplicate email
            echo "Error: Email already exists. <a href='signup.html'>Try again</a>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
