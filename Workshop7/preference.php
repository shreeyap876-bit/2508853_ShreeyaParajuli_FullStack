<?php
require "header.php";

if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    setcookie("theme", $_POST["theme"], time()+86400*30);
    header("Location: dashboard.php");
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
    background:linear-gradient(135deg,#ffd1dc,#ffe4ec);
    font-family:Arial;
}
.card{
    width:360px;
    padding:30px;
    border-radius:20px;
    background:rgba(255,255,255,0.35);
    backdrop-filter:blur(15px);
    box-shadow:0 25px 45px rgba(255,182,193,.45);
    border:1px solid rgba(255,255,255,.4);
    color:#5a3d5c;
}
select,button{
    width:100%;
    padding:12px;
    border-radius:12px;
    border:none;
    margin-top:15px;
}
button{
    background:linear-gradient(135deg,#b5eaff,#89cff0);
    color:#034078;
    font-weight:bold;
}
</style>
</head>
<body>

<div class="card">
<h2 align="center">Select Theme</h2>
<form method="post">
    <select name="theme">
        <option value="light">Light Mode</option>
        <option value="dark">Dark Mode</option>
    </select>
    <button>Save</button>
</form>
</div>
</body>
</html>
