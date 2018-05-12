<?php
session_start();
    if(!isset($_SESSION['username']))
        header("Location: ../index.php");

if(isset($_POST['id']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['group']) && isset($_POST['sex']) && isset($_POST['email']) && isset($_POST['tel']) && $_POST['id'] != "" && $_POST['fname'] != "" && $_POST['lname'] != "" && $_POST['group'] != "" && $_POST['sex'] != "" && $_POST['tel'] != "" && $_POST['email'] != ""){
    include_once("./config.php");
    $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $group = $_POST['group'];
    $tel = $_POST['tel'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    
    $sql = "insert into students values ('$id', '$fname', '$sex', '$tel', '$email', '$lname', '$group')";
    $result = mysqli_query($con, $sql);
    
    mysqli_close($con);
    echo 1;
}else
    echo 0
?>