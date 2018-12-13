<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "coursebuddy";

$link = mysqli_connect($host,$user,$password,$db);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student grade</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <?php include 'header.php' ?>


    <?php if (isset($_SESSION['email']) == true){

        if (isset($_GET['id'])){

            $sql = "select * from stdgrd where id='".$_GET['id']."'";
            $result = mysqli_query($link, $sql);

            $rowcount = mysqli_num_rows($result);

            if ($rowcount){

                foreach ($result as $grade){?>
                    <div class="fix login_main">
                        <div  class="fix loginform">
                            <form action="student_grade_edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                                <p style="font-size: 20px;">Grade Update in <font color="#16BBD2" style="font-family: NSimSun">Course</font><font color="#ffffff" style="font-family: NSimSun">Buddy</font></p><br>
                                Course:<br>
                                <input type="text" name="course" value="<?php echo $grade['course']; ?>"><br><br>
                                Previous grade:<br>
                                <input type="text" name="course" disabled="disabled" value="<?php echo $grade['grade']; ?>" style="color: #000000"><br><br>
                                New Grade:<br>
                                <select class="grade" name="grade" style="width: 200px; height: 25px;" required>
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
                                <a href="forPractice.php" style="color: #ffffff; font-size: 15px">back</a>

                            </form>
                        </div>
                    </div>
                    <?php



                }
            }

        }







        ?>




        <?php ?>

    <?php include 'footer.php'?>
</body>
</html>


<?php

if (isset($_POST['grade'])){

    $newGrade = (float)$_POST['grade'];
    $gradeId = 0;
    if (isset($_GET['id'])){

        $gradeId = (int)$_GET['id'];
    }

    $update_sql = "UPDATE stdgrd SET grade= '$newGrade' WHERE id='$gradeId' ";

    $updateresult = mysqli_query($link, $update_sql);

    if (!$updateresult) {

        echo 'not inserted';

    } else {

        echo '<script type="text/javascript"> alert("Grade updated Successfully"); window.location.href = "forPractice.php";</script>';



    }




}
}else{
    header("location: studentLogin.php");
}


?>
