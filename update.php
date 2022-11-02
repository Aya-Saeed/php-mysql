<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <?php
    $username = "";
    $password = "";
    $email = "";
    $phone = "";
    $verify_token = md5(rand());
    $repassword = "";
    $errors = array();
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
    if (isset($_POST['updatebtn'])) {

        include('globalvar.php');
        include('emptyvalidate.php');
        include('constrains.php');

        $db = $conn->query("select * from user where phone='$phone' or email='$email'");
        if ($db->num_rows > 0) {
            array_push($errors, "phone  or email already exist");
        } else {
            if (count($errors) == 0) {

                $conn->query("update user set 
        username='$username',
        email='$email',
        password='$password',
        phone='$phone' 
        where id={$_POST['stdid']}");
                header("location:home.php");
            }
        }
    }
    ?>
    <form method="post">
        <?php include('errors.php') ?>
        <h2 class="header">updates user</h2>
        <input type="number" name="stdid" hidden value="<?= $row['id'] ?>">

        <label for="un">User_Name</label>
        <input type="text" name="username" value="<?= $row['username'] ?>" class="input" id="us">

        <label for="e">Email</label>
        <input type="text" name="email" value="<?= $row['email'] ?>" class="input" id="e">

        <label for="ph">phone</label>
        <input type="text" name="phone" value="<?= $row['phone'] ?>" class="input" id="fn">


        <label for="p">Password</label>
        <input type="password" name="pass" value="<?= $row['password'] ?>" class="input" id="p">

        <br><input type="submit" name="updatebtn" value="update" class="btn">
    </form>
</body>

</html>