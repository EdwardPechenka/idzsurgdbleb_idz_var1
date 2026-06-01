<?php
include 'db.php';

$shift = $_GET['shift'];

$sql = "SELECT n.name AS nurse_name, n.department, n.date, w.name AS ward_name
        FROM nurse n
        JOIN nurse_ward nw ON n.id_nurse = nw.fid_nurse
        JOIN ward w ON nw.fid_ward = w.id_ward
        WHERE n.shift = :shift
        ORDER BY n.date ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute(['shift' => $shift]);
$res = $stmt->fetchAll();

echo "<h2>Чергування у зміну: " . htmlspecialchars($shift) . "</h2>";

if (!$res) {
    echo "<p>Жодних чергувань на цю зміну не знайдено.</p>";
} else {
    echo "<table border='1' cellpadding='5' cellspacing='0'>
            <tr>
                <th>Медсестра</th>
                <th>Відділення</th>
                <th>Дата</th>
                <th>Палата</th>
            </tr>";

    foreach ($res as $row) {
        echo "<tr>
                <td>{$row['nurse_name']}</td>
                <td>{$row['department']}</td>
                <td>{$row['date']}</td>
                <td>{$row['ward_name']}</td>
              </tr>";
    }
    echo "</table>";
}
echo "<br><a href='index.php'>Повернутися назад</a>";
?>