    </body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            
            
            
            $('#buttonAddStudent').click(function(e){
                $("#titleAddStudent").text("Add Student");
                $("#titleAddStudent").css('color','black');
                document.getElementById("formAddStudent").reset();
                $('#modal2').modal();
            });

            $('#buttonAddPhoto').click(function(e){
                document.getElementById("formAddPhoto").reset();
                $('#modal1').modal();
            });
            
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
            
            
            $('.removeButton').click(function(e){
                var ligne = $(this).parent().parent().parent();
                var id = ligne.attr('id');
                var firstname = ligne.children().get(2).innerHTML;
                var lastnamme = ligne.children().get(3).innerHTML;
                
                var res = confirm("Are you sure that you want to delete " 
                        + firstname + " " + lastnamme
                        + " from the application ?");
                if(res == true){
                    $.ajax({
                       type: "POST",
                       url: "./process/removeStudent.php",
                       data: {id: id}, // serializes the form's elements.
                       success: function(data)
                       {
                           if(data == "1"){
                              window.location.replace("./dashboard.php");
                           }else{
                               alert("An error occured when deleting the user. Please try again !");
                           }
                       }
                     });
                }
            });
        });
        
        
    </script>
</html>