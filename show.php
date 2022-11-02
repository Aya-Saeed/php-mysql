<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $conn = new mysqli("localhost", "root", "306306ay", "website");
    if ($conn->connect_error) {
        die("connection failed") . $conn->connect_error;
    }
    if (isset($_GET['id'])) {
        $data = $conn->query("select * from user where id={$_GET['id']}");
        if ($data->num_rows > 0) {
            $row = $data->fetch_assoc();
        }
    }

    // var_dump($row);

    ?>

    <table border='1'>
        <tr>

            <th>user name</th>
            <th>email</th>
            <th>password</th>
            <th>phone</th>

        </tr>


        <tr>

            <td> <?= $row['username'] ?></td>
            <td><?= $row['email'] ?></td>
            <td> <?= $row['password'] ?></td>
            <td><?= $row['phone'] ?> </td>



    </table>

</body>

</html>