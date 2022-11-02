<?php
$conn = new mysqli("localhost", "root", "306306ay", "website");
if ($conn->connect_error) {
    die("connection failed") . $conn->connect_error;
}
$id = $_GET['id'];
var_dump($id);
$conn->query("delete from user where id=$id");
header("location:home.php");




$conn->close();
