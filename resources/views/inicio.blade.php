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
  <script src="/assets/voice/responsivevoice.js"></script>
  <script type="text/javascript" src="/assets/sound/soundmanager2.js"></script>
  <title>Aprendiendo en Casa</title>
  <meta name="Description" content="Autores:Guazú.">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="imageMap" aria-haspopup="true">
        <div id='sonido' class='diva animacion icono-voz'></div>
        <p id="consigna" class="consigna"></p>
        <p id="consigna-centrada" class="consigna-centrada"></p>
        <img  id="image-casa" src="/images/background/bg-inicio.jpg" class="img-responsive" alt="">
        <a  class='animacion consigna-casa'></a>

      </div>
    </div>
  </div>
  <div id="consignaHablada">
    <video id="consigna" controls="" autoplay="false" name="media">
      <source src="" type="audio/mpeg">
    </video>
  </div>
  </div>
</body>
<script type="text/javascript" src="/js/opciones.js"></script>
<script type="text/javascript">
    $(".imageMap").css('cursor','pointer').click(function()
    {
       location.href = '/jugar';
    });
</script>
</html>