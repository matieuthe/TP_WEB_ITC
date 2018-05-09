<?php
    if(isset($_GET['id']) && isset($_GET['name']) && isset($_GET['sex']) && isset($_GET['tel'])){
        $myfile = fopen("students.txt", "a") or die("Unable to open");
        $str = $_GET['id'];
        $str .= ";";
        $str .= $_GET['name'];
        $str .= ";";    
        $str .= $_GET['sex'];
        $str .= ";";    
        $str .= $_GET['tel'];
        $str .= "\n";
        fwrite($myfile, $str);
        fclose($myfile);
    }

    $studentsFile = fopen("students.txt", "r") or die("Unable to open");
    $arrStudents = [];
    if($studentsFile){
        while (($line = fgets($studentsFile)) !== false) {
            list($id, $name, $sex, $tel) = explode(";", $line);
            array_push($arrStudents, ['id'=>$id, 'name'=>$name, 'gender'=>$sex, 'telephone'=>$tel]);
        }
        fclose($studentsFile);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>List Students</title>
        <style>
            body{
                align-content: center;
            }
            table {
                border: 4px darkslateblue solid;
                border-radius: 15px 0px 15px 0px;
                text-align: center;
                background-color: floralwhite;
            }
            thead{
                color:darkslateblue;
                font-size: 25px;
                font-style: italic;
                font-family: fantasy;
                font-weight: bold;
            }
            td {
                width: 225px;
            }
            tbody tr {
                color: darkslategrey;
                font-size: 18px;
                font-family: fantasy;
                font-weight: bold;
            }
            td button {
                color: floralwhite;
                background-color: darkslateblue;
                width: 55px;
                margin-right: 10px;
                border-radius: 5px;
                box-shadow: 10px;
            }
            button {
                color: floralwhite;
                background-color: darkslateblue;
                width: 55px;
                margin-right: 10px;
                border-radius: 5px;
                box-shadow: 10px;
            }
        </style>
    </head>
    
    <body>
        <table>
            <thead>
                <td>Number</td>
                <td>ID</td>
                <td>Name</td>
                <td>Gender</td>
                <td>Telephone</td>
                <td>Action</td>
            </thead>
            <tbody>
                <?php
                    $compteur = 1;
                    foreach($arrStudents as $student){
                        $str = "<tr>";
                            $str .= "<td>".$compteur++."</td>";
                            $str .= "<td>".$student['id']."</td>";
                            $str .= "<td>".$student['name']."</td>";
                            $str .= "<td>".$student['gender']."</td>";
                            $str .= "<td>".$student['telephone']."</td>";
                            $str .= "<td><button>Vue</button><button>Edit</button><button>Remove</button></td>";
                        $str .= "</tr>\n";
                        echo $str;
                    }
                ?>
            </tbody>
        </table>
        
        <form action="./inscription.php">
            <input type="submit" value="Add"/>
        </form>
        
    </body>
</html>