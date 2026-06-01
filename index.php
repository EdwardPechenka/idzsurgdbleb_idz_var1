<?php 
include 'db.php'; 
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Контроль чергувань медсестер (SQLite)</title>
</head>
<body>
    <h1>Панель моніторингу чергувань поліклініки (СУБД SQLite)</h1>
    
    <form action="nurse_wards.php" method="GET">
        <label for="nurse">Оберіть медсестру:</label>
        <select name="nurse" id="nurse">
            <?php
            $stmt = $pdo->query('SELECT id_nurse, name FROM nurse');
            while ($row = $stmt->fetch()) { 
                echo "<option value=\"{$row['id_nurse']}\">{$row['name']}</option>";
            }
            ?>
        </select>
        <button type="submit">Перелік палат</button>
    </form>
    <br>

    <form action="department_nurses.php" method="GET">
        <label for="department">Оберіть номер відділення:</label>
        <select name="department" id="department">
            <?php
            $stmt = $pdo->query('SELECT DISTINCT department FROM nurse ORDER BY department ASC');
            while ($row = $stmt->fetch()) { 
                echo "<option value=\"{$row['department']}\">Відділення №{$row['department']}</option>";
            }
            ?>
        </select>
        <button type="submit">Медсестри відділення</button>
    </form>
    <br>

    <form action="shift_duties.php" method="GET">
        <label for="shift">Оберіть зміну:</label>
        <select name="shift" id="shift">
            <option value="First">First</option>
            <option value="Second">Second</option>
            <option value="Third">Third</option>
        </select>
        <button type="submit">Чергування у зміну</button>
    </form>
</body>
</html>