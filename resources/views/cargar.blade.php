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
        <a id="fondo_cargada" class="fondo_cargada"></a>
       
        <a id="imagen_1" class="imagen_1 drop-target cargar-imagenes"></a>
        <a id="imagen_1_cargada" class="imagen_1_cargada"></a>

        <a id="imagen_2" class="imagen_2 drop-target cargar-imagenes"></a>
        <a id="imagen_2_cargada" class="imagen_2_cargada "></a>
        
        <a id="imagen_3" class="imagen_3 drop-target cargar-imagenes"></a>
        <a id="imagen_3_cargada" class="imagen_3_cargada "></a>
        
        <a id="imagen_4" class="imagen_4 drop-target cargar-imagenes"></a>
        <a id="imagen_4_cargada" class="imagen_4_cargada "></a>
        
        <a id="imagen_5" class="imagen_5 drop-target cargar-imagenes"></a>
        <a id="imagen_5_cargada" class="imagen_5_cargada"></a>
 
        <form action="subir" method="post" >
            <input style="display:none;"  id="uploadPhoto" name="foto" class="file" type="file" accept="image/*;capture=camera">
        </form>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript" src="/js/setLocalStorage.js"></script>
</html>