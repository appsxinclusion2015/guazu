<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=500, initial-scale=1">

<head>
  <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="/css/juego.css" />
  <link rel="stylesheet" type="text/css" href="/css/animate.css" />
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
  <script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/assets/jquery.pep.js-master/src/jquery.pep.js"></script>
  <script src="/assets/voice/responsivevoice.js"></script>
  <script type="text/javascript" src="/assets/sound/soundmanager2.js"></script>
  <title>Aprendiendo en Casa</title>
  <meta name="Description" content="Autores:Guazú.">
</head>

<body>
  <div>
    <div id="clouds">
      <div class="cloud x1"></div>
    	<div class="cloud x2"></div>
    	<div class="cloud x3"></div>
    	<div class="cloud x4"></div>
    	<div class="cloud x5"></div>
    </div>
  </div>
  <div class="imageFondo" aria-haspopup="true">

    <p class="container-casa">
        <img id="image-logo" src="/images/imagenes/casa.png" class="img-responsive" alt="">
    </p>
    <a id="casa_cocina" class="casa-cocina"></a>
    <a id="casa_banio" class="casa-banio"></a>
    <a id="casa_living" class="casa-living"></a>
    <a id="casa_dormitorio" class="casa-dormitorio"></a>

    <a class="consigna img-cosigna-casa"></a>
    <img id="image-casa" src="/images/background/bg.png" class="img-responsive" alt="">
  </div>
</body>

<script type="text/javascript" src="/js/opciones.js"></script>
<script type="text/javascript">
    $("#casa_cocina").click(function(){
      location.href = '/cargar-imagenes/cocina';
    });
    
    $("#casa_living").click(function(){
      location.href = '/cargar-imagenes/living';
    });
    
    $("#casa_banio").click(function(){
      location.href = '/cargar-imagenes/baño';
    });
     $("#casa_dormitorio").click(function(){
      location.href = '/cargar-imagenes/dormitorio';
    });
</script>


</html>