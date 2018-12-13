<?php
/**
 * Created by PhpStorm.
 * User: saif khan
 * Date: 4/29/2018
 * Time: 8:15 PM
 */

session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "coursebuddy";

$link = mysqli_connect($host,$user,$password,$db);

if (isset($_SESSION['email']) == true){
    if (isset($_GET['id'])){

        $gradeId = (int)$_GET['id'];
    }

    $delete_sql = "DELETE FROM stdgrd WHERE id='$gradeId' ";

    $deleteresult = mysqli_query($link, $delete_sql);

    if (!$deleteresult) {

        echo '<script type="text/javascript"> alert("not deleted"); </script>';

    } else {

        echo '<script type="text/javascript"> alert("Course Deleted Successfully");  window.location.href = "forPractice.php";</script>';



    }


}else{
    header("location: studentLogin.php");
}


?>