<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Debugowanie: wyświetl dane wejściowe
    echo "Podany login: " . htmlspecialchars($username) . "<br>";
    echo "Podane hasło: " . htmlspecialchars($password) . "<br>";

    $sql = "SELECT * FROM users WHERE username=:username AND password=:password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    // Fetch a single row to check if user exists
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Debugowanie: wyświetl dane użytkownika
    if ($user) {
        echo "Znaleziony użytkownik: " . htmlspecialchars(print_r($user, true)) . "<br>";
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "Błędne dane<br>";

        // Nowa część kodu: Pobieranie i wyświetlanie wszystkich danych z tabeli users
        $sql = "SELECT * FROM users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<h2>Zawartość tabeli 'users':</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Username</th><th>Password</th></tr>";
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($user['id']) . "</td>";
            echo "<td>" . htmlspecialchars($user['username']) . "</td>";
            echo "<td>" . htmlspecialchars($user['password']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>
