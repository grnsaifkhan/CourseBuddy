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
    <title>Faculty Sign In</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
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


<?php


if (isset($_SESSION['email']) == true) {

    $email = $_SESSION['email'];
    $sql = "select * from stdgrd where email = '" . $email . "'";

    $result = mysqli_query($link, $sql);

    $rowcount = mysqli_num_rows($result);

    ?>
    <a href="logout.php">logout</a>
    <?php
    echo "<table style='border: solid 1px black;'>";
    echo "<tr><th>Course</th><th>Grade</th><th>Credit</th></tr>";

    class TableRows extends RecursiveIteratorIterator
    {
        function __construct($it)
        {
            parent::__construct($it, self::LEAVES_ONLY);
        }

        function current()
        {
            return "<td style='width: 150px; border: 1px solid black;'>" . parent::current() . "</td>";
        }

        function beginChildren()
        {
            echo "<tr>";
        }

        function endChildren()
        {
            echo "</tr>" . "\n";
        }
    }

    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT course, grade,credit FROM stdgrd WHERE email= '".$email."'");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
            echo $v;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    echo "</table>";

}else{
    header("location: studentLogin.php");
}

?>


    </body>

</html>
