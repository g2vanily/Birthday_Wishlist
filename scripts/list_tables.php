<?php
$pdo = new PDO('sqlite:database/database.sqlite');
$res = $pdo->query("SELECT name FROM sqlite_master WHERE type='table'");
foreach ($res as $row) {
    echo $row['name'] . PHP_EOL;
}
