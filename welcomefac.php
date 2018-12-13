<?php
/**
 * Created by PhpStorm.
 * User: saif khan
 * Date: 4/14/2018
 * Time: 11:05 AM
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
    <title>Faculty Sign In</title>
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


    $sql = "select * from facreg where email = '".$email."' AND password = '".$password."'";

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

    while($row = mysqli_fetch_array($result)){
        echo "Name: ".$row['fname']." ".$row['lname']."<br>institute: ". $row['institute']."<br>Department: ".$row['department']."<br> Email: ".$row['email']."<br>Gender: ".$row['gender']."<br>Birthday: ".$row['dob'];
        echo "<br />";
    }

}
else{
    header("location: facultyLogIn.php");
}



?>
</body>

</html>



