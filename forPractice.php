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

<div class="fix std_menu">
    <ul>

        <li><a href="welcomestd.php">Profile</a></li>
        <li ><a href="student_grade.php">Turn In</a></li>
        <li><a href="forPractice.php">Grade History</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>
<?php

if (isset($_SESSION['email']) == true) {
    $email = $_SESSION['email'];

    $sql = "select * from stdgrd where email = '" . $email . "'";

    $result = mysqli_query($link, $sql);

    $rowcount = mysqli_num_rows($result);

    ?>
    <?php
    $cgpa = 0;
    if ($result) {
        $totalGpa=0;
        $totalCredit=0;
        foreach ($result as $gpa) {
            $totalGpa += $gpa['grade']*$gpa['credit'];
            $totalCredit+=$gpa['credit'];
            $cgpa = round($totalGpa/$totalCredit,2);

        }
    }
    if ($cgpa<2.00) {
        echo 'CGPA: <span style="color: red">' . $cgpa . '</span>';
    }elseif ($cgpa>=2 && $cgpa<3){
        echo 'CGPA: <span style="color: #DE5A24">' . $cgpa . '</span>';
    }
    else{
        echo 'CGPA: <span style="color: #5bb75b">' . $cgpa . '</span>';
    }
    ?>

    <table class="table table-striped">
        <tr>
            <th width="4%">Serial</th>
            <th width="24%">Course</th>
            <th width="24%">Grade Point</th>
            <th width="24%">Credit</th>
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
                <td><?php echo $sdata['course']?></td>
                <td><?php
                        if ($sdata['grade']<2.00) {
                            echo '<span style="color: red;">' . $sdata['grade'] . '</span>';
                        }elseif ($sdata['grade']>=2 && $sdata['grade']<3){
                            echo '<span style="color: #DE5A24">' . $sdata['grade'] . '</span>';
                        }
                        else{
                            echo '<span style="color: #5bb75b;">' . $sdata['grade'] . '</span>';
                        } ?>
                </td>
                <td><?php echo $sdata['credit']?></td>
                <td>
                    <a class="btn btn-primary" style="text-decoration: none; color: #16BBD2" href="student_grade_edit.php?id=<?php echo $sdata['id'];?>">Edit</a>&nbsp&nbsp|&nbsp&nbsp
                    <a class="btn btn-primary" style="text-decoration: none; color: #16BBD2" href="student_course_delete.php?id=<?php echo $sdata['id'];?>">Delete</a>
                </td>
            </tr>

        <?php } }else{?>

            <tr><td colspan="5"><h2>No user data found</h2></td></tr>
        <?php } ?>
    </table>
<?php


}else{
   header("location: studentLogin.php");
}

?>


</html>
