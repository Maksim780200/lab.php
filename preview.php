<?php
$json = file_get_contents("http://localhost:8083/lab8/json.php");
$data = json_decode($json, true);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Анкети</title>
    <style>
        table { border-collapse: collapse; width: 90%; margin: 20px auto; }
        th, td { border: 1px solid #555; padding: 8px; text-align: left; }
        th { background: #ddd; }
    </style>
</head>
<body>

<h2 style="text-align:center;">Анкети з ЛР6</h2>

<table>
    <tr>
        <th>Дата</th>
        <th>Ім’я</th>
        <th>Email</th>
        <th>ОС</th>
        <th>Рівень</th>
        <th>Технології</th>
    </tr>

    <?php foreach($data as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row["date"]) ?></td>
            <td><?= htmlspecialchars($row["name"]) ?></td>
            <td><?= htmlspecialchars($row["email"]) ?></td>
            <td><?= htmlspecialchars($row["os"]) ?></td>
            <td><?= htmlspecialchars($row["level"]) ?></td>
            <td><?= htmlspecialchars($row["technology"]) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>