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
  <div class="container-fluid">
    <div class="row">
      <div class="imageMap" aria-haspopup="true">
        <div id='sonido' class='diva animacion icono-voz'></div>
        <p id="consignaHablada" class="consigna"></p>
        <img id="fondoCarga" src="/images/background/carga-bg-banio.jpg" class="img-responsive" alt="">
        <div class="hotspots contenedorPreguntas"></div>
          <a id="fondo" class="centro drop-target"></a>
          <a id="consigna"class="consigna-juego"></a>
      </div>
    </div>
  </div>
  <div id="consignaHablada">
    <video id="consigna" controls="" autoplay="false" name="media">
      <source src="" type="audio/mpeg">
    </video>
  </div>
  </div>
  <div id="acierto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <img class="img-responsive animacion centrar-modal-acierto" src="/images/imagenes/correcto.png"></img>
      </div>
    </div>
  </div>
</body>
<div id="continuar" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm centrar-modal-paso-nivel">
    <div class="modal-content">
      <img class="img-responsive" src="/images/imagenes/nivel-completado.png"></img>
      <a type="button" href="/inicio" class="btn btn-lg btn-warning btn-nivel-completado">JUEGA OTRA VEZ</a>
    </div>
  </div>
</div>
<script type="text/javascript" src="/js/opciones.js"></script>
<script type="text/javascript" src="/js/juego.js"></script>

</html>