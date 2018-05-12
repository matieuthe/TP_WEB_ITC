    </body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            
            $('#buttonLogin').click(function(e){
                $("#titleLogin").text("Login");
                $("#titleLogin").css("color", "black");
                document.getElementById("formLogin").reset();
                $('#modal1').modal();
            });
            
            $('#buttonRegister').click(function(e){
                $("#titleRegister").text("Register");
                $("#titleRegister").css("color", "black");
                document.getElementById("formRegister").reset();
                $('#modal2').modal();
            });
            
            
            $("#formLogin").submit(function(e) {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var url = "./process/loginReq.php"; // the script where you handle the form input.

                $.ajax({
                       type: "POST",
                       url: url,
                       data: $("#formLogin").serialize(), // serializes the form's elements.
                       success: function(data)
                       {
                           if(data == 1) window.location.replace("./dashboard.php");
                           else{
                                $("#titleLogin").text("Wrong Username or Password");
                                $("#titleLogin").css("color", "red");
                           }
                       }
                     });

            });

            $("#formRegister").submit(function(e) {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var url = "./process/registerReq.php"; // the script where you handle the form input.

                $.ajax({
                       type: "POST",
                       url: url,
                       data: $("#formRegister").serialize(), // serializes the form's elements.
                       success: function(data)
                       {
                           if(data == 1) window.location.replace("./dashboard.php");
                           else{
                                $("#titleRegister").text("Please fill all the fields");
                                $("#titleRegister").css('color', 'red');
                           } 
                       }
                     });

            });
        });
       
        
    </script>
</html>