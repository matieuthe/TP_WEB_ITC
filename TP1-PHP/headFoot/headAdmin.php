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
        <title><?php
                    if(isset($title) && $title != "")
                        echo $title;
                    else
                        echo "Admin Part";
                ?></title>
    </head>
    <body>
        <div class="navbar-fixed">
            <nav>
                <div id="navigation" class="nav-wrapper amber accent-3">
                    <a href="./dashboard.php" class="brand-logo"><i class="material-icons">format_paint</i>PHP Website</a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                     <ul id="nav-mobile" class="right hide-on-med-and-down">
                         <li> <?php
                                if(isset($photo) && $photo != ""){
                                    echo "<a href='#modal1'><img style='max-height: 64px;padding: 15px 0' src=\"./ressource/img/".$photo."\"></a>";
                                }else{
                                    echo "<li><a href='#modal1'><i class='material-icons right'>add_a_photo</i></a></li>";
                                }
                            ?>
                         </li>
                        <li> Connected as <?php echo $username;?></li>
                        <li><a href="#modal2"><i class="material-icons left">person_add</i>Add student</a></li>
                        <li><a href="./process/logout.php"><i class="material-icons left">power_settings_new</i>Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        
        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class="row">
                <div class='col s10 center-align offset-s1'>
                    <form action="./process/uploadImage.php" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <h4>Select a picture</h4>
                        </div>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" name="fileToUpload">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn-flat" value="Upload" name="submit">
                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div id="modal2" class="modal">
            <div class='row'>
                <div class='center-align'>
                    <br><h3 id="titleAddStudent">Add Student</h3>
                </div>
            </div>
            <div class='row'>
                <form class='col s12 m8 offset-m2 l6 offset-l3' action='./process/Old/processAdd.php' method='post' enctype='multipart/form-data' id="formAddStudent">
                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class='material-icons prefix'>account_balance</i>
                            <input id='icon_prefix' type='text' class='validate' name='id' placeholder='Id'>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class='material-icons prefix'>face</i>
                            <input id='icon_prefix' type='text' class='validate' name='name' placeholder='Name'>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class='material-icons prefix'>child_care</i>
                            <input id='icon_prefix' type='text' class='validate' name='sex' placeholder='Gender'>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class='material-icons prefix'>call</i>
                            <input id='icon_prefix' type='text' class='validate' name='tel' placeholder='Phone number'>
                        </div>
                    </div>


                    <div class='row'>
                        <div class='col s6 center-align offset-s3'>
                            <button class='btn waves-effect waves-light amber accent-3' type='submit' name='action'>Add Student
                                <i class='material-icons right'>send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>