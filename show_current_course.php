<?php
/**
 * Created by PhpStorm.
 * User: saif khan
 * Date: 4/14/2018
 * Time: 9:57 PM
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
<head>
    <title>Student</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #16BBD2;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #1B1B1B;
        }
    </style>
</head>


<?php
include ('header.php');
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

if (isset($_SESSION['email']) == true) {
    $email = $_SESSION['email'];

    $sql = "select * from current_course_list";

    $result = mysqli_query($link, $sql);

    $rowcount = mysqli_num_rows($result);

    ?>

    <table class="table table-striped">
        <tr>
            <th width="4%">Serial</th>
            <th width="24%">Course</th>
            <th width="24%">Faculty Email</th>
            <th width="24%">Faculty Initial</th>
            <th width="24%">Action</th>
        </tr>

        <?php
        if ($result) {

            $i = 0;
            foreach ($result as $sdata) {
                $i++;

                ?>

                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $sdata['coursename']?></td>
                    <td><?php echo $sdata['faculty_email']?></td>
                    <td><?php echo $sdata['faculty_initial']?></td>
                    <td>
                        <a class="btn btn-primary" style="text-decoration: none; color: #16BBD2" href="#?id=<?php echo $sdata['id'];?>">Edit</a>&nbsp&nbsp|&nbsp&nbsp
                        <a class="btn btn-primary" style="text-decoration: none; color: #16BBD2" href="#?id=<?php echo $sdata['id'];?>">Delete</a>
                    </td>
                </tr>

            <?php } }else{?>

            <tr><td colspan="5"><h2>No user data found</h2></td></tr>
        <?php } ?>
    </table>
    <?php


}else{
    header("location: adminLogIn.php");
}

?>


</html>
