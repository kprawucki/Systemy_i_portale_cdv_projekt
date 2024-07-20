<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:menadzer.database.windows.net,1433; Database = password_manager", "kprawucki@edu.cdv.pl", "{your_password_here}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "kprawucki@edu.cdv.pl@menadzer", "pwd" => "{your_password_here}", "Database" => "password_manager", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:menadzer.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>
