<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>registertion form</title>
</head>

<body>
    <h2 class="header">Register</h2>
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

        <label for="rp">Re_Password</label>
        <input type="password" name="repass" value="" class="input" id="rp">

        <button type="submit" class="btn" name="reg">register</button>

        <p>Have Account?<a href="login.php">Login</a></p>
    </form>
</body>

</html>