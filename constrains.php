<?php

$usernamev = general_validation($username);

if (!empty($username) && strlen($usernamev) < 3) {
    array_push($errors, "user name must be at least 3 char ");
}

if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "email invalid");
}


if (!empty($phone) && !preg_match("/^[0-9]{3}[0-9]{4}[0-9]{4}$/", $phone)) {
    array_push($errors, "phone  invalid");
}

if (!empty($password) && strlen($password) < 8) {
    array_push($errors, "password must be at least 8 digit ");
}

function general_validation($data)
{
    $data = htmlspecialchars(stripslashes(trim($data)));
    return $data;
}
