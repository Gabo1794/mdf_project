var token = $('#token').val();
var urltipoPago = '/tipoPago';
var urlproveedores = '/provedorTipoPago';
$(function (){
    ObtenerProveedores();
    ObtenerTipoPago();
});

function ObtenerProveedores(){
    $.ajax({
        url: urlproveedores,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'POST',
        datatype: 'json',
        success: function(response){
            renderTableProveedores(response);
        },
        error: function(error){
            console.log(error)
        }
    });
}

function ObtenerTipoPago(){
    $.ajax({
        url: urltipoPago,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'POST',
        datatype: 'json',
        success: function(response){
            renderSelectTipoPago(response);
        },
        error: function(error){
            console.log(error)
        }
    });
}

function renderSelectTipoPago(tipopago){
    var select = $('#tipoPago');
    select.append('<option value= "0">Selecciona tipo de pago</option>');
    for(var i = 0; i < tipopago.length; i++){
        select.append('<option value='+tipopago[i].id_tipo_pago+'>'+tipopago[i].tipo_pago+'</option>')
    }
}

function renderTableProveedores(proveedores){
    $('#providersRead').DataTable({
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
        data: proveedores,
        columns: [{
            data: "id_prov"
        }, 
        {
            data: "proveedor"
        },
        {
            data: "tipo_pago"
        },
        {
            data: function(data, type, row) {
                if (type === 'display') {
                    //data = "<button class='btn btn-info m-l-10 m-r-10' data-id=" + data.id_ministerio + " onclick='AddMembers(" + data.id_ministerio + ");'>Añadir Miembros</button>";
                    data = "<button class='btn btn-primary m-l-10 m-r-10' id='dataEdit' data-target='#myModal' data-toggle='modal' data-id="+data.id_prov+" data-nombre='"+data.proveedor+"' data-idTipo="+data.id_tipo_pago+">Editar</button>"
                }
                return data;
            }            
        }]
    });    
}