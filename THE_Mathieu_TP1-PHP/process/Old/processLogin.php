<?php
    require_once("./config.php");

    if(isset($_POST['username'])&& isset($_POST['passwd']) && $_POST['username'] != "" && $_POST['passwd'] != ""){
        $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        
        if ($con->connect_error) {
            header("Location: ../login.php?access=error");
        }else{
            $username = $_POST['username'];
            $pwd = crypt($_POST['passwd'], DB_SALT);
            
            $selectsql = "select * from users where username='$username' and password ='$pwd'";
            
            $result = mysqli_query($con, $selectsql);
            
            if(mysqli_num_rows($result) > 0){
                session_start();
                foreach($result as $row)
                    if($row['photo'] != "")
                        $_SESSION['photo'] = $row['photo'];
                
                $_SESSION['username'] = $_POST['username'];
                
                if(isset($_POST['remember'])){
                    setcookie('username', $_POST['username']);
                    setcookie('password', $_POST['passwd']);
                }else{
                    setcookie('username', "-1");
                    setcookie('password', "-1");
                }
                header("Location: ../dashboard.php");
            }else{
                header("Location: ../login.php?access=error");
            }
            
                mysqli_close($con);
            }        
    }else{
        header("Location: ../login.php?access=error");
    }




//        $mdpFile = fopen("../ressource/mdp.txt", "r") or die("Unable to open");
//        $photo = "default.png";
//        if($mdpFile){
//            $b = false;
//            while (($line = fgets($mdpFile)) !== false) {
//                //list($username, $mdp) = explode(";", $line);
//                $tableau = explode(";", $line);
//                /*if($username === $_POST['username']){
//                    if(trim($mdp) == crypt($_POST['passwd'],'i721a9b52bfceacc503c056e3b9b93cfaE')){
//                        $b=true;
//                    }
//                }*/
//                if($tableau[0] == $_POST['username']){
//                    if(trim($tableau[1]) == crypt($_POST['passwd'],'i721a9b52bfceacc503c056e3b9b93cfaE')){
//                        $b=true;
//                        $photo = $tableau[2];
//                    }
//                }
//                
//            }
//            fclose($mdpFile);
//            if($b){
//                session_start();
//                $_SESSION['username'] = $_POST['username'];
//                $_SESSION['photo'] = $photo;
//                if(isset($_POST['remember'])){
//                    setcookie('username', $_POST['username']);
//                    setcookie('password', $_POST['passwd']);
//                }else{
//                    setcookie('username', "-1");
//                    setcookie('password', "-1");
//                }
//                header("Location: ../dashboard.php");
//            }
//            else    header("Location: ../login.php?access=error");
//
?>