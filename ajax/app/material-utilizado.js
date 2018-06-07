
var objeto =  "material-utilizado";

function loadTabla(page,codigo){
    var parametros = {"action":"ajax","page":page,"codigo":codigo};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'../vista/modal/'+objeto1+'/listar.php',
      data: parametros,
       beforeSend: function(objeto1){
      $("#loader").html("<img src='../assets/img/loader.gif'>");
      },
      success:function(data){
        $("#tabla").html(data).fadeIn('slow');
        $("#loader").html("");
      }
    })
  }

  function loadTabla1(page,codigo){
    var parametros = {"action":"ajax","page":page,"codigo":codigo};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'../vista/modal/'+objeto2+'/listar.php',
      data: parametros,
       beforeSend: function(objeto2){
      $("#loader").html("<img src='../assets/img/loader.gif'>");
      },
      success:function(data){
        $("#tabla").html(data).fadeIn('slow');
        $("#loader").html("");
      }
    })
  }
 
 function loadCab(page,id){
    var parametros = {"action":"ajax","page":page,"id":id};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'../vista/modal/'+objeto1+'/cabecera.php',
      data: parametros,
       beforeSend: function(objeto1){
      $("#loaderCab").html("<img src='../assets/img/loader.gif'>");
      },
      success:function(data){
        $("#tablaCab").html(data).fadeIn('slow');
        $("#loaderCab").html("");
      }
    })
  }

$( "#agregar" ).submit(function( event ) {
var parametros = $(this).serialize();
var idnumero   = $("#idnumero").val();
$.ajax({
  type: "POST",
  url:'../controlador/tarea-ejecutar/agregar.php',
  data: parametros, 
   beforeSend: function(objeto){
    $("#mensaje").html("Mensaje: Cargando...");
    },
  success: function(datos){
  $("#mensaje").html(datos);//mostrar mensaje 
  //$('#agregar').modal('hide'); // ocultar  formulario
  //$("#agregar")[0].reset();  //resetear inputs
  $('#newModal').modal('hide');  // ocultar modal
  loadTabla(1,idnumero);

  }
});
event.preventDefault();
});


$( "#agregar1" ).submit(function( event ) {
var parametros = $(this).serialize();
var idnumero   = $("#idnumero").val();
$.ajax({
  type: "POST",
  url:'../controlador/'+objeto2+'/agregar_mu.php',
  data: parametros,
   beforeSend: function(objeto2){
    $("#mensaje").html("Mensaje: Cargando...");
    },
  success: function(datos){
  $("#mensaje").html(datos);//mostrar mensaje 
  //$('#agregar').modal('hide'); // ocultar  formulario
  //$("#agregar")[0].reset();  //resetear inputs
  $('#newModal1').modal('hide');  // ocultar modal
  loadTabla(1,idnumero);

  }
});
event.preventDefault();
});




$('#dataDelete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#id').val(id)
    })



$( "#eliminarDatos" ).submit(function( event ) {
    var parametros = $(this).serialize();
    var idnumero   = $("#idnumero").val();
       $.ajax({
          type: "POST",
          url:'../controlador/'+objeto+'/eliminar.php',
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
          $('#dataDelete').modal('hide');
          loadTabla(1,idnumero);

          }
      });
      event.preventDefault();
    });