    </body>
      <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type='text/javascript'>
        function init_map(){
            var myOptions = {
                zoom:10,
                center:new google.maps.LatLng(48.12369330250327,-1.6324624481063488),
                mapTypeId: google.maps.MapTypeId.ROADMAP};
                map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);

                marker = new google.maps.Marker({
                    map: map,
                    position: new google.maps.LatLng(48.12369330250327,-1.6324624481063488)
                });

                infowindow = new google.maps.InfoWindow({
                    content:'<strong>Ouest INSA</strong><br>Rennes, France<br>'
                });

                google.maps.event.addListener(marker, 'click', function(){
                    infowindow.open(map,marker);
                });
                infowindow.open(map,marker);
            }
            google.maps.event.addDomListener(window, 'load', init_map);
    </script>
    <script>
        //Fonction qui permet à la carte de s'adapter à la taille de l'écran
        function dimensionner(){
        //var largeur = document.body.clientWidth;
        var hauteur = window.innerHeight-document.getElementById("navigation").offsetHeight;
        /*document.getElementById("contenu").style.width = "100%";//largeur+"px";
        document.getElementById("gmap_canvas").style.width = "100%";//largeur+"px";*/
        document.getElementById("contenu").style.height = hauteur+"px";
        document.getElementById("gmap_canvas").style.maxHeight = hauteur+"px";
        }

        window.onload = dimensionner;
        window.onresize = dimensionner;
        $(".button-collapse").sideNav();
    </script>
</html>