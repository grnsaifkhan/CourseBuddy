<?php

session_start();
require('connection.php');

?><?php


if (isset($_POST['course_name'])){

    $course_name = $_POST['course_name'];
    $department = $_POST['department'];
    $credit = $_POST['credit'];

    $sql = "INSERT INTO course_list(course_name,credit,department) VALUES('$course_name','$credit','$department')";




    if (!mysqli_query($con,$sql))
    {

        echo 'Not inserted.';

    }
    else{

        echo '<script>alert("Current Course Inserted Successfully")</script>' ;
    }


}


?>



<!DOCTYPE html>
<html>
<head>
    <title>Student</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body>
<?php include 'header.php' ?>


<?php
if ($_SESSION['email']==true) {

    ?>


    <div class="fix login_main">
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
        <div  class="fix loginform">
            <form action="insertCourse.php" method="POST">
                <p style="font-size: 20px;">Course List in <font color="#16BBD2" style="font-family: NSimSun">Course</font><font color="#ffffff" style="font-family: NSimSun">Buddy</font></p><br>
                Course:<br>
                <input type="text" name="course_name" value="" required><br><br>
                Credit:<br>
                <select class="credit" name="credit" style="width: 200px;height: 20px" required>
                    <option value="">credit</option>
                    <option value="3">3</option>
                    <option value="2.5">2.5</option>
                    <option value="2">2</option>
                    <option value="1.5">1.5</option>
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select><br><br>
                Department:<br>
                <select class="department" name="department" style="width: 200px;height: 20px;" required>
                    <option value="">Department</option>
                    <option value="eee">eee</option>
                    <option value="cse">cse</option>
                    <option value="mathematics">mathematics</option>
                    <option value="architecture">architecture</option>
                    <option value="bba">bba</option>
                    <option value="physics">physics</option>
                </select><br><br>
                <input class="btn_login" type="submit" value="submit"><br>
            </form>
        </div>
    </div>
<?php }  else {
    header("location: adminLogIn.php");
}?>


</body>
</html>