<?php
$serverName = "tcp:menadzer.database.windows.net,1433";
$database = "password_manager";
$username = "kprawucki@edu.cdv.pl";
$password = "Placki888";

try {
    // Tworzenie połączenia za pomocą PDO
    $conn = new PDO("sqlsrv:server=$serverName;Database=$database", $username, $password);
    // Ustawienie trybu błędów PDO na wyjątki
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Błąd połączenia z bazą danych: " . $e->getMessage();
    die();
}
?>
