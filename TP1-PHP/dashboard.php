<?php
    session_start();
    if(!isset($_SESSION['username']))
        header("Location: login.php");
    
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
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Telephone</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                            $compteur = 1;
                            foreach($arrStudents as $student){
                                $str = "<tr>";
                                    $str .= "<td>".$compteur++."</td>";
                                    $str .= "<td>".$student['id']."</td>";
                                    $str .= "<td>".$student['full_name']."</td>";
                                    $str .= "<td>".$student['gender']."</td>";
                                    $str .= "<td>".$student['phone']."</td>";
                                    $str .= "<td> <div class='row'><a class='col s6 center-align waves-effect waves-light btn-small'>Edit</a><a class='col s6 center-align waves-effect waves-light btn-small'>Remove</a></div></td>";
                                $str .= "</tr>\n";
                                echo $str;
                            }
                        ?>
                    </tbody>
                </table>
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