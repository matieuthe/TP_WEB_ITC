<?php
session_start();
    if(!isset($_SESSION['username']))
        header("Location: ../index.php");

if(isset($_POST['idEdit']) && $_POST['idEdit'] != ""){
    include_once("./config.php");
    $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    if ($con->connect_error) {
            echo 0;
    }else{
        $id = $_POST['idEdit'];
        $fname = $_POST['fnameEdit'];
        $lname = $_POST['lnameEdit'];
        $sex = $_POST['sexEdit'];
        $phone = $_POST['telEdit'];
        $email = $_POST['emailEdit'];
        $group = $_POST['groupEdit'];
        
        $updateSql = "UPDATE students SET first_name='$fname', last_name='$lname', gender='$sex', phone='$phone', email='$email', groupITC='$group' WHERE id='$id'";
        
        $result = mysqli_query($con, $updateSql);
        mysqli_close($con);
        echo 1;
    }
}else
    echo 0;
?>