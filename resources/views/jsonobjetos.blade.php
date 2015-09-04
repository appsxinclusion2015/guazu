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
    <a href="/test-json"> Cargar otra imagen </a>
    <a href="#" id="generar_json"> Generar json  </a>
    </div>
  </div>
</body>
<script type="text/javascript">


 
    $(document).ready(function()
    {
        var testObject = [];

        localStorage.setItem('cocina', JSON.stringify(testObject));
                    
        $("#generar_json").click(function()
        {
            var retrievedObject = localStorage.getItem('cocina');
            var otra_imagen = {
                "imagen_1": "taza.png",
                "nombre": "Taza"
            };
            var object_ = JSON.parse(retrievedObject);
            console.log('retrievedObject: ', object_);  
            object_.push(otra_imagen);
            localStorage.setItem("cocina",JSON.stringify(object_)); 
        });
    });
</script>
</html>