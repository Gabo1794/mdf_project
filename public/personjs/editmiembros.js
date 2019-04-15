$( document ).ready(function() {


});

$('body').delegate('input[type="checkbox"]', 'change', function (){
    var id = $(this).attr('id');
    if(this.checked) {
      $('#'+id).val(1);
    }
    else{
      $('#'+id).val(0);      
    }
});


$('body').delegate('#actualizar', 'click', function () {
	var id = $('#idMiembro').val();

  //Datos  Personales
  var nombre = $('#nombre').val();
  var app = $('#app').val();
  var apm = $('#apm').val();
  var edad = $('#edad').val();
  var fecha_nac = $('#fecha_nac').val();
  var fecha_esp = $('#fecha_esp').val();
  var correo = $('#correo').val();
  var direccion = $('#direccion').val();
  var tel = $('#tel_fijo').val();
  var cel = $('#tel_cel').val();
  //Crecimiento Espiritual
  var consolidacion = $('#consolidacion').val();
  var peniel = $('#peniel').val();
  var agua = $('#b_agua').val();
  var espiritu = $('#b_espiritu').val();
  var sanidad = $('#sanidad_total').val();
  var d07 = $('#d07').val();
  var fam = $('#fam').val();

  if (consolidacion == null || consolidacion == 0 || consolidacion == "on") { consolidacion = 0; }
  if (peniel == null || peniel == 0 || peniel == "on") { peniel = 0; }
  if (agua == null || agua == 0 || agua == "on") { agua = 0; }
  if (espiritu == null || espiritu == 0 || espiritu == "on") { espiritu = 0; }
  if (sanidad == null || sanidad == 0 || sanidad == "on") { sanidad = 0; }
  if (d07 == null || d07 == 0 || d07 == "on") { d07 = 0; }
  if (fam == null || fam == 0 || fam == "on") { fam = 0; }

    //Escuela de liderazgo
  var curso1 = $('#curso1').val();
  var curso2 = $('#curso2').val();
  var curso3 = $('#curso3').val();
  var curso4 = $('#curso4').val();
  var curso5 = $('#curso5').val();
  var curso6 = $('#curso6').val();
  var curso7 = $('#curso7').val();
    //Obervaciones
  var observaciones = $('#observaciones').val();

  var route = "/miembros/"+id;
  var token = $('#token').val();

  $.ajax({
  	url: route,
  	headers: {'X-CSRF-TOKEN': token},
  	type: 'PUT',
  	dataType: 'json',
    data: { 
      name: nombre,
      lastname: app,
      secondname: apm,
      edad: edad,
      fechan: fecha_nac,
      fechae: fecha_esp,
      email: correo,
      direccion: direccion,
      tel: tel,
      cel: cel,
      consolidacion: consolidacion,
      peniel: peniel,
      bagua: agua,
      bespiritu: espiritu,
      sanidad: sanidad,
      d07: d07,
      fam: fam,
      curso1: curso1,
      curso2: curso2,
      curso3: curso3,
      curso4: curso4,
      curso5: curso5,
      curso6: curso6,
      curso7: curso7,
      observaciones: observaciones
     },
     success: function(response){
     	if(response.mensaje == "Actualizado"){
     		redirect();
     	}
     },
     error: function(error){
     	console.log(error);
      swal({
        title: 'Error al actualizar miembro',
        text: 'Reinicie su navegador y vuelva a intentar.',
        type: 'info',
        confirmButtonText: 'Continuar'
      });     	
     }
  });




});

function redirect(mensaje){

      swal({
        title: 'Registro Exitoso',
        text: 'Miembro Registrado Correctamente',
        type: 'success',
        confirmButtonText: 'Continuar',
        showconfirmButtonButton: false
      })

	window.location = "/miembros"      

	

}