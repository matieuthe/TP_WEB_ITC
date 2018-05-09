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
            header("Location: ../dashboard.php");
        }else
            header("Location: ../login.php?access=error");
    }else{
        header("Location: ../login.php?access=error");
    }

//        $myfile = fopen("../ressource/mdp.txt", "a") or die("Unable to open");
//        $str = $_POST['username'];
//        $str .= ";";
//        $str .= crypt($_POST['passwd'], 'i721a9b52bfceacc503c056e3b9b93cfaE');
//        $str .= ";";
//        $str .= "default.png";
//        $str .= "\n";
//        fwrite($myfile, $str);
//        fclose($myfile);
//        session_start();
//        $_SESSION['username'] = $_POST['username'];
//        $_SESSION['photo'] = "default.png";
//        header("Location: ../dashboard.php");
?>