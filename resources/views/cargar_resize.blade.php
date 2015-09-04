<!DOCTYPE html>
<html lang="es">
<meta name="viewport" content="width=500, initial-scale=1">
<head>
  <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="/css/juego.css" />
  <link rel="stylesheet" type="text/css" href="/css/animate.css" />
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
  <script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <title>Aprendiendo en Casa</title>
  <meta name="Description" content="Autores:Guazú.">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div id="imageMap" class="imageMap" aria-haspopup="true">
        <p id="consigna" class="consigna"></p>
        <p id="consigna-centrada" class="consigna-centrada"></p>
        <img id="image-casa" src="/images/mockups/02.jpg" class="img-responsive" alt="">
        <img id="image-cargada" src="" class="img-responsive" alt="">

        <a id="fondo" class="fondo drop-target cargar-imagenes"></a>
        <a id="fondo_cargado" class="fondo_cargado"></a>
       
        <a id="imagen_1" class="imagen_1 drop-target cargar-imagenes"></a>
        <a id="imagen_1" class="imagen_1_cargada drop-target"></a>

        <a id="imagen_2" class="imagen_2 drop-target cargar-imagenes"></a>
        <a id="imagen_2_cargada" class="imagen_2_cargada "></a>
        
        <a id="imagen_3" class="imagen_3 drop-target cargar-imagenes"></a>
        <a id="imagen_3_cargada" class="imagen_3_cargada "></a>
        
        <a id="imagen_4" class="imagen_4 drop-target cargar-imagenes"></a>
        <a id="imagen_4_cargada" class="imagen_4_cargada "></a>
        
        <a id="imagen_5" class="imagen_5 drop-target cargar-imagenes"></a>
        <a id="imagen_5_cargada" class="imagen_5_cargada"></a>
 
        <form action="subir" method="post" >
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input id="uploadPhoto" name="foto"  class="file" type="file" accept="image/*;capture=camera">
            <input type="submit" name="enviar" />
        </form>
      </div>
    </div>
  </div>
</body>
<script>
  
  function readImage(input, id) {
    if ( input.files && input.files[0] ) {
      var FR= new FileReader();
      var img = document.createElement("img");
      var dataurl;
      FR.onload = function(e) {
    //   var image = {};
     //  image[id] = e.target.result;
     //  image["nombre"] = id;
      // var oldItems = JSON.parse(localStorage.getItem('cocina')) || [];

    
        img.src = e.target.result;

        var canvas = document.createElement("canvas");
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);

        var MAX_WIDTH = 300;
        var MAX_HEIGHT = 100;
        var width = img.width;
        var height = img.height;

        if (width > height) {
            if (width > MAX_WIDTH) {
                height *= MAX_WIDTH / width;
                width = MAX_WIDTH;
            }
        } else {
            if (height > MAX_HEIGHT) {
                width *= MAX_HEIGHT / height;
                height = MAX_HEIGHT;
            }
        }
        canvas.width = width;
        canvas.height = height;

        ctx.drawImage(img, 0, 0, width, height);

        dataurl = canvas.toDataURL("image/png");
        document.getElementById('image-casa').src = dataurl;  
      
      
       oldItems.push(image);
       localStorage.setItem( 'cocina', JSON.stringify(oldItems) );
      
        
      };       
      FR.readAsDataURL( input.files[0] );
    }
  }
  
  $("#imageMap").on("click", ".cargar-imagenes", function(e){
    var idClick = $(e.target).attr("id");
    $("#uploadPhoto").trigger("click");
    $("#uploadPhoto").change(function(){
        readImage( this , idClick);
    });
  });
  
  
  
  
  
  
  
  if(localStorage.length){
    $("#image-casa").attr("src", JSON.parse(localStorage.getItem('cocina'))[0]["imagen_4"]);
  }
  
</script>
</html>