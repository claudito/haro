var objeto =  "orden_trabajo_detalle";

function loadTabla(page,codigo){
    var parametros = {"action":"ajax","page":page,"codigo":codigo};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'../vista/modal/'+objeto+'/listar.php',
      data: parametros,
       beforeSend: function(objeto){
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
      url:'../vista/modal/'+objeto+'/listar.php',
      data: parametros,
       beforeSend: function(objeto){
      $("#loader").html("<img src='../assets/img/loader.gif'>");
      },
      success:function(data){
        $("#tabla").html(data).fadeIn('slow');
        $("#loader").html("");
      }
    })
  }

  function loadTabla2(page,codigo){
    var parametros = {"action":"ajax","page":page,"codigo":codigo};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'../vista/modal/'+objeto+'/listar.php',
      data: parametros,
       beforeSend: function(objeto){
      $("#loader").html("<img src='../assets/img/loader.gif'>");
      },
      success:function(data){
        $("#tabla").html(data).fadeIn('slow');
        $("#loader").html("");
      }
    })
  }

    function loadTabla3(page,codigo){
    var parametros = {"action":"ajax","page":page,"codigo":codigo};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'../vista/modal/'+objeto+'/listar.php',
      data: parametros,
       beforeSend: function(objeto){
      $("#loader").html("<img src='../assets/img/loader.gif'>");
      },
      success:function(data){
        $("#tabla").html(data).fadeIn('slow');
        $("#loader").html("");
      }
    })
  }
 
 function loadCab(page,codigo){
    var parametros = {"action":"ajax","page":page,"codigo":codigo};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'../vista/modal/'+objeto+'/cabecera.php',
      data: parametros,
       beforeSend: function(objeto){
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
  url:'../controlador/'+objeto+'/agregar.php',
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
  url:'../controlador/'+objeto+'/agregar1.php',
  data: parametros,
   beforeSend: function(objeto){
    $("#mensaje").html("Mensaje: Cargando...");
    },
  success: function(datos){
  $("#mensaje").html(datos);//mostrar mensaje 
  //$('#agregar1').modal('hide'); // ocultar  formulario
  //$("#agregar1")[0].reset();  //resetear inputs
  $('#newModal1').modal('hide');  // ocultar modal
  loadTabla(1,idnumero);

  }
});
event.preventDefault();
});


$( "#agregar2" ).submit(function( event ) {
var parametros = $(this).serialize();
var idnumero   = $("#idnumero").val();
$.ajax({
  type: "POST",
  url:'../controlador/'+objeto+'/agregar2.php',
  data: parametros,
   beforeSend: function(objeto){
    $("#mensaje").html("Mensaje: Cargando...");
    },
  success: function(datos){
  $("#mensaje").html(datos);//mostrar mensaje 
  //$('#agregar1').modal('hide'); // ocultar  formulario
  //$("#agregar1")[0].reset();  //resetear inputs
  $('#newModal2').modal('hide');  // ocultar modal
  loadTabla(1,idnumero);

  }
});
event.preventDefault();
});


$( "#agregar3" ).submit(function( event ) {
var parametros = $(this).serialize();
var idnumero   = $("#idnumero").val();
$.ajax({
  type: "POST",
  url:'../controlador/'+objeto+'/agregar3.php',
  data: parametros,
   beforeSend: function(objeto){
    $("#mensaje").html("Mensaje: Cargando...");
    },
  success: function(datos){
  $("#mensaje").html(datos);//mostrar mensaje 
  //$('#agregar1').modal('hide'); // ocultar  formulario
  //$("#agregar1")[0].reset();  //resetear inputs
  $('#newModal3').modal('hide');  // ocultar modal
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

$('#dataDelete1').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#id').val(id)
    })

$('#dataDelete2').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#id').val(id)
    })

$('#dataDelete3').on('show.bs.modal', function (event) {
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

$( "#eliminarDatos1" ).submit(function( event ) {
    var parametros = $(this).serialize();
    var idnumero   = $("#idnumero").val();
       $.ajax({
          type: "POST",
          url:'../controlador/'+objeto+'/eliminar1.php',
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
          $('#dataDelete1').modal('hide');
          loadTabla(1,idnumero);

          }
      });
      event.preventDefault();
    });

$( "#eliminarDatos2" ).submit(function( event ) {
    var parametros = $(this).serialize();
    var idnumero   = $("#idnumero").val();
       $.ajax({
          type: "POST",
          url:'../controlador/'+objeto+'/eliminar2.php',
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
          $('#dataDelete2').modal('hide');
          loadTabla(1,idnumero);

          }
      });
      event.preventDefault();
    });



$( "#eliminarDatos3" ).submit(function( event ) {
    var parametros = $(this).serialize();
    var idnumero   = $("#idnumero").val();
       $.ajax({
          type: "POST",
          url:'../controlador/'+objeto+'/eliminar3.php',
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
          $('#dataDelete3').modal('hide');
          loadTabla(1,idnumero);

          }
      });
      event.preventDefault();
    });