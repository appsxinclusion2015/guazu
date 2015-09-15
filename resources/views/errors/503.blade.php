<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=640" />
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />

<head>
  <title>Aprendiendo en mi casa </title>
</head>
<body>
    <div class="container-fluid">
      <div class="row">
    <div class="imageMap" aria-haspopup="true">
      	<img src="/images/background/bg.jpg" class="img-responsive" alt="">
        </div>
    </div>
    </div>

</body>
<!-- modal consigna -->
<div id="modal-error" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
      <h1 style="font-size:80px;" class="text-center" >UPS!</h1>
    <div class="row">
  <div class="col-xs-6">
    <h1 style="font-size:29px;" >No encontramos la pagina que estas buscando. Puedes: </h1>
    <p><a style="font-size:25px;" href="/" class="btn btn-warning reiniciar">Recargar</a></p>
  </div>
  <div class="col-xs-6">
    <img class="img-responsive" src="/images/mono.png" />
  </div>    
    </div>
    
</div>

<!-- fin modal consigna -->
<script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script type="text/javascript"> 
$('#modal-error').modal({
  backdrop: 'static',
  keyboard: false
})
$('#modal-error').modal();

</script>
</html>
