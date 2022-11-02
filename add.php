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
    include('server.php');
    if (isset($_POST['addbtn'])) {
        include('globalvar.php');
        include('emptyvalidate.php');
        include('constrains.php');
        $db = mysqli_query($conn, "select * from user where phone='$phone' or email='$email'");
        if (mysqli_num_rows($db) > 0) {
            array_push($errors, "phone or email exist ");
        } else {
            if (count($errors) == 0) {
                mysqli_query($conn, "insert into user set
                username='$username',email='$email',password='$password',phone='$phone'");
                header("location:home.php");
            }
        }
    };

    $conn->close();
    ?>
    <h2 class="header">Add user</h2>

    <form method="post">
        <?php include('errors.php') ?>

        <label for="un">User_Name</label>
        <input type="text" name="username" value="<?php echo $username ?>" class="input" id="us">

        <label for="e">Email</label>
        <input type="text" name="email" value="<?php echo $email ?>" class="input" id="e">

        <label for="ph">phone</label>
        <input type="text" name="phone" value="<?php echo $phone ?>" class="input" id="fn">

        <label for="p">Password</label>
        <input type="password" name="pass" value="<?php echo $password ?>" class="input" id="p">

        <button type="submit" class="btn" name="addbtn">Add user</button>


    </form>



</body>

</html>