<?php

function formatName($name) {
    return ucwords(strtolower(trim($name)));
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function cleanSkills($string) {
    return array_map('trim', explode(',', $string));
}

function saveStudent($name, $email, $skillsArray) {
    $data = "$name | $email | " . implode(', ', $skillsArray) . PHP_EOL;
    file_put_contents("students.txt", $data, FILE_APPEND);
}

function uploadPortfolioFile($file) {
    $allowed = ['application/pdf', 'image/jpeg', 'image/png'];

    if (!in_array($file['type'], $allowed)) {
        throw new Exception("Invalid file type.");
    }

    if ($file['size'] > 2 * 1024 * 1024) {
        throw new Exception("File too large (Max 2MB).");
    }

    $newName = time() . "_" . basename($file['name']);
    move_uploaded_file($file['tmp_name'], "uploads/" . $newName);

    return $newName;
}