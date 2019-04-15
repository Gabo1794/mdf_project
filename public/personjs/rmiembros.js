$(document).ready(function() {
    var route = "/getmiembros";
    ObtenerMiembros(route);
    var token = $('#token').val();
});

function ObtenerMiembros(route) {
    $.ajax({
        url: route,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            renderTablaMiembros(response);
            //console.log(response);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function renderTablaMiembros(miembros) {
    var miembro = miembros;
    $('#miembrosTable').DataTable({
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
        data: miembro,
        columns: [{
            data: "nombre"
        }, {
            data: "ap_pat"
        }, {
            data: "email"
        }, {
            data: "edad"
        }, {
            data: function(data, type, row) {
                if (type === 'display') {
                    data = "<button class='btn btn-primary m-l-10 m-r-10' data-id=" + data.id_miembro + " data-editar='EditarMiembro' href='../miembros/" + data.id_miembro + "/edit'>Editar</button><button class='btn btn-danger m-r-10' data-id=" + data.id_miembro + " data-Eliminar='EliminarMiembro'>Eliminar</button>";
                    //data = "{!! link_to_route('miembros.edit', $title = 'Editar', $parameters = "+data.id_miembro+", $attributes = ['id'=>'editar', 'class'=>'btn btn-primary m-l-10 m-r-10']) !!}"	                    
                }
                return data;
            }
        }]
    });
}
$('body').delegate('button[data-editar="EditarMiembro"]', 'click', function() {
    var id = $(this).data('id');
    var route = "../miembros/" + id + "/edit";
    window.location += "/" + id + "/edit"
});
$('body').delegate('button[data-Eliminar="EliminarMiembro"]', 'click', function() {
    var id = $(this).data('id');
    var route = "/miembros/" + id;
    var token = $('#token').val();
    var routeget = "/getmiembros";
    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'DELETE',
        dataType: 'json',
        success: function(response) {
            swal({
                title: 'Miembro eliminado',
                text: 'Se elimino correctamente.',
                type: 'success',
                confirmButtonText: 'Continuar'
            });
            var tabla = $('#miembrosTable').DataTable();
            tabla.destroy();
            ObtenerMiembros(routeget);
        },
        error: function(error) {
            console.log(error);
            swal({
                title: 'Error al eliminar miembro',
                text: 'Reinicie su navegador y vuelva a intentar.',
                type: 'info',
                confirmButtonText: 'Continuar'
            });
        }
    });
});