<?php
include 'db.php';

$department = $_GET['department'];

$sql = "SELECT name, date, shift 
        FROM nurse 
        WHERE department = :department";

$stmt = $pdo->prepare($sql);
$stmt->execute(['department' => $department]);
$res = $stmt->fetchAll();

echo "<h2>Медсестри відділення №" . htmlspecialchars($department) . "</h2>";

if (!$res) {
    echo "<p>У цьому відділенні немає зареєстрованих медсестер.</p>";
} else {
    echo "<table border='1' cellpadding='5' cellspacing='0'>
            <tr>
                <th>ПІБ медсестри</th>
                <th>Дата чергування</th>
                <th>Робоча зміна</th>
            </tr>";

    foreach ($res as $row) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['date']}</td>
                <td>{$row['shift']}</td>
              </tr>";
    }
    echo "</table>";
}
echo "<br><a href='index.php'>Повернутися назад</a>";
?>