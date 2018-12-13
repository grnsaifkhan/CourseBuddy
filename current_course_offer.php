<?php

session_start();
require('connection.php');

?><?php


if (isset($_POST['coursename'])){

    $coursename = $_POST['coursename'];
    $faculty_email = $_POST['faculty_email'];
    $faculty_initial = $_POST['faculty_initial'];

    $sql = "INSERT INTO current_course_list(coursename,faculty_email,faculty_initial) VALUES('$coursename','$faculty_email','$faculty_initial')";




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
            <form action="current_course_offer.php" method="POST">
                <p style="font-size: 20px;">Current Course List In <font color="#16BBD2" style="font-family: NSimSun">Course</font><font color="#ffffff" style="font-family: NSimSun">Buddy</font></p><br>
                Course:<br>
                <select class="coursename" name="coursename" style="width: 200px; height: 20px;" required>
                    <option value="">Course</option>
                    <?php
                    $sql = "select * from course_list";
                    $result = mysqli_query($con, $sql);

                    foreach ($result as $course){?>
                        <option value="<?php echo $course['course_name']?>"><?php echo $course['course_name']?></option>
                        <?php
                    }
                    ?>

                </select><br><br>
                Faculty email:<br>


                <select class="faculty_email" name="faculty_email" style="width: 200px; height: 20px;" required>
                    <option value="">Faculty email</option>
                    <?php
                    $sql = "select * from facreg";
                    $result = mysqli_query($con, $sql);

                        foreach ($result as $faculty){?>
                            <option value="<?php echo $faculty['email']?>"><?php echo $faculty['email']?></option>
                            <?php
                        }
                    ?>

                </select><br><br>
                Faculty Initial:<br>
                <select class="faculty_initial" name="faculty_initial" style="width: 200px; height: 20px;" required>
                    <option value="">Faculty initial</option>
                    <?php
                        $sql = "select * from facreg";
                        $result = mysqli_query($con, $sql);
                        foreach ($result as $initial){?>
                                <option value="<?php echo $initial['username']?>"><?php echo $initial['username']?></option>
                            <?php

                        }
                    ?>

                </select><br><br><br>
                <input class="btn_login" type="submit" value="submit"><br>
            </form>
        </div>
    </div>
<?php }  else {
    header("location: adminLogIn.php");
}?>


</body>
</html>