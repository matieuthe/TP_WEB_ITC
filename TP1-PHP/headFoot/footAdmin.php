    </body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
                        
            function resetFormAddStudent(e){
                e.preventDefault();
                $("#titleAddStudent").text("Add Student");
                $("#titleAddStudent").css('color','black');
                document.getElementById("formAddStudent").reset();
            }
            
            $('#buttonAddStudent').click(function(e){
                resetFormAddStudent(e);
                $('#modal2').modal();
            });

            $('#buttonAddPhoto').click(function(e){
                document.getElementById("formAddPhoto").reset();
                $('#modal1').modal();
            });
            
            $('#resetButton').click(resetFormAddStudent);
            
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
            
            $('.editButton').click(function(e){
                var ligne = $(this).parent().parent().parent();
                
                var id = ligne.attr('id');
                var firstname = ligne.children().get(2).innerHTML;
                var lastnamme = ligne.children().get(3).innerHTML;
                var sex = ligne.children().get(4).innerHTML;
                var phone = ligne.children().get(5).innerHTML;
                var email = ligne.children().get(6).innerHTML;
                var group = ligne.children().get(7).innerHTML;
                
                $('input[name=idEdit]').val(id);
                $('input[name=fnameEdit]').val(firstname);
                $('input[name=lnameEdit]').val(lastnamme);
                $('input[name=sexEdit]').val(sex);
                $('input[name=telEdit]').val(phone);
                $('input[name=emailEdit]').val(email);
                $('input[name=groupEdit]').val(group);
                
                $('#modalEdit').modal();
            });
            
            $('#formEditStudent').submit(function(e){
                e.preventDefault();
                var url = "./process/editStudent.php";
                $.ajax({
                       type: "POST",
                       url: url,
                       data: $("#formEditStudent").serialize(), // serializes the form's elements.
                       success: function(data)
                       {
                           if(data == 1) window.location.replace("./dashboard.php");
                           else{
                               alert("An error occured while updating the data. Please try agin !");
                           } 
                       }
                     });
            });
            
            $('.vueButton').click(function(e){
                var ligne = $(this).parent().parent().parent();
                
                var id = ligne.attr('id');
                var firstname = ligne.children().get(2).innerHTML;
                var lastnamme = ligne.children().get(3).innerHTML;
                var sex = ligne.children().get(4).innerHTML;
                var phone = ligne.children().get(5).innerHTML;
                var email = ligne.children().get(6).innerHTML;
                var group = ligne.children().get(7).innerHTML;
                
                $('input[name=idVue]').val(id);
                $('input[name=fnameVue]').val(firstname);
                $('input[name=lnameVue]').val(lastnamme);
                $('input[name=sexVue]').val(sex);
                $('input[name=telVue]').val(phone);
                $('input[name=emailVue]').val(email);
                $('input[name=groupVue]').val(group);
                
                $('#modalVue').modal();
            });
            
            $('#EditVue').click(function(e) {
                $('#modalVue').hide();
                
                //var ligne = $(this).parent().parent().parent();
                $('input[name=idEdit]').val($('input[name=idVue]').val());
                $('input[name=lnameEdit]').val($('input[name=lnameVue]').val());
                $('input[name=fnameEdit]').val($('input[name=fnameVue]').val());
                $('input[name=sexEdit]').val($('input[name=sexVue]').val());
                $('input[name=telEdit]').val($('input[name=telVue]').val());
                $('input[name=emailEdit]').val($('input[name=emailVue]').val());
                $('input[name=groupEdit]').val($('input[name=groupVue]').val());
                $('#modalEdit').modal();
                
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