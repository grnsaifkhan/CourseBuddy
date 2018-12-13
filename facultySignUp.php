<?php
/**
 * Created by PhpStorm.
 * User: saif khan
 * Date: 3/22/2018
 * Time: 1:41 PM
 */
?>

<?php
require ('connection.php');

if (isset($_POST["submit"])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $username = $_POST['username'];
    $institute = $_POST['institute'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $gender = $_POST['gender'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];


    $dob_info = "{$year}-{$month}-{$day}";

    $dob = date("Y-m-d", strtotime($dob_info));

    $sqlsearch ="SELECT email FROM facreg  WHERE email = '".$email."'";

    $result = mysqli_query($con,$sqlsearch);

    if (mysqli_num_rows($result)){
        echo "<script>alert('email address already exist');</script>";
    }else {
        $sql = "INSERT INTO facreg(fname,lname,username,institute,department,email,password,gender,dob) VALUES('$fname','$lname','$username','$institute','$department','$email','$password','$gender','$dob')";
        if ($username != '' && $email != '') {


            if (!mysqli_query($con, $sql)) {

                echo 'not inserted';

            } else {

                echo '<script type="text/javascript"> alert("Signed up Successfully"); </script>';
            }

        } else echo '<b>Error .Type again</b>';
        header("refresh:1; url=facultyLogIn.php");
    }


}

?>

<!DOCTYPE html>
<html>
<header>
    <title>Faculty Sign Up</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
</header>
<body>
<?php include 'header.php' ?>

<div class="fix signup_main">
    <div  class="fix signupform">
        <form action="facultySignUp.php" method="post">
            <h3><u><span style="color: #16BBD2;">Please Fill Up The Sign Up Form</span></u></h3>
            First name:<br>
            <input type="text" name="firstname" value="" required><br><br>
            Last name:<br>
            <input type="text" name="lastname" value="" required><br><br>
            Username:<br>
            <input type="text" name="username" value="" required><br><br>
            Institute:<br>
            <input type="text" name="institute" value="" required><br><br>
             Department:<br>
            <input type="text" name="department" value="" required><br><br>
            Email:<br>
            <input type="email" name="email" value="" required><br><br>
            Password:<br>
            <input type="Password" name="password" value="" required><br><br>

            <h3>Gender</h3>
            <input type="radio" name="gender" value="male" checked>Male<br>
            <input type="radio" name="gender" value="female">Female<br>

            <h3 >Birth date: </h3>

            <select class="date" name="day" required>
                <option value="">Day</option>
                <option value="1"> 1</option>
                <option value="2">2</option>
                <option value="3">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
            <select class="month" name="month" required>
                <option value="">Month</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <select class="year" name="year" required>
                <option value="">Year</option>
                <option value="1980">1980</option>
                <option value="1981">1981</option>
                <option value="1982">1982</option>
                <option value="1983">1983</option>
                <option value="1984">1984</option>
                <option value="1985">1985</option>
                <option value="1986">1986</option>
                <option value="1987">1987</option>
                <option value="1988">1988</option>
                <option value="1989">1989</option>
                <option value="1990">1990</option>
                <option value="1991">1991</option>
                <option value="1992">1992</option>
                <option value="1993">1993</option>
                <option value="1994">1994</option>
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
            </select><br><br>
            <input class="btn_signup" type="submit" name="submit" value="sign up"><br>
            <a href="facultyLogIn.php" style="text-decoration: none; color: #ffffff; font-size: 15px">Have account? Please Log In</a>
        </form>
    </div>
</div>

<?php include 'footer.php' ?>

</body>
</html>

