  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8" />
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>
            <?php 
                if(isset($title) && $title != "") echo $title;
                else echo "PHP website";
            ?>
        </title>
    </head>
    <body>
        <nav>
            <div id="navigation" class="nav-wrapper amber accent-3">
                <a href="login.php" class="brand-logo"><i class="material-icons">format_paint</i>PHP Website</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="#modal1"><i class="material-icons right">account_circle</i>Login</a></li>
                    <li><a href="#modal2"><i class="material-icons right">person_add</i>Register</a></li>
                </ul>
            </div>
        </nav>
        
        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class='row'>
                <div class='center-align'>
                    <br><h3 id="titleLogin">Login</h3>
                </div>
            </div>
            <div class='row'>
                <form class='col s12 m8 offset-m2 l8 offset-l2' action='./process/Old/processLogin.php' method='post' enctype='multipart/form-data' id="formLogin">
                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class='material-icons prefix'>face</i>
                            <input id='icon_prefix' type='text' class='validate' name='username' placeholder='Username' value="<?php
                                 if(isset($_COOKIE['user']) && $_COOKIE['user'] != "-1") echo $_COOKIE['user'];
                            ?>">
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class='material-icons prefix'>https</i>
                            <input id='password' type='password' class='validate' name='passwd' placeholder='Password' value="<?php
                                 if(isset($_COOKIE['pwd']) && $_COOKIE['pwd'] != "-1") echo openssl_decrypt($_COOKIE['pwd'], 'aes256', COOKIE_CRIPT, 0, COOKIE_IV);
                            ?>">
                        </div>
                    </div>

                    <div class='right-align'>
                        <input type="checkbox" id="remember" name="remember" checked="checked">
                        <label for="remember">Remember me </label>
                        <button class='btn waves-effect waves-light amber accent-3' type='submit' name='action'>Login
                            <i class='material-icons right'>send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
                <!-- Modal Structure -->
        <div id="modal2" class="modal">
            <div class='row'>
                <div class='center-align'>
                    <br><h3 id="titleRegister">Register</h3>     
                </div>
            </div>

            <div class='row'>
                <form class='col s12 m8 offset-m2 l6 offset-l3' action='./process/Old/storeMDP.php' method='post' enctype='multipart/form-data' id="#formRegister">
                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class='material-icons prefix'>face</i>
                            <input id='icon_prefix' type='text' class='validate' name='username' placeholder='Username'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class='material-icons prefix'>https</i>
                            <input id='password' type='password' class='validate' name='passwd' placeholder='Password'>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col s6 center-align offset-s3'>
                            <button class='btn waves-effect waves-light amber accent-3' type='submit' name='action'>Register and login
                                <i class='material-icons right'>send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        