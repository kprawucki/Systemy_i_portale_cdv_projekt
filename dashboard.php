<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}

include 'db.php';

$sql = "SELECT * FROM passwords";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Zarządzania Hasłami</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="dashboard-container">
        <h2>Panel Zarządzania Hasłami</h2>
        <table>
            <tr>
                <th>Nazwa</th>
                <th>Login</th>
                <th>Hasło</th>
                <th>Usuń</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['service_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['password']); ?></td>
                    <td>
                        <form action="delete_record.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" value="Usuń" class="delete-button">
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
        <a class="button" href="add_record.php">Dodaj rekord</a>
        <a class="button" href="logout.php">Wyloguj</a>
    </div>
</body>

</html>