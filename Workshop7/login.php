<?php
require "db.php";
require "header.php";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("SELECT * FROM students WHERE student_id = :sid");
    $stmt->execute([":sid" => $_POST["student_id"]]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($student && password_verify($_POST["password"], $student["password_hash"])) {
        $_SESSION["logged_in"] = true;
        $_SESSION["student_name"] = $student["full_name"];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid credentials!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#ffe0e9,#ffd6e8);
    font-family:Arial;
}
.card{
    width:380px;
    padding:35px;
    border-radius:20px;
    background:rgba(255,255,255,0.35);
    backdrop-filter:blur(15px);
    box-shadow:0 25px 45px rgba(255,182,193,.45);
    border:1px solid rgba(255,255,255,.4);
    color:#5a3d5c;
}
input{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border-radius:12px;
    border:none;
}
button{
    width:100%;
    padding:14px;
    border-radius:14px;
    border:none;
    background:linear-gradient(135deg,#b5eaff,#89cff0);
    color:#034078;
    font-weight:bold;
}
.error{text-align:center;color:#c0392b;}
a{color:#5a3d5c;text-decoration:none;}
</style>
</head>
<body>

<div class="card">
<h2 align="center">Login</h2>

<form method="post">
    <input name="student_id" placeholder="Student ID">
    <input type="password" name="password" placeholder="Password">
    <button>Login</button>
</form>

<p class="error"><?= $error ?></p>
<p align="center"><a href="register.php">Create Account</a></p>
</div>
</body>
</html>
