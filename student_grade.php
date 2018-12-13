<?php

session_start();
require('connection.php');

?><?php


if (isset($_POST['course'])){

        $course = $_POST['course'];
        $grade = $_POST['grade'];
        $credit = $_POST['credit'];
        $email = $_SESSION['email'];
        $sql = "INSERT INTO stdgrd(course,grade,credit,email) VALUES('$course','$grade','$credit','$email')";




            if (!mysqli_query($con,$sql))
            {

                echo 'Not inserted.';

            }
            else{

                echo '<script>alert("Data inserted Successfully")</script>' ;
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
    <div class="fix std_menu" style="">
        <ul>

            <li><a href="welcomestd.php">Profile</a></li>
            <li ><a href="student_grade.php">Turn In</a></li>
            <li><a href="forPractice.php">Grade History</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div  class="fix loginform">
        <form action="student_grade.php" method="POST">
            <p style="font-size: 20px;">Grade Analysis in <font color="#16BBD2" style="font-family: NSimSun">Course</font><font color="#ffffff" style="font-family: NSimSun">Buddy</font></p><br>
            Course:<br>
            <input type="text" name="course" value="" required><br>
            Credit:<br>
            <select class="grade" name="credit" style="width: 200px;" required>
                <option value="">credit</option>
                <option value="3">3</option>
                <option value="2.5">2.5</option>
                <option value="2">2</option>
                <option value="1.5">1.5</option>
                <option value="1">1</option>
                <option value="0">0</option>
            </select><br>
            Grade:<br>
            <select class="grade" name="grade" style="width: 200px;" required>
                <option value="">grade</option>
                <option value="4">A</option>
                <option value="3.7">A-</option>
                <option value="3.3">B+</option>
                <option value="3">B</option>
                <option value="2.7">B-</option>
                <option value="2.3">C+</option>
                <option value="2">C</option>
                <option value="1.7">C-</option>
                <option value="1.3">D+</option>
                <option value="1">D</option>
                <option value="0">F</option>
            </select><br><br>
            <input class="btn_login" type="submit" value="submit"><br>
        </form>
    </div>
</div>
<?php }  else {
        header("location: studentLogin.php");
    }?>

<?php include 'footer.php' ?>

</body>
</html>