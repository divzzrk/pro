<?php 
    $db_host = "localhost"; //can be "localhost" for local development
    $db_username = "root";
    $db_password = "";
    $db_name = "learndb";
    $conn = new mysqli($db_host,$db_username,$db_password,$db_name) or die(mysqli_error());
?>