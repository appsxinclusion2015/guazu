    function createCookie(name, value, days) {
       if (days) {
          var date = new Date();
          date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
          var expires = "; expires=" + date.toGMTString();
       }
       else var expires = "";
       document.cookie = name + "=" + value + expires + "; path=/";
    }

    function readCookie(name) {
       var nameEQ = name + "=";
       var ca = document.cookie.split(';');
       for (var i = 0; i < ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') c = c.substring(1, c.length);
          if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
       }
       return null;
    }

    function eraseCookie(name){
       createCookie(name, "", -1);
    }

    function loopSound(sound, times) {
       var current = 0;
       _loopSound(sound, times, current);

       function _loopSound(sound, times, current) {
          if (++current <= times) {
             sound.play({
                onfinish: function() {
                   _loopSound(sound, times, current);
                }
             });
          }
       }
    }
    var sonidoFondo;
    $(document).ready(function() {
       var sonidoAcierto;
       
       soundManager.setup({
          url: '/public/assets/sound/swf/',
          onready: function() {
             sonidoFondo = soundManager.createSound({
                id: 'sonidoFondo',
                url: '/public/sonidos/musica1.mp3'
             });
             sonidoAcierto = soundManager.createSound({
                id: 'sonidoAcierto',
                url: '/public/sonidos/aplauso.mp3'
             });
             var cookiesound = readCookie("sonidofondo");
             console.log(cookiesound);
             /*if (cookiesound != 1)
                loopSound(sonidoFondo, 10000);
            else
               $("#musica").addClass('icono-musica-off')*/
          },
          ontimeout: function() {
             // Hrmm, SM2 could not start. Missing SWF? Flash blocked? Show an error, etc.?
          }
       });
    });

    $("body").on("click", "#musica", function(e) {
       console.log("click")
       e.stopImmediatePropagation();
       soundManager.stopAll();
       if ($(this).hasClass('icono-musica-off')) {
          eraseCookie("sonidofondo");
          loopSound(sonidoFondo, 10000);
          $(this).removeClass('icono-musica-off').addClass('icono-musica');

       }
       else {
          createCookie("sonidofondo", 1, 1);
          $(this).addClass('icono-musica-off');
       }

    });
    $.get("/opciones/modal", function(data) {
       $("body").append(data);
       $("#menu").click(function(event) {
          $('#opciones').modal('show');
       });
    });
    $("body").on("click", "#sonido", function(e) {
       e.stopImmediatePropagation();
       responsiveVoice.speak($(".consigna").text(), "Spanish Female")
    });
    
    $("body").on("click", "#sonido2", function(e) {
       e.stopImmediatePropagation();
       responsiveVoice.speak($(".consigna2").text(), "Spanish Female")
    });
    