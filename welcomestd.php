<?php
/**
 * Created by PhpStorm.
 * User: saif khan
 * Date: 4/14/2018
 * Time: 12:17 PM
 */

session_start();


$host = "localhost";
$user = "root";
$password = "";
$db = "coursebuddy";

$link = mysqli_connect($host,$user,$password,$db);

?>



<!DOCTYPE html>
<html>
<header>
    <title>Student</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</header>

<?php
include ('header.php');
?>

<body>
<?php
$email =  $_SESSION['email'];
$password = $_SESSION['password'];
if ($_SESSION['email'] == true){


    $sql = "select * from stdreg where email = '".$email."' AND password = '".$password."'";

    $result = mysqli_query($link,$sql);

    $rowcount = mysqli_num_rows($result);

    ?>
    <div class="fix std_menu">
        <ul>
            <li><a href="#">Profile</a></li>
            <li ><a href="student_grade.php">Turn In</a></li>
            <li><a href="forPractice.php">Grade History</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

<?php


    while($row = mysqli_fetch_array($result)) {
        echo "Name: " . $row['fname'] . " " . $row['lname'] . "<br>Institute: " . $row['institute'] . "<br> Department: ".$row['department'] . "<br> Email :" . $row['email'] . "<br>Birthday: " . $row['dob']."<br>  ";
    }
    }
else{
    header("location: studentLogin.php");
}



?>

</body>


</html>

