<?php
// PHP - MAILER
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require('vendor\autoload.php');
// if (isset($_POST['reg'])) {
//     $username = $_POST['username'];

//     $email = $_POST['email'];

//     $password = $_POST['pass'];
//     $verify_token = md5(rand());

//     $phone = $_POST['phone'];
//     $mail = new PHPMailer(true);
//     try {

//         $mail->SMTPDebug = 0;
//         $mail->isSMTP();
//         $mail->Host = 'smtp.gmail.com';
//         $mail->SMTPAuth = true;
//         $mail->Username = 'ayariad12@gmail.com';
//         $mail->password = '306306AYA';
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//         $mail->Port = 587;
//         $mail->setFrom('ayariad12@gmail.com', 'php-auth.com');
//         $mail->addAddress($email, $username);
//         $mail->isHTML(true);
//         $verification_code = substr(number_format(
//             time() * rand(),
//             0,
//             '',
//             ''
//         ), 0, 6);
//         $mail->Subject = 'Email Verifiation';
//         $mail->Body = '<p> your verification code is :<b style="font-size:30px;">'
//             . $verification_code . '</b></p>';
//         $mail->send();
//         $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
//         $conn = mysqli_connect("localhost", "root", "306306ay", "website");
//         $sql = "insert into user
//             (username,email,password,phone,verify_token,verification_code,email_verified_at) 
//             values('$username','$email','$encrypted_password','$phone','$verify_token','$verification_code','null')";
//         mysqli_query($conn, $sql);
//         header("location:email-verification.php?email=" . $email);
//         exit();
//     } catch (Exception $e) {
//         echo "message could not be sent mailer error:{$mail->ErrorInfo}";
//     }
// }





$username = "";
$password = "";
$email = "";
$phone = "";
$errorsArray = array();
$repassword = "";
$errors = array();
$conn = mysqli_connect("localhost", "root", "306306ay", "website");

function sendemail_verify($name, $email, $verify_token)
{
}


if (isset($_POST['reg'])) {

    include('globalvar.php');
    $repassword = mysqli_real_escape_string($conn, $_POST['repass']);
    $db = mysqli_query($conn, "select * from user where phone='$phone' or email='$email'");
    include('emptyvalidate.php');
    if ($password != $repassword) {
        array_push($errors, "password not match");
    }
    include('constrains.php');
    if ($db) {
        if (mysqli_num_rows($db) > 0) {
            array_push($errors, "phone exist or email");
        } else {
            if (count($errors) == 0) {

                // var_dump($passwordhash);
                mysqli_query($conn, "insert into user
                (username,email,password,phone,verify_token) 
                values('$username','$email','$password','$phone','$verify_token')");
                sendemail_verify("$username", "$email", "$verify_token");


                setcookie("hello", $username, time() + 2 * 24 * 60 * 60);

                header('location:login.php');
            }
        }
    }
}
// ///login
if (isset($_POST['login'])) {

    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    if (empty($phone)) {
        array_push($errors, "phone is required");
    }
    if (empty($password)) {
        array_push($errors, "password is required");
    }

    if (empty($phone)) {
        array_push($errors, "phone req");
    }

    if (count($errors) == 0) {
        $data = mysqli_query($conn, "select * from user where phone='$phone' AND password ='$password'");
        if (mysqli_num_rows($data) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "login successfull";

            header('location:home.php');
        } else {
            array_push($errors, "error in phone or password");
        }
    }
}
