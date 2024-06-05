<?php
$servername = "localhost";
$username = "username";
$password = "database_password";
$dbname = "your_database";

// Створення з'єднання з базою даних
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Підготовка SQL та зв'язування параметрів
$stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $hashed_password);
$stmt->execute();

echo "Реєстрація успішна!";
$stmt->close();
$conn->close();
?>