<?php
$conn = new mysqli("localhost", "root", "306306ay", "website");

// $data = $conn->query("select * from user where id=2");
// $row = $data->fetch_assoc();
// // var_dump($row['fullname']);
// // json_encode($data)
// // echo json_encode(array("status" => "success"));
// echo json_encode(array(
//     "name" => $row['fullname'],
//     "fullname" => $row['username'],
//     "email" => $row['email'],
//     "password" => $row['password'],
//     "phone" => $row['phone']
// ));

if (isset($_GET['id'])) {
    $data2 = $conn->query("select * from user where id={$_GET['id']}");
    if ($data2->num_rows > 0) {
        $row2 = $data2->fetch_assoc();
        echo json_encode(array(
            "name" => $row2['fullname'],
            "fullname" => $row2['username'],
            "email" => $row2['email'],
            "password" => $row2['password'],
            "phone" => $row2['phone']
        ));
    }
};
