<?php
header("Content-Type: application/json");

$dir = __DIR__ . "/data"; 
$files = scandir($dir);
$result = [];

foreach ($files as $file) {
    if ($file === "." || $file === "..") continue;

    $content = file_get_contents($dir . "/" . $file);
    $lines = explode("\n", trim($content));

    // очікуємо:
    // 0: Дата: ...
    // 1: Ім’я: ...
    // 2: Email: ...
    // 3: Операційна система: ...
    // 4: Рівень користування: ...
    // 5: Технології: ...

    $entry = [
        "date" => trim(str_replace("Дата:", "", $lines[0] ?? "")),
        "name" => trim(str_replace("Ім’я:", "", $lines[1] ?? "")),
        "email" => trim(str_replace("Email:", "", $lines[2] ?? "")),
        "os" => trim(str_replace("Операційна система:", "", $lines[3] ?? "")),
        "level" => trim(str_replace("Рівень користування:", "", $lines[4] ?? "")),
        "technology" => trim(str_replace("Технології:", "", $lines[5] ?? ""))
    ];

    $result[] = $entry;
}

echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);