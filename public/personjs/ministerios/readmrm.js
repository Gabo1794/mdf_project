$(document).ready(function() {
    var id = $('#idmrm').val();
    var route = "/getmrm/"+id;
    var routeRoles = "/getrol";
    //var token = $('#token').val();
    ObtenerRoles(routeRoles);
    ObtenerMinisteriosMiembros(route);
    limpiar();
});

function limpiar(){
    $('#miembro').val('');
    $('#miembroEdit').val('');
    $('#rol').val(0);
    $('#rolEdit').val(0);
}

function ObtenerRoles(routeRoles) {
    $.ajax({
        url: routeRoles,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            renderSelectRol(response);
            //console.log(response);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function renderSelectRol(roles){
    var select = $('#rol');
    var select2 = $('#rolEdit');
    select.append('<option value= "0">Selecciona un rol</option>');
    select2.append('<option value= "0">Selecciona un rol</option>');
    for(var i = 0; i < roles.length; i ++){
        select.append('<option value='+ roles[i].id_rol+'>'+ roles[i].rol+'</option>');
        select2.append('<option value='+ roles[i].id_rol+'>'+ roles[i].rol+'</option>');
    }
}


//easy auto-complete
var options = {
    url: "/getmiembros",

    getValue: "nombre",

    template: {
        type: "description",
        fields: {
            description: "ap_pat"
        }
    },

    list: {
        match: {
            enabled: true
        },
        onSelectItemEvent: function() {
            var selectedItemValue = $("#miembro").getSelectedItemData().id_miembro;

            $("#idmiembro").val(selectedItemValue).trigger("change");
        }        
    },

    theme: "plate-dark"
};
$("#miembro").easyAutocomplete(options);


var options = {
    url: "/getmiembros",

    getValue: "nombre",

    template: {
        type: "description",
        fields: {
            description: "ap_pat"
        }
    },

    list: {
        match: {
            enabled: true
        },
        onSelectItemEvent: function() {
            var selectedItemValue = $("#miembroEdit").getSelectedItemData().id_miembro;

            $("#idmiembroEdit").val(selectedItemValue).trigger("change");
        }        
    },

    theme: "plate-dark"
};
$("#miembroEdit").easyAutocomplete(options);
//fin easy

function ObtenerMinisteriosMiembros(route) {
    $.ajax({
        url: route,
        type: 'GET',
        dataType: 'json',
        error: function(error) {
            console.log(error.responseText);
            swal({
                title: 'Error al cargar los datos',
                text: 'Reinicie su navegador y vuelva a intentar.',
                type: 'info',
                confirmButtonText: 'Continuar'
            });
        },
        success: function(response) {
            console.log(response);
            renderTablaMRM(response);
            /*ObtenerM(routeget);
            limpiar();
            $('#myModal').modal('toggle');
            var tabla = $('#ministeriosTable').DataTable();
            tabla.destroy();*/
        }
    });
}

function renderTablaMRM(mrm) {
    $('#mrmTable').DataTable({
        "language": {
            sProcessing: "Cargando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
        },
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        responsive: true,
        data: mrm,
        columns: [{
            data: "id_mrm"
        }, {
            data: "nombre"
        },
        {
            data: "rol"
        },
        {
            data: function(data, type, row) {
                if (type === 'display') {
                    //data = "<button class='btn btn-info m-l-10 m-r-10' data-id=" + data.id_ministerio + " onclick='AddMembers(" + data.id_ministerio + ");'>Añadir Miembros</button>";
                    data = "<button class='btn btn-primary m-l-10 m-r-10' id='dataEdit' data-target='#myModalEdit' data-toggle='modal' data-idmrm="+data.id_mrm+" data-nombre='"+data.nombre+"' data-id_mimebro="+data.id_miembro+" data-id_rol="+data.id_rol+" data-activo='"+data.activo+"'>Editar</button>"
                }
                return data;
            }            
        }]
    });
}

/*
    CRUD
*/

/*Create*/
$('body').delegate('#CrearMRM','click', function (){
    var id = $('#idmiembro').val();
    var rol = $('#rol').val();
    var ministerio = $('#idmrm').val();
    var token = $('#token').val();
    var addroute = '/addMRM';

    //AJAX

    $.ajax({
        url: addroute,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'POST',
        dataType: 'json',
        data: {
            id: id,
            rol: rol,
            ministerio: ministerio
        },
        error: function(error) {
            console.log(error.responseText);
            swal({
                title: 'Error al registrar miembro en el ministerio',
                text: 'Reinicie su navegador y vuelva a intentar.',
                type: 'info',
                confirmButtonText: 'Continuar'
            });
        },
        success: function(response) {
            swal({
                title: 'Registro Exitoso',
                text: 'Miembro registrado en el ministerio correctamente',
                type: 'success',
                confirmButtonText: 'Continuar'
            });
            ObtenerMinisteriosMiembros("/getmrm/"+ministerio);
            limpiar();
            $('#myModal').modal('toggle');
            var tabla = $('#mrmTable').DataTable();
            tabla.destroy();
        }
    });    
});
/*Read*/
$('body').delegate('button[data-target="#myModalEdit"]', 'click', function (){

    var mrm = $(this).attr('data-idmrm');
    var miembro = $(this).attr('data-nombre');
    var id_miembro = $(this).attr('data-id_mimebro');
    var rol = $(this).attr('data-id_rol');
    var activo = $(this).attr('data-activo');
    $('#mrmEdit').val(mrm);
    $('#idmiembroEdit').val(id_miembro);
    $('#miembroEdit').val(miembro);
    $('#rolEdit').val(rol);
    if(activo === "S")
    {
        $('#activoInactivo').attr('checked', true);
    }
    if(activo === "N"){
        $('#activoInactivo').attr('checked', false);
    }
});

/* Update*/
$('body').delegate('#EditarMRM', 'click', function (){
    var ministerio = $('#idmrm').val();
    var mrm = $('#mrmEdit').val();
    var miembro = $('#idmiembroEdit').val();
    var rol = $('#rolEdit').val();
    var activo = "N";
    if($('#activoInactivo').prop('checked') == true){
        activo = "S";
    }
    var route = "/updateMRM/"+mrm;
    var token = $('#token').val();
    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'PUT',
        dataType: 'json',
        data: {
            id_mrm: mrm,
            id_miembro: miembro,
            id_rol: rol,
            activo: activo
        },
        success: function(response){
            swal({
                title: 'Registro Exitoso',
                text: 'Miembro actualizado en el ministerio correctamente',
                type: 'success',
                confirmButtonText: 'Continuar'
            });
            ObtenerMinisteriosMiembros("/getmrm/"+ministerio);
            limpiar();
            $('#myModalEdit').modal('toggle');
            var tabla = $('#mrmTable').DataTable();
            tabla.destroy();
        },
        error: function(error){
            console.log(error.responseText);
            swal({
                title: 'Error al actualizar miembro en el ministerio',
                text: 'Reinicie su navegador y vuelva a intentar.',
                type: 'info',
                confirmButtonText: 'Continuar'
            });
        }
    });
});