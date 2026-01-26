<?php
$host = "localhost";
$dbname = "np03cs4a240099";
$user = "np03cs4a240099";
$pass = "65oAQTp6Jl";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $pass
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed");
}


























































