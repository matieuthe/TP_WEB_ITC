<?php
ini_set('error_reporting', -1);
ini_set('display_errors', 1);
ini_set('html_errors', 1); // I use this because I use xdebug.

    if(isset($_POST['username']) && isset($_POST['pss'])){
        $myfile = fopen("mdp.txt", "a") or die("Unable to open");
        $str = $_POST['username'];
        $str .= ";";
        $str .= crypt($_POST['pss'], 'i721a9b52bfceacc503c056e3b9b93cfaE');
        $str .= "\n";
        fwrite($myfile, $str);
        fclose($myfile);
    }
?>