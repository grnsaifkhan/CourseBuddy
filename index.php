<?php
/**
 * Created by PhpStorm.
 * User: saif khan
 * Date: 3/20/2018
 * Time: 10:18 AM
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Course Buddy
    </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bar/bar.css"/>
    <link rel="stylesheet" type="text/css" href="css/dark/dark.css"/>
    <link rel="stylesheet" type="text/css" href="css/default/default.css"/>
    <link rel="stylesheet" type="text/css" href="css/light/light.css"/>
    <link rel="stylesheet" type="text/css" href="css/nivo-slider.css"/>
</head>
<body>
    <div class="main">
        <?php
            include 'header.php';
        ?>
        <?php
            include 'index_body.php';
        ?>
        <?php
            include 'footer.php';
        ?>
    </div>
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('#slider').nivoSlider();
        });
    </script>
</body>
</html>
