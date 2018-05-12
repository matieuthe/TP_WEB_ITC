<?php
    session_start();
    if(!isset($_SESSION['username']))
        header("Location: index.php");
    
    include_once("./process/config.php");
    //Get all the students from the table
    $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $selectsql = "select * from students";
    $arrStudents = mysqli_query($con, $selectsql);

    $photo = "";
    if(isset($_SESSION['photo']) && $_SESSION['photo'] != "") $photo = $_SESSION['photo'];
    $username = $_SESSION['username'];
    $title = "Dashboard";
    include_once("./headFoot/headAdmin.php");
?>
        
        <div class='row'>
            <div class='center-align'>
                <h3>Student List</h3>
            </div>
        </div>
        
        <div class="row">
             <div class='col s10 center-align offset-s1'>
                <table class="centered highlight">
                    <thead>
                        <th>Number</th>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last name</th>
                        <th>Sex</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Group</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="bodyDash">
                        <?php
                            $compteur = 1;
                            foreach($arrStudents as $student){
                                $str = "<tr id='".$student['id']."'>";
                                    $str .= "<td>".$compteur++."</td>";
                                    $str .= "<td>".$student['id']."</td>";
                                    $str .= "<td>".$student['first_name']."</td>";
                                    $str .= "<td>".$student['last_name']."</td>";
                                    $str .= "<td>".$student['gender']."</td>";
                                    $str .= "<td>".$student['phone']."</td>";
                                    $str .= "<td>".$student['email']."</td>";
                                    $str .= "<td>".$student['groupITC']."</td>";
                                    $str .= "<td> <div class='row'><a href='#modalVue' class='vueButton col s4 center-align waves-effect waves-light btn-small'>Vue</a><a href='#modalEdit' class='editButton col s4 center-align waves-effect waves-light btn-small'>Edit</a><a class='removeButton col s4 center-align waves-effect waves-light btn-small'>Remove</a></div></td>";
                                $str .= "</tr>\n";
                                echo $str;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!------------------------------------------------------------------------------------

            Form Edit Student

        --------------------------------------------------------------------------------------->
         <div id="modalEdit" class="modal">
            <div class='row'>
                <div class='center-align'>
                    <br><h3 id="titleEditStudent">Edit Student</h3>
                </div>
            </div>
            <div class='row'>
                <form class='col s12 m8 offset-m2 l6 offset-l3' action='#' method='post' enctype='multipart/form-data' id="formEditStudent">
                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class='material-icons prefix'>account_balance</i>
                            <input id='icon_prefix' type='text' class='validate' name='idEdit' placeholder='Id' readonly>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s6'>
                            <i class='material-icons prefix'>face</i>
                            <input id='icon_prefix' type='text' class='validate' name='fnameEdit' placeholder='Firstname' id='fnStud'>
                        </div>
                        <div class='input-field col s6'>
                            <input id='icon_prefix' type='text' class='validate' name='lnameEdit' placeholder='Lastname' id='lnStud'>
                        </div>

                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class='material-icons prefix'>child_care</i>
                            <input id='icon_prefix' type='text' class='validate' name='sexEdit' placeholder='Gender' id='sexStud'>
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class='material-icons prefix'>group</i>
                            <input id='icon_prefix' type='text' class='validate' name='groupEdit' placeholder='Group' id='grStud'>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class='material-icons prefix'>email</i>
                            <input id='icon_prefix' type='text' class='validate' name='emailEdit' placeholder='Email' id='emStud'>
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class='material-icons prefix'>call</i>
                            <input id='icon_prefix' type='text' class='validate' name='telEdit' placeholder='Phone number' id='phStud'>
                        </div>
                    </div>
                    

                    <div class='row'>
                        <div class='col s6 center-align offset-s3'>
                            <button class='btn waves-effect waves-light amber accent-3' type='submit' name='action'>Update change
                                <i class='material-icons right'>send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!------------------------------------------------------------------------------------

            Vue Student

        --------------------------------------------------------------------------------------->
         <div id="modalVue" class="modal">
            <div class='row'>
                <div class='center-align'>
                    <br><h3 id="titleEditStudent">Student Information</h3>
                </div>
            </div>
            <div class='row'>
                <div class='col s12 m8 offset-m2 l6 offset-l3'>
                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class='material-icons prefix'>account_balance</i>
                            <input id='icon_prefix' type='text' class='validate' name="idVue" readonly>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s6'>
                            <i class='material-icons prefix'>face</i>
                            <input id='icon_prefix' type='text' class='validate' name="fnameVue" readonly>
                        </div>
                        <div class='input-field col s6'>
                            <input id='icon_prefix' type='text' class='validate' name="lnameVue" readonly>
                        </div>

                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class='material-icons prefix'>child_care</i>
                            <input id='icon_prefix' type='text' class='validate' name="sexVue" readonly>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class='material-icons prefix'>group</i>
                            <input id='icon_prefix' type='text' class='validate' name="groupVue" readonly>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class='material-icons prefix'>email</i>
                            <input id='icon_prefix' type='text' class='validate' name="emailVue" readonly>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <i class='material-icons prefix'>call</i>
                            <input id='icon_prefix' type='text' class='validate' name="telVue"  readonly>
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class='col s6 center-align offset-s3'>
                            <a href="#modalEdit" id='EditVue'><button class='btn waves-effect waves-light amber accent-3' type="submit">Edit
                            </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include_once("./headFoot/footAdmin.php"); 

/*
$studentsFile = fopen("./ressource/students.txt", "r") or die("Unable to open");
$arrStudents = [];
if($studentsFile){
    while (($line = fgets($studentsFile)) !== false) {
        list($id, $name, $sex, $tel) = explode(";", $line);
        array_push($arrStudents, ['id'=>$id, 'name'=>$name, 'gender'=>$sex, 'telephone'=>$tel]);
    }
    fclose($studentsFile);
}*/
?>