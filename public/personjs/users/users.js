var token = $('#token').val();

$(function (){
    ObtenerUsuarios();
    ObtenerTipoUsuario();
    LimpiarDatos();
});

$('body').delegate('#btnGuardar', 'click', function(){
var id = $('#id_user').val();
var user = $('#user').val();
var psw1 = $('#password').val();
var psw2 = $('#password2').val();
var tipoUsuario = $('#tipoUsuario').val();
var validado = ValidaDatos(user, psw1, psw2, tipoUsuario);
if(validado == true){
    if(id == 0 || id == null || id == ""){
        $.ajax({
            url: '/usuarios',
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            dataType: 'json',
            data: {
                usuario:user,
                password: psw1,
                tipoUser: tipoUsuario
            },
            success: function (response){
                swal({
                    title: 'Registro Exitoso',
                    text: 'Usuario registrado correctamente',
                    type: 'success',
                    confirmButtonText: 'Continuar'
                }).then((result) => {
                    // if(result.value){
                        LimpiarDatos();
                        ObtenerUsuarios();
                    // }
                });
                console.log(response);
            },
            error: function (error){
                console.log(error);
            }
        
        });
    }
    if(id > 0){
        $.ajax({
            url: '/updateUser',
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                usuario:user,
                password: psw1,
                tipoUser: tipoUsuario
            },
            success: function (response){
                swal({
                    title: 'Registro Exitoso',
                    text: 'Usuario editado correctamente',
                    type: 'success',
                    confirmButtonText: 'Continuar'
                }).then((result) => {
                    // if(result.value){
                        LimpiarDatos();
                        ObtenerUsuarios();
                    // }
                });
                console.log(response);
            },
            error: function (error){
                console.log(error);
            }
        
        });
    }
}


});

$('body').delegate('#dataEdit', 'click', function (){
    var id = $(this).attr('data-id');
    var user = $(this).attr('data-nombre');
    var tipoUser = $(this).attr('data-idtipo');

    $('#id_user').val(id);
    $('#user').val(user);
    $('#tipoUsuario').val(tipoUser);
});


$('body').delegate('button[class="close"]', 'click', function (){
    LimpiarDatos();
});

$('body').delegate('.btn-add', 'click', function (){
    LimpiarDatos();
});

function LimpiarDatos(){
    $('#id_user').val(0);
    $('#user').val('');
    $('#password').val('');
    $('#password2').val('');
    $('#tipoUsuario').val(0);

    $('#myModal').modal('hide');
}

function ValidaDatos(user, psw1, psw2, tipoUsuario){
    if(user == '' || user == null){
        swal({
            title: 'Campo vacio',
            text: 'El usuario no puede quedar vacio',
            type: 'error',
            confirmButtonText: 'Continuar'
        });
        return false;    
    }

    if(tipoUsuario == 0 || tipoUsuario == null){
        swal({
            title: 'Tipo de usuario',
            text: 'Debes seleccionar el tipo de usuario',
            type: 'error',
            confirmButtonText: 'Continuar'
        });
        return false;    
    }

    if(psw1 != psw2){
        swal({
            title: 'Las contraseñas no coinciden!!',
            text: 'Validar las contraseñas, estas no coinciden',
            type: 'error',
            confirmButtonText: 'Continuar'
        });
        return false;    
    }

    return true;
}

function ObtenerUsuarios(){
    var tabla = $('#usersRead').DataTable();
    tabla.destroy();

    $.ajax({
        url: '/getUsers',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            renderTablaUsers(response);
            console.log(response);
        },
        error: function(error) {
            console.log(error.responseText);
            swal({
                title: 'Error al cargar los datos',
                text: 'Reinicie su navegador y vuelva a intentar.',
                type: 'info',
                confirmButtonText: 'Continuar'
            });            
        }
    });
}

function renderTablaUsers(usuarios){
    $('#usersRead').DataTable({
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
        data: usuarios,
        columns: [{
            data: "id_user"
        }, {
            data: "usuario"
        },
        // {
        //     data: "tipoUser"
        // },
        {
            data: function(data, type, row) {
                if (type === 'display') {
                    //data = "<button class='btn btn-info m-l-10 m-r-10' data-id=" + data.id_ministerio + " onclick='AddMembers(" + data.id_ministerio + ");'>Añadir Miembros</button>";
                    data = "<button class='btn btn-primary m-l-10 m-r-10' id='dataEdit' data-target='#myModal' data-toggle='modal' data-id="+data.id_user+" data-nombre='"+data.usuario+"' data-idTipo="+data.tipoUser+">Editar</button>"
                }
                return data;
            }            
        }]
    });
}

function ObtenerTipoUsuario(){
    $.ajax({
        url: '/getTipoUsuario',
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            renderTipoUsers(response);
            console.log(response);
        },
        error: function(error) {
            console.log(error.responseText);
            swal({
                title: 'Error al cargar los datos',
                text: 'Reinicie su navegador y vuelva a intentar.',
                type: 'info',
                confirmButtonText: 'Continuar'
            });            
        }
    });    
}

function renderTipoUsers(tipoUsuario){
    var select = $('#tipoUsuario');
    select.append('<option value= "0">Selecciona tipo de usuario</option>');
    for(var i = 0; i < tipoUsuario.length; i++){
        select.append('<option value="'+tipoUsuario[i].idTipo+'">'+tipoUsuario[i].tipoUser+'</option>')
    }
}