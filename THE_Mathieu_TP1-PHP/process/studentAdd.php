<?php
session_start();
    if(!isset($_SESSION['username']))
        header("Location: ../login.php?access=denied");

if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['sex']) && isset($_POST['tel']) && $_POST['id'] != "" && $_POST['name'] != "" && $_POST['sex'] != "" && $_POST['tel'] != ""){
    include_once("./config.php");
    $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $sex = $_POST['sex'];
    
    $sql = "insert into students values ('$id', '$name', '$sex', '$tel')";
    $result = mysqli_query($con, $sql);
    echo 1;
}else
    echo 0
?>