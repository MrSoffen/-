<?php
$servername = "localhost";
$username = "username";
$password = "database_password";
$dbname = "your_database";

// Створення з'єднання
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

// Вибірка з бази даних
$stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    // Перевірка пароля
    if (password_verify($password, $hashed_password)) {
        echo "Авторизація успішна!";
    } else {
        echo "Неправильний пароль.";
    }
} else {
    echo "Користувача з таким email не знайдено.";
}

$stmt->close();
$conn->close();
?>
