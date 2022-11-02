<?php include('server.php');

?>
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


    if (isset($_COOKIE["hello"])) {
        echo "<h4 class='header'>" . $_COOKIE["hello"] . ' successful registeration please login ' . "</h4>";
    }

    ?>
    <form method="post">

        <?php include('errors.php') ?>
        <h2 class="header">login</h2>
        <label for="ph">phone</label>
        <input type="text" name="phone" value="<?php echo $phone ?>" class="input" id="fn">

        <label for="p">password</label>
        <input type="password" name="pass" value="<?php echo $password ?>" class="input" id="p">
        <button type="submit" class="btn" name="login">login</button>
        <p>Not Have Account?<a href="register.php">register</a></p>


    </form>
</body>

</html>