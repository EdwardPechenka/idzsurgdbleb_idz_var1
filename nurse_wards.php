<?php
include 'db.php';

$nurse_id = $_GET['nurse'];

$sql = "SELECT w.name AS ward_name
        FROM ward w
        JOIN nurse_ward nw ON w.id_ward = nw.fid_ward
        WHERE nw.fid_nurse = :nurse_id";

$stmt = $pdo->prepare($sql);
$stmt->execute(['nurse_id' => $nurse_id]);
$res = $stmt->fetchAll();

$nurse_stmt = $pdo->prepare("SELECT name FROM nurse WHERE id_nurse = :id");
$nurse_stmt->execute(['id' => $nurse_id]);
$nurse_name = $nurse_stmt->fetch()['name'];

echo "<h2>Палати, у яких чергує медсестра: " . htmlspecialchars($nurse_name) . "</h2>";

if (!$res) {
    echo "<p>Ця медсестра наразі не закріплена за жодною палатою.</p>";
} else {
    echo "<table border='1' cellpadding='5' cellspacing='0'>
            <tr>
                <th>Назва / Номер палати</th>
            </tr>";

    foreach ($res as $row) {
        echo "<tr>
                <td>{$row['ward_name']}</td>
              </tr>";
    }
    echo "</table>";
}
echo "<br><a href='index.php'>Повернутися назад</a>";
?>