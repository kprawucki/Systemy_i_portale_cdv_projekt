<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);

    try {
        // Przygotowanie i wykonanie zapytania SQL do usunięcia rekordu
        $stmt = $conn->prepare("DELETE FROM passwords WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header('Location: dashboard.php');
            exit;
        } else {
            echo "Error: " . implode(" ", $stmt->errorInfo());
        }
    } catch (PDOException $e) {
        echo "Błąd: " . $e->getMessage();
    }
}
?>
