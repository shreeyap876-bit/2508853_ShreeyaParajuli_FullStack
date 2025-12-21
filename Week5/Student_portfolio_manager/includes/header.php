<!DOCTYPE html>
<html>
<head>
    <title>Student Portfolio Manager</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff0f6;
        }
        header {
            background: #ff69b4;
            color: white;
            padding: 20px;
            text-align: center;
        }
        nav {
            background: #ffb6c1;
            padding: 10px;
            text-align: center;
        }
        nav a {
            margin: 10px;
            text-decoration: none;
            color: #800040;
            font-weight: bold;
        }
        .container {
            background: white;
            width: 70%;
            margin: 30px auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ffc0cb;
        }
        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
        button {
            background: #ff69b4;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background: #ff1493;
        }
        footer {
            background: #ff69b4;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>

<header>
    <h1>Student Portfolio Manager</h1>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="add_student.php">Add Student</a>
    <a href="upload.php">Upload Portfolio</a>
    <a href="students.php">View Students</a>
</nav>
