$(window).on('load',function(){
  var RecoleccionJsEtiqueta = $('script[src*=alert]'); //toma los valores custom de tu llamada en blade
  var Cabecera = RecoleccionJsEtiqueta.attr('Cabecera');
  var TextoBajada = RecoleccionJsEtiqueta.attr('TextoBajada');
  var Redirec = RecoleccionJsEtiqueta.attr('Redirec');
  $('#idModal').modal({
      dismissible: false,
      opacity: 0.8
    });
  $('#idModal').modal('open');
  document.getElementById('Cabecera').innerHTML = Cabecera;//enviar datos de cabecera
  document.getElementById('TextoBajada').innerHTML = TextoBajada;//enviar datos de bajada
  document.getElementById('Redirec').href = Redirec;//enviar datos de redirección
});