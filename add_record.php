<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service_name = $_POST['service_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO passwords (service_name, username, password) VALUES ('$service_name', '$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        header('Location: dashboard.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Rekord</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="add-record-container">
        <h2>Dodaj Nowy Rekord</h2>
        <form action="add_record.php" method="post">
            <label for="service_name">Nazwa:</label>
            <input type="text" id="service_name" name="service_name" required><br>
            <label for="username">Login:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Hasło:</label>
            <input type="text" id="password" name="password" required><br>
            <input type="submit" value="Dodaj">
        </form>
        <a class="button" href="dashboard.php">Powrót</a>
    </div>
</body>

</html>
