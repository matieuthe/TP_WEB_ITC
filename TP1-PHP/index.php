<?php
    header("Location: login.php");

    require_once("./process/config.php");
    $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die("Connection failed");
    /*
    $name = "mat";
    $pwd = md5("123");
    $full = "Mathieu";
    
    $sql = "insert into users (username, password, full_name) 
            values ('$name', '$pwd', '$full')";
    $result = mysqli_query($con,$sql);
    
    if($result){
        echo "Success";
    }else{
        echo "Fail";
    }*/

    $name = "mat";
    $pwd = md5("123");
    $full = "Mathieu";
    
    $selectsql = "select * from users where username='$name' and password ='$pwd'";
    $result = mysqli_query($con, $selectsql);
    if(count($result) > 0){
        foreach($result as $row){
            echo $row['username'];
        }
    }else{
        
    }

    mysqli_close($con);
?>