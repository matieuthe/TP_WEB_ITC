<?php
    include("./header.php"); 

    /*if(isset($_POST["username"]) && isset($_POST["pss"])){
        echo    "<div class='row'>
                    <div class='center-align'>
                        <h3>Hello ".$_POST['username']."</h3>
                    </div>
                </div>";
        echo "<div class='row'>
                <form>
                <div class='center-align'>
                    <button class='btn waves-effect waves-light amber accent-3' type='submit' name='action'>Logout
                        <i class='material-icons right'>send</i>
                    </button>
                </div>
                </form>
            </div>";

    }else{*/
        echo    "<div class='row'>
                    <div class='center-align'>
                        <h3>Inscription</h3>
                    </div>
                </div>";
        echo "

        <div class='row'>
        <form class='col s12 m8 offset-m2 l6 offset-l3' action='./storeMdp.php' method='post' enctype='multipart/form-data'>
            <div class='row'>
                <div class='input-field col s12'>
                    <i class='material-icons prefix'>face</i>
                    <input id='icon_prefix' type='text' class='validate' name='username' placeholder='Nom'>
                </div>
            <div class='row'>
                <div class='input-field col s12'>
                    <i class='material-icons prefix'>https</i>
                    <input id='password' type='password' class='validate' name='pss' placeholder='Mot de passe'>
                </div>
            </div>

            <div class='row'>
                <div class='center-align'>
                    <button class='btn waves-effect waves-light amber accent-3' type='submit' name='action'>Valider
                        <i class='material-icons right'>send</i>
                    </button>
                </div>
            </div>

            </form>";
   // }

    include("./footer.php"); 
?>