<?php
require "header.php";

if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}
$theme = $_COOKIE["theme"] ?? "light";
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
    font-family:Arial;
    background:<?= $theme==="dark"
        ? "linear-gradient(135deg,#2b193d,#3f2b63)"
        : "linear-gradient(135deg,#ffd1dc,#ffe4ec)" ?>;
    color:#5a3d5c;
}
.card{
    width:400px;
    padding:35px;
    border-radius:20px;
    background:rgba(255,255,255,0.35);
    backdrop-filter:blur(15px);
    box-shadow:0 25px 45px rgba(255,182,193,.45);
    border:1px solid rgba(255,255,255,.4);
    text-align:center;
}
a{
    display:block;
    margin-top:15px;
    color:#5a3d5c;
    text-decoration:none;
    font-weight:bold;
}
</style>
</head>
<body>

<div class="card">
<h2>Welcome, <?= $_SESSION["student_name"] ?> 🌸</h2>
<a href="preference.php">Change Theme</a>
<a href="logout.php">Logout</a>
</div>

</body>
</html>
