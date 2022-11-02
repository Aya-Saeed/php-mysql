<?php

if (empty($username)) {
    array_push($errors, "user name is required");
}

if (empty($phone)) {
    array_push($errors, "phone req");
}


if (empty($email)) {
    array_push($errors, "email  is required");
}

if (empty($password)) {
    array_push($errors, "password is required");
}
