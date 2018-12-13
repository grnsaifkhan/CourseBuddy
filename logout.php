<?php
/**
 * Created by PhpStorm.
 * User: saif khan
 * Date: 4/14/2018
 * Time: 9:06 AM
 */
session_start();
session_destroy();

header('location:index.php');

?>