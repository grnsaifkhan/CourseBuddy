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


    $sql = "select * from adminlogin where email = '".$email."' AND password = '".$password."'";

    $result = mysqli_query($link,$sql);

    $rowcount = mysqli_num_rows($result);

    ?>
    <div class="fix admin_menu">
        <ul>
            <li><a href="welcomeadmin.php">Profile</a></li>
            <li><a href="facultyListForAdmin.php">Faculty List</a></li>
            <li ><a href="show_current_course.php">Current Course List</a></li>
            <li ><a href="current_course_offer.php">Insert Current Course</a></li>
            <li ><a href="insertCourse.php">Turn In Course</a></li>
            <li><a href="show_course_list.php">Course List</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <?php

    while($row = mysqli_fetch_array($result)){
        echo  "Email: ".$row['email'];
        echo "<br />";
    }

}
else{
    header("location: adminLogIn.php");
}



?>
</body>

</html>



