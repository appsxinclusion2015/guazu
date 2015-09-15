function isInArray(value, array) {
    return array.indexOf(value) > -1;
}

$(function() {
   
   var nivelCreado = new Object();
   var nroPregunta = 0;
   var fallo = 0;
   var cantidad_maxima_opciones = 6;
   var correctos = new Array();
   var incorrectos = new Array();
   var opciones = new Array();

   function getRandomInt(min, max){
      return Math.floor(Math.random() * (max - min + 1)) + min;
   }  
   
   
   // lo dejo para usar "otros" (son los objetos q no corresponden a los ambientes) 
   $.getJSON("/config/objetos.json").done(function(data) {

      var ambiente = 'cocina';
      var otros_ambientes = 'otros';
      console.log('')
      $.each(data[otros_ambientes], function(index)
      {
         incorrectos.push(data[otros_ambientes][index]);
         opciones.push(data[otros_ambientes][index]);
      });
      data[ambiente] = JSON.parse(localStorage.getItem('baño'));
      console.log("data ambiente")
      console.log(JSON.stringify(data[ambiente]))
      var range          = [0, (data.length - 1) ];
      var no_repeat = new Array();
      var cont_agrego = 0;
      /* cargamos 4 objetos correctos */
      do 
      {
         var random_correcto  = getRandomInt(range[0], data[ambiente].length - 1 );
         
          console.log(random_correcto);
         
         if (!(isInArray(random_correcto, no_repeat)))
         {
            console.log("Objetos correctos")
            correctos.push(data[ambiente][random_correcto].nombre);
            opciones.push(data[ambiente][random_correcto]);
            no_repeat.push(random_correcto);
            cont_agrego++;
         }

      } while (cont_agrego < 4);   
      
      /* DESORDENAR OBJETOS A MOSTRAR (opciones) */
      opciones = opciones.sort(function()
      {
            return Math.random() - 0.5
      });      
      console.log(opciones)

    
      $(".arrastrar-respuesta").css("display", "none");
      $("#consigna-centrada").empty().append(("TITULO ").toUpperCase());
     
     // $(".hotspots").append('<a class="imagen5 mostrar_seleccionada" style="background-image:url(/images/objetos/cocina.jpg)"></a>');
      $("#sonido").css("display", "none"); 

      setTimeout(function()
      {
         console.log(" inicio seleccion")
         $(".hotspots").empty();
         $("#mesainicial").addClass('mesa').removeClass('mesa-objetos');
         $("#sonido").css("display", "block"); 
         $(".arrastrar-respuesta").css("display", "block"); 
         $("#consigna-centrada").empty();
         //(data[ambiente][correcta].nombre).toUpperCase()
         //$("#consigna").append('<p>Coloca en la mesa<p/>');
         $("#consigna").addClass('consigna-cocina');
         $("#cuadro").addClass('cuadro-blanco');
         responsiveVoice.speak('arrastra los elementos que usas en el banio', "Spanish Female")
         var margin = 15;
         // mostramos todos los objetos. Siempre seran 6 por el momento
         for(var x=0; x < cantidad_maxima_opciones; x++)
         {

            var imagen_objeto = opciones[x].imagen;
            margin = margin + 9;
            console.log(opciones[x].nombre)
            $(".hotspots").append('<a href="#" id="'+opciones[x].nombre+'" class="imagen0 objeto" style="top:71%;left:' + margin + '%;background:url('+imagen_objeto+'); background-repeat:no-repeat;"></a>');
            //'style="top:45%;left:' + margin + '%" id='+opciones[x].nombre+''$(".imagen0").css()
         }

         var generar_preguntas = new Array();
         generar_preguntas[0] = {correctos_init: correctos, objetos_init: opciones};
         console.log(generar_preguntas);
         nivelCreado = create_nivel(generar_preguntas, data[ambiente]);
         listaObjetos = data[ambiente];
         nroCantidadVeces = 3;
    },6000);
  })   
  
   var intermitente;

   function eventoSoltar(ev, obj) {
      
      console.log("type of")
      console.log(nivelCreado[nroPregunta])
      if(typeof(nivelCreado[nroPregunta]) === "undefined") {
         obj.revert();
         return;
      }
     
      if (obj.activeDropRegions.length > 0) {
         soltoObjetoBien(obj)
      }else{
         return false;
         obj.revert();
      }
   }
   var margin_objetos_mesa = 33;
   function esAcierto(objeto_arrastrado) {
      //var correcta = nivelCreado[nroPregunta].acierto;
    
      //$("#" + correcta).attr('style', 'border-radius: 95px; border: 0px solid green');
      $("#acierto").modal("show");
      //$(".arrastrar-respuesta").css('background-color','green');
      var bg = objeto_arrastrado.css('background-image');
      console.log('bg '+ bg)
      objeto_arrastrado.remove();
       $(".hotspots").append('<a href="#" class="imagen0 objeto animated bounceIn" style="top:28%;left:' + margin_objetos_mesa + '%;background-image:'+bg+'"></a>');
      margin_objetos_mesa = margin_objetos_mesa + 8;
      soundManager.play('sonidoAcierto')
      fallo = 0;
      setTimeout(function()
      {
         $("#acierto").modal("hide")
         soundManager.pause('sonidoAcierto')
      }, 3000);
   }

   function esFallo(obj) {
      var correctas = nivelCreado[nroPregunta].aciertos;
      
      obj.revert();
      fallo++;
      if (fallo > 0)
      {
         $.each(correctas,function(index,valor)
         {
            $( ".hotspots a[id='"+ valor +"']" ).removeClass("animated").removeClass("bounceIn").addClass('animated bounceIn');
         });
         /*$("#" + correcta).addClass("dance");
            setTimeout(function() {
               $("#" + correcta).removeClass("dance")
            }, 300);*/
         
      }
       return false;
   }

   var aciertos_realizados = 0;
   function soltoObjetoBien(obj)
   {
      console.log("solto objeto bien")

      console.log((obj.$el).attr('id'));
      if (isInArray((obj.$el).attr('id'),nivelCreado[nroPregunta].aciertos)){
    
         esAcierto((obj.$el));
         aciertos_realizados++;
      } else {
         if (!esFallo(obj)) return false;
      }

      if (aciertos_realizados >= 4)
      {
         setTimeout(function() {$("#continuar").modal({backdrop:'static',keyboard:false, show:true});}, 2500);
      }
      
   }
   

   function randomPosition(obj){
      var randomPosition;
      for (var a = obj, i = a.length; i--;) {
         randomPosition = a.splice(Math.floor(Math.random() * (i + 1)), 1)[0];
         obj = a
         break;
      }
      return randomPosition;
   }

   function shuffle(o) {
      for (var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
      return o;
   };

   function evalResultados(result) {
         
     
   }
   // ambiente seria el json con cocina / dormitorio 
   function create_nivel(preguntas, ambiente)
   {
      var infopregunta = new Object();
      var i = 0;
      // En esta demo siempre habra una sola consigna
      $.each(preguntas, function(data)
      {
         //alert(this.correcto);
        // var objs = this.objetos_init;
         var objetos_matriz = this.objetos_init;
         var imagenes = new Array();
         infopregunta[i] = { aciertos: this.correctos_init };
         console.log('INIT PREGUNTAS')
         $.each(objetos_matriz, function(index, value)
         {

            if (typeof(value) != "undefined")
            {
               console.log('value not undefined')
               console.log(value.ruta)
               //imagenes[index] = { img: value.ruta };
               if (i == 0)
               {
                  console.log($(".contenedorPreguntas").find("a").eq(index).attr('class'));
                  $(".contenedorPreguntas").find("a").eq(index).pep({
                     droppable: '.drop-target',
                     overlapFunction: false,
                     useCSSTranslation: false,
                     start: function(ev, obj) {
                        obj.noCenter = true;
                     },
                     revert: false,
                     revertIf: function(ev, obj) {
                        return !this.activeDropRegions.length;
                     },
                     drag: function(ev, obj) {
                        var vel = obj.velocity();
                        var rot = (vel.x) / 5;
                        rotate(obj.$el, rot)

                     },
                     stop: function(ev, obj) {
                        rotate(obj.$el, 0)
                        eventoSoltar(ev, obj)
                     }
                  });
               }
            }
        
         });

         //infopregunta[i].imagenes = imagenes;
         i++;
      });
      return infopregunta;
   }

   function rotate($obj, deg) {
      $obj.css({
         "-webkit-transform": "rotate(" + deg + "deg)",
         "-moz-transform": "rotate(" + deg + "deg)",
         "-ms-transform": "rotate(" + deg + "deg)",
         "-o-transform": "rotate(" + deg + "deg)",
         "transform": "rotate(" + deg + "deg)"
      });
   }
});

