<?php
    require_once("./config.php");

    if(isset($_POST['username'])&& isset($_POST['passwd']) && $_POST['username'] != "" && $_POST['passwd'] != ""){
        $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        
        if ($con->connect_error) {
            echo 0;
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
                    setcookie('user', $_POST['username'], time() + 1000, '/');
                    setcookie('pwd', openssl_encrypt($_POST['passwd'], 'aes256', COOKIE_CRIPT, 0, COOKIE_IV), time() + 1000, '/');
                }else{
                    setcookie('user', "-1", time() + 1000, '/');
                    setcookie('pwd', "-1", time() + 1000, '/');
                }
                echo 1;
            }else{
                echo 0;
            }
            
                mysqli_close($con);
            }        
    }else{
        echo 0;
    }
?>