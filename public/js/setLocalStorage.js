(function() {
    var idClick, ambiente = decodeURIComponent(window.location.href.split('/').pop());
    $("#imageMap").on("click", ".cargar-imagenes", function(e) {
        idClick = $(e.target).attr("id");
        $("#uploadPhoto").trigger("click");

    });
    $("#uploadPhoto").on("change", function() {
        readImage(ambiente, this, idClick);
    });

    function readImage(ambiente, input, id) {
        if (ambiente != "cocina" &&
            ambiente != "living" &&
            ambiente != "dormitorio" &&
            ambiente != "baño") return false;
        if (input.files && input.files[0]) {
            var FR = new FileReader();
            FR.onload = function(e) {
                var oldItems = JSON.parse(localStorage.getItem(ambiente)) || [];
                var index = 0;
                var image = {
                    "imagen": resizeAndBase64(id, e),
                    "nombre": id
                }
                while(oldItems[index]){
                    if(oldItems[index].nombre == id ) break;
                    index++;
                }
                console.log(index +" / "+ oldItems.length);
                if(index == oldItems.length){
                    oldItems.push(image);
                }else{
                    
                    oldItems.splice(index, 1, image)
                }
                
                
                
                localStorage.setItem(ambiente, JSON.stringify(oldItems));
                $("#" + id + "_cargada").css("background-image", 'url(' + resizeAndBase64(id, e) + ')')
                $("#" + id + "_cargada").css("background-repeat", 'no-repeat')
                $("#" + id + "_cargada").css("background-size", 'cover')
            };
            FR.readAsDataURL(input.files[0]);
        }
    }

    function resizeAndBase64(id, e) {
        var img = document.createElement("img");
        img.src = e.target.result;
        var canvas = document.createElement("canvas");
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);
        if (id == "fondo") {
            var MAX_WIDTH = 679;
            var MAX_HEIGHT = 399
        }
        else {
            var MAX_WIDTH = 108;
            var MAX_HEIGHT = 87;
        }

        var width = img.width;
        var height = img.height;
        if (width > height) {
            if (width > MAX_WIDTH) {
                height *= MAX_WIDTH / width;
                width = MAX_WIDTH;
            }
        }
        else {
            if (height > MAX_HEIGHT) {
                width *= MAX_HEIGHT / height;
                height = MAX_HEIGHT;
            }
        }
        canvas.width = width;
        canvas.height = height;

        ctx.drawImage(img, 0, 0, width, height);
        return canvas.toDataURL("image/png");
    }

    if (localStorage.length) {
        console.log(JSON.parse(localStorage.getItem('cocina')))
    }
}());