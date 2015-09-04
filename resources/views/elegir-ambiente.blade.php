<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=500, initial-scale=1">

<head>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
  <script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <title>Aprendiendo en Casa</title>
  <meta name="Description" content="Autores:Guazú.">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="imageMap" aria-haspopup="true">
        <p id="consigna" class="consigna"></p>
        <p id="consigna-centrada" class="consigna-centrada"></p>
        <img id="image-casa" src="/images/mockups/01.jpg" class="img-responsive" alt="">
        <form action="subir" method="post" >
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input name="foto" class="file" type="file" accept="image/*;capture=camera">
            <input type="submit" name="enviar" />
        </form>
      </div>
    </div>
  </div>
</body>
</html>