<?php
session_start();
    if(!isset($_SESSION['username']))
        header("Location: ../index.php");

if(isset($_POST['id']) && $_POST['id'] != ""){
    include_once("./config.php");
    $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    if ($con->connect_error) {
            echo 0;
    }else{
        $id = $_POST['id'];
        $sql = "DELETE FROM students WHERE id='$id'";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        echo 1;
    }
}else
    echo 0;


?>