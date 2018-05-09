<?php    
    if(isset($_POST['username']) && isset($_POST['passwd']) && $_POST['username'] != "" && $_POST['passwd'] != ""){
        require_once("./config.php");
        $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die("Connection failed");
        
        $username = $_POST['username'];
        $pwd = crypt($_POST['passwd'], DB_SALT);
 
        $sql = "insert into users (username, password) values ('$username', '$pwd')";
        $result = mysqli_query($con,$sql);
    
        if($result){
            session_start();
            $_SESSION['username'] = $_POST['username'];
            echo 1;
        }else
            echo 0;
    }else{
        echo 0;
    }
?>