<?php
    session_start();
    if(!isset($_SESSION['username']))
        header("Location: ../index.php");

    if(isset($_POST['submit'])){
        $strr = strrpos($_FILES['fileToUpload']['name'],'.');
        $id = md5(substr($_FILES['fileToUpload']['name'],0,$strr));
        $ext = substr($_FILES['fileToUpload']['name'],$strr);
        $destination = "../ressource/img/".$id.$ext;
        $filename = $id.$ext;
        $i = 0;
        while(file_exists($destination)){
            $i=$i+1;
            $destination = "../ressource/img/".$id.$i.$ext;
            $filename = $id.$i.$ext;
        }

        $extensions = array('.jpeg', '.jpg', '.png', '.JPG');
        if ($extensions !== FALSE AND !in_array($ext,$extensions)) header("Location: ../dashboard.php");
        
        $res = move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$destination);
        if($res){
            
            require_once("../process/config.php");
            $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die("Connection failed");
            
            //Get the old photo an remove it
            $selectSql = "select photo from users where username='".$_SESSION['username']."'";
            $resultSelect = mysqli_query($con, $selectSql);
            foreach($resultSelect as $row)
                if($row['photo'] != "")
                    unlink("../ressource/img/".$row['photo']);
            
            //Set the new photo
            $sql = "update users set photo='$filename' where username='".$_SESSION['username']."'";
            $result = mysqli_query($con, $sql);
            $_SESSION['photo'] = $filename;
        }
    }
    header("Location: ../dashboard.php");


//            
//            $mdpFile = fopen("./ressource/mdp.txt", "r") or die("Unable to open");
//            $newMdpFile = fopen("./ressource/temp.txt", "w") or die("Unable to open");
//            $_SESSION['photo'] = $filename;
//            
//            while (($line = fgets($mdpFile)) !== false) {
//                $tableau = explode(";", $line);
//                if($tableau[0] == $_SESSION['username']){
//                    $str = $tableau[0];
//                    $str .= ";";
//                    $str .= $tableau[1];
//                    $str .= ";";
//                    $str .= $filename;
//                    $str .= "\n";
//                    
//                    //remove the old picture
//                    if(trim($tableau[2]) != "default.png"){
//                        unlink("./ressource/img/".trim($tableau[2]));
//                    }
//                    
//                    fwrite($newMdpFile, $str);
//                }else{
//                    fwrite($newMdpFile, $line);
//                }
//            }
//            fclose($mdpFile);
//            fclose($newMdpFile);
//            rename("./ressource/temp.txt", "./ressource/mdp.txt");

?>