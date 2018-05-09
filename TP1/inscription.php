<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Add</title>
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
        <form method="get" action="./storeStudent.php">
            <label for="idAdd">Id : </label>
            <input id="idAdd" type="text" name="id" value=""/>
            <br/>
            <label for="name">Name : </label>
            <input id="name" type="text" name="name" value=""/>
            <br/>
            <label for="tel">Tel : </label>
            <input id="tel" type="text" name="tel" value=""/>
            <br/>
            <label for="sex">Sex : </label>
            <input id="sex" type="text" name="sex" value=""/>
            <br/>
            <input type="submit"/>
        </form>
    </body>
</html>