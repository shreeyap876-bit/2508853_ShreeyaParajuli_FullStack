<?php

$feedbacks = [
    "firstname" => "",
    "lastname" => "",
    "email" => "",
    "password" => "",
    "confirmPassword" => "",
    "feedback" => ""
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $continue = true;

    $firstname = trim($_POST["firstname"] ?? "");
    $lastname  = trim($_POST["lastname"] ?? "");
    $email     = trim($_POST["email"] ?? "");
    $password  = $_POST["password"] ?? "";
    $confirmPassword = $_POST["confirmPassword"] ?? "";

    if (empty($firstname)) {
        $feedbacks["firstname"] = "Please enter first name";
        $continue = false;
    }

    if (empty($lastname)) {
        $feedbacks["lastname"] = "Please enter last name";
        $continue = false;
    }

    if (empty($email)) {
        $feedbacks["email"] = "Please enter your email";
        $continue = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $feedbacks["email"] = "Invalid email format";
        $continue = false;
    }

    if (empty($password)) {
        $feedbacks["password"] = "Please enter your password";
        $continue = false;
    } elseif (empty($confirmPassword)) {
        $feedbacks["confirmPassword"] = "Please confirm your password";
        $continue = false;
    } elseif ($password !== $confirmPassword) {
        $feedbacks["confirmPassword"] = "Passwords do not match";
        $continue = false;
    } else {
        if (!preg_match('/[\W]/', $_POST["password"])) {
                        $feedbacks["password"] = "Password must contain atleast one special character";
                        $continue = false;
                    }
                    if (!preg_match('/\d/', $_POST["password"])) {
                        $feedbacks["password"] = "Password must contain atleast one number";
                        $continue = false;
                    }
                    if (!preg_match('/[a-z]/', $_POST["password"])) {
                        $feedbacks["password"] = "Password must contain atleast one lowercase letter";
                        $continue = false;
                    }
                    if (!preg_match('/[A-Z]/', $_POST["password"])) {
                        $feedbacks["password"] = "Password must contain atleast one uppercase letter";
                        $continue = false;
                    }
    }

    // File handling
    if ($continue) {
        if (!file_exists("users.json")) {
            file_put_contents("users.json", json_encode([], JSON_PRETTY_PRINT));
        }

        $file = file_get_contents("users.json");
        if ($file === false) {
            $feedbacks["feedback"] = "Unable to read users file.";
            $continue = false;
        }
    }

    if ($continue) {
        $data = json_decode($file, true);
        if (!is_array($data)) {
            $feedbacks["feedback"] = "Invalid JSON format.";
            $continue = false;
        }
    }

    // Save user
    if ($continue) {
        $newUser = [
            "name" => $firstname . " " . $lastname,
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ];

        $data[] = $newUser;

        if (file_put_contents("users.json", json_encode($data, JSON_PRETTY_PRINT)) === false) {
            $feedbacks["feedback"] = "Unable to save user details.";
            $continue = false;
        }
    }

    if ($continue) {
        $feedbacks["feedback"] = "User registered successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        .success {
            color: green;
            margin-bottom: 10px;
        }
        button {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Register</h2>

    <?php if (!empty($feedbacks["feedback"])): ?>
        <div class="<?= $feedbacks["feedback"] === "User registered successfully!" ? "success" : "error" ?>">
            <?= $feedbacks["feedback"] ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="">

        <label>First Name</label>
        <input type="text" name="firstname" value="<?= htmlspecialchars($firstname ?? "") ?>">
        <div class="error"><?= $feedbacks["firstname"] ?></div>

        <label>Last Name</label>
        <input type="text" name="lastname" value="<?= htmlspecialchars($lastname ?? "") ?>">
        <div class="error"><?= $feedbacks["lastname"] ?></div>

        <label>Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($email ?? "") ?>">
        <div class="error"><?= $feedbacks["email"] ?></div>

        <label>Password</label>
        <input type="password" name="password">
        <div class="error"><?= $feedbacks["password"] ?></div>

        <label>Confirm Password</label>
        <input type="password" name="confirmPassword">
        <div class="error"><?= $feedbacks["confirmPassword"] ?></div>

        <button type="submit">Register</button>
    </form>
</div>

</body>
</html>