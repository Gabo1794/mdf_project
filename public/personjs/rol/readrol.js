$(document).ready(function() {
    var route = "/getrol";
    ObtenerRol(route);
    var token = $('#token').val();
    limpiar();
});

function ObtenerRol(route) {
    $.ajax({
        url: route,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            renderTablaRol(response);
            //console.log(response);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function renderTablaRol(rol) {
    $('#rolTable').DataTable({
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
        data: rol,
        columns: [{
            data: "id_rol"
        }, {
            data: "rol"
        }, {
            data: function(data, type, row) {
                if (type === 'display') {
                    data = "<button class='btn btn-primary m-l-10 m-r-10' data-id=" + data.id_rol + " data-target='#myModal' data-toggle='modal' onclick='EditMinisterio(" + data.id_rol + ");'>Editar</button><button class='btn btn-danger m-r-10' data-id=" + data.id_rol + "  onclick='Delete(" + data.id_rol + ");'>Eliminar</button>";
                }
                return data;
            }
        }]
    });
}

function limpiar() {
    $('#rol').val('');
    $('#id').val('');
}

function AddRol() {
    var titulo = $('#title').html('');
    titulo.html('Agregar Rol');
    var id = $('#id').val();
    var rol_new = $('#rol').val();
    var token = $('#token').val();
    var routeadd = "/rol";
    var routeget = "/getrol";
    if (id == 0 || id == null) {
        $.ajax({
            url: routeadd,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            dataType: 'json',
            data: {
                rol: rol_new
            },
            error: function(error) {
                console.log(error.responseText);
                swal({
                    title: 'Error al registrar el rol',
                    text: 'Reinicie su navegador y vuelva a intentar.',
                    type: 'info',
                    confirmButtonText: 'Continuar'
                });
            },
            success: function() {
                swal({
                    title: 'Registro Exitoso',
                    text: 'Rol registrado correctamente',
                    type: 'success',
                    confirmButtonText: 'Continuar'
                });
                ObtenerRol(routeget);
                limpiar();
                $('#myModal').modal('toggle');
                var tabla = $('#rolTable').DataTable();
                tabla.destroy();
            }
        });
    } else {
        Actualizar(id);
    }
}

function EditRol(id) {
    var titulo = $('#title').html('');
    titulo.html('Editar Rol');
    var routeedit = '/rol/' + id + '/edit';
    $.ajax({
        url: routeedit,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#id').val(response.id_rol);
            $('#rol').val(response.rol);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function Actualizar(id) {
    var rol_new = $('#rol').val();
    var token = $('#token').val();
    var routeupdate = "/rol/" + id + "";
    var routeget = "/getrol";
    $.ajax({
        url: routeupdate,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'PUT',
        dataType: 'json',
        data: {
            rol: rol_new
        },
        success: function(response) {
            swal({
                title: 'Registro Exitoso',
                text: 'Rol registrado correctamente',
                type: 'success',
                confirmButtonText: 'Continuar'
            });
            ObtenerRol(routeget);
            limpiar();
            $('#myModal').modal('toggle');
            var tabla = $('#rolTable').DataTable();
            tabla.destroy();
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function Delete(id) {
    var route = "/rol/" + id;
    var token = $('#token').val();
    var routeget = "/getrol";
    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'DELETE',
        dataType: 'json',
        success: function(response) {
            swal({
                title: 'Rol eliminado',
                text: 'Se elimino correctamente.',
                type: 'success',
                confirmButtonText: 'Continuar'
            });
            ObtenerRol(routeget);
            var tabla = $('#rolTable').DataTable();
            tabla.destroy();
        },
        error: function(error) {
            console.log(error);
            swal({
                title: 'Error al eliminar rol',
                text: 'Reinicie su navegador y vuelva a intentar.',
                type: 'info',
                confirmButtonText: 'Continuar'
            });
        }
    });
}