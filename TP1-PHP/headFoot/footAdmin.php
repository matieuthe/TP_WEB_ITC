    </body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.modal').modal();
            
            $("#formAddStudent").submit(function(e) {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var url = "./process/studentAdd.php"; // the script where you handle the form input.

                $.ajax({
                       type: "POST",
                       url: url,
                       data: $("#formAddStudent").serialize(), // serializes the form's elements.
                       success: function(data)
                       {
                           if(data == 1) window.location.replace("./dashboard.php");
                           else{
                               $("#titleAddStudent").text("Please fill all the fields !!");
                               $("#titleAddStudent").css('color','red');
                           } 
                       }
                     });

            });
            
            $('#modalDashBoard').modal();
            
        });
        
        
    </script>
</html>