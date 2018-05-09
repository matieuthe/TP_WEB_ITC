<?php
    //echo phpinfo();
    $arrStudents = [
      ['id'=>'e23772837283', 'name'=>'Jean Paul', 'gender'=>'Male', 'telephone'=>'0932322'],  
      ['id'=>'e23772728332', 'name'=>'Jean Paul 2', 'gender'=>'Male', 'telephone'=>'0932322'],  
      ['id'=>'e23772837211', 'name'=>'Jean Paul 3', 'gender'=>'Male', 'telephone'=>'0932322'],  
      ['id'=>'e23772833210', 'name'=>'Rene Pierre 1', 'gender'=>'Male', 'telephone'=>'0932322'],  
      ['id'=>'e23772832313', 'name'=>'Rene Pierre 2', 'gender'=>'Male', 'telephone'=>'0932322'],  
      ['id'=>'e23776874342', 'name'=>'Rene Pierre 3', 'gender'=>'Male', 'telephone'=>'0932322'],  
      ['id'=>'e23772839283', 'name'=>'Lea 1', 'gender'=>'Female', 'telephone'=>'0932322'],  
      ['id'=>'e23772837223', 'name'=>'Lea 2', 'gender'=>'Female', 'telephone'=>'0932322'],  
    ];
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
                    if(isset($_GET['id']) && isset($_GET['name']) && isset($_GET['sex']) && isset($_GET['tel']))
                        $str = "<tr>";
                            $str .= "<td>".$compteur++."</td>";
                            $str .= "<td>".$_GET['id']."</td>";
                            $str .= "<td>".$_GET['name']."</td>";
                            $str .= "<td>".$_GET['sex']."</td>";
                            $str .= "<td>".$_GET['tel']."</td>";
                            $str .= "<td><button>Vue</button><button>Edit</button><button>Remove</button></td>";
                        $str .= "</tr>\n";
                        echo $str;
                ?>
            </tbody>
        </table>
        
        <form action="./inscription.php">
            <input type="submit" value="Add"/>
        </form>
        
    </body>
</html>