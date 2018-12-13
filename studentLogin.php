<?php
/**
 * Created by PhpStorm.
 * User: saif khan
 * Date: 3/22/2018
 * Time: 2:09 PM
 */
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "coursebuddy";

$link = mysqli_connect($host,$user,$password,$db);



if (isset($_POST['email'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "select * from stdreg where email = '".$email."' AND password = '".$password."'";

    $result = mysqli_query($link,$sql);

    $rowcount = mysqli_num_rows($result);


    if ($email!='' and $password!='') {

        if ($rowcount == true) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header('location: welcomestd.php');

        } else {
            echo "<script>alert('you have entered incorrect email address or password')</script>";
        }
    }
    else{
        echo "<script>alert('please enter username and password')</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<header>
    <title>Student Sign In</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</header>
<body>
<?php include 'header.php' ?>

<div class="fix login_main">
    <div  class="fix loginform">
        <form action="studentLogin.php" method="POST">
            <p style="font-size: 20px;">Log In to <font color="#16BBD2" style="font-family: NSimSun">Course</font><font color="#ffffff" style="font-family: NSimSun">Buddy</font></p><br>
            Email:<br>
            <input type="email" name="email" value=""><br><br>
            Password:<br>
            <input type="Password" name="password" value=""><br><br>
            <input class="btn_login" type="submit" value="login"><br>
            <a href="" class="forgot_btn" style="text-decoration: none; color: #ffffff; font-size: 15px">forgot password?</a><br>
            <a href="studentSignUp.php" style="color: #ffffff; font-size: 15px">Sign Up For New Account</a>
        </form>
    </div>
</div>

<?php include 'footer.php' ?>

</body>
</html>
