$(document).ready(function() {
    var route = "/getministerios";
    ObtenerMinisterios(route);
    limpiar();
    var token = $('#token').val();
});

function ObtenerMinisterios(route) {
    $.ajax({
        url: route,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            renderTablaMinisterios(response);
            //console.log(response);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function renderTablaMinisterios(ministerios) {
    $('#ministeriosTable').DataTable({
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
        data: ministerios,
        columns: [{
            data: "id_ministerio"
        }, {
            data: "ministerio"
        },{
            data: function(data, type, row) {
                if (type === 'display') {
                    data = "<button class='btn btn-info m-l-10 m-r-10' data-id=" + data.id_ministerio + " onclick='AddMembers(" + data.id_ministerio + ");'>Añadir Miembros</button>";
                }
                return data;
            }            
        }, {
            data: function(data, type, row) {
                if (type === 'display') {
                    data = "<button class='btn btn-primary m-l-10 m-r-10' data-id=" + data.id_ministerio + " data-Editar='EditarMinisterio' data-target='#myModal' data-toggle='modal' onclick='EditMinisterio(" + data.id_ministerio + ");'>Editar</button><button class='btn btn-danger m-r-10' data-id=" + data.id_ministerio + " data-Eliminar='EliminarMiembro' onclick='Delete(" + data.id_ministerio + ");'>Eliminar</button>";
                }
                return data;
            }
        }]
    });
}

function limpiar() {
    $('#ministerio').val('');
    $('#id').val('');
}

function AddMinisterio() {
    var titulo = $('#title').html('');
    titulo.html('Agregar un Ministerio');
    var id = $('#id').val();
    var ministerio_new = $('#ministerio').val();
    var token = $('#token').val();
    var routeadd = "../ministerios";
    var routeget = "/getministerios";
    if (id == 0 || id == null) {
        $.ajax({
            url: routeadd,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            dataType: 'json',
            data: {
                ministerio: ministerio_new
            },
            error: function(error) {
                console.log(error.responseText);
                swal({
                    title: 'Error al registrar ministerio',
                    text: 'Reinicie su navegador y vuelva a intentar.',
                    type: 'info',
                    confirmButtonText: 'Continuar'
                });
            },
            success: function() {
                swal({
                    title: 'Registro Exitoso',
                    text: 'Ministerio registrado correctamente',
                    type: 'success',
                    confirmButtonText: 'Continuar'
                });
                ObtenerMinisterios(routeget);
                limpiar();
                $('#myModal').modal('toggle');
                var tabla = $('#ministeriosTable').DataTable();
                tabla.destroy();
            }
        });
    } else {
        Actualizar(id);
    }
}

function EditMinisterio(id) {
    var titulo = $('#title').html('');
    titulo.html('Editar Ministerio');
    var routeedit = '/ministerios/' + id + '/edit';
    $.ajax({
        url: routeedit,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#id').val(response.id_ministerio);
            $('#ministerio').val(response.ministerio);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function Actualizar(id) {
    var ministerio_new = $('#ministerio').val();
    var token = $('#token').val();
    var routeupdate = "/ministerios/" + id + "";
    var routeget = "/getministerios";
    $.ajax({
        url: routeupdate,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'PUT',
        dataType: 'json',
        data: {
            ministerio: ministerio_new
        },
        success: function(response) {
            swal({
                title: 'Registro Exitoso',
                text: 'Ministerio registrado correctamente',
                type: 'success',
                confirmButtonText: 'Continuar'
            });
            ObtenerMinisterios(routeget);
            limpiar();
            $('#myModal').modal('toggle');
            var tabla = $('#ministeriosTable').DataTable();
            tabla.destroy();
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function Delete(id) {
    var route = "/ministerios/" + id;
    var token = $('#token').val();
    var routeget = "/getministerios";
    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'DELETE',
        dataType: 'json',
        success: function(response) {
            swal({
                title: 'Ministerio eliminado',
                text: 'Se elimino correctamente.',
                type: 'success',
                confirmButtonText: 'Continuar'
            });
            ObtenerMinisterios(routeget);
            var tabla = $('#ministeriosTable').DataTable();
            tabla.destroy();
        },
        error: function(error) {
            console.log(error);
            swal({
                title: 'Error al eliminar ministerio',
                text: 'Reinicie su navegador y vuelva a intentar.',
                type: 'info',
                confirmButtonText: 'Continuar'
            });
        }
    });
}

function AddMembers(idMinisterio){
    window.location = "../ministerio/"+idMinisterio+"/miembros";
}