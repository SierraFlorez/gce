//  ----- DATATABLES

// DataTable usuarios
$(document).ready(function () {
    
    $('#dtUsuarios')
        .addClass('table-striped table-sm table-hover table-dark table table-bordered')
        .dataTable({
            "language": {
                "url": "DataTables/Spanish.json"
            },
            responsive: true,
            dom: 'B<"salto"><"panel-body"<"row"<"col-sm-6"l><"col-sm-6"f>>>rtip',
            buttons: [
                'copy', 'excel', 'csv'
            ]
        });
})
//  -------- MODULO DE CUENTA





// Función para el modal de detalles del usuario
function cuentaUsuario(id) {
    var url = "usuarios/detalle";
    $.post(url + "/" + id).done(function (data) {
        $("#documento_user").val(data.documento);
        $("#nombres_user").val(data.nombres);
        $("#apellidos_user").val(data.apellidos);
        $("#email_user").val(data.email);
        $("#eps_user").val(data.eps);
        $("#sangre_user").val(data.sangre);
        $("#rh_user").val(data.rh);
        $("#telefono_user").val(data.telefono);
        $('#tipoDocumento_user').val(data.tipo_documento);
        $("#updateCuenta").attr('onclick', 'updateCuenta(' + data.id + ')');
    });
}
// Función para actualizar la cuenta del usuario
function updateCuenta(id) {
    var url = "usuarios/update";

    $documento = $("#documento_user").val();
    $nombres = $("#nombres_user").val();
    $apellidos = $("#apellidos_user").val();
    $correo = $("#email_user").val();
    $eps = $("[name = 'select_eps']").children("option:selected").val();
    $telefono = $("#telefono_user").val();
    $tipoDocumento = $("[name = 'select_tipoDocumento']").children("option:selected").val();
    $sangre = $("[name = 'select_sangre']").children("option:selected").val();
    $rh = $("[name = 'select_rh']").children("option:selected").val();

    var obj = new Object();
    obj.Id = id;
    obj.Documento = $documento;
    obj.Nombres = $nombres;
    obj.Apellidos = $apellidos;
    obj.Correo = $correo;
    obj.Eps = $eps;
    obj.Telefono = $telefono;
    obj.TipoDocumento = $tipoDocumento;
    obj.Sangre = $sangre;
    obj.Rh = $rh;


    var datos = JSON.stringify(obj);
    console.log(datos);
    $.post(url + "/" + datos).done(function (data) {
        $("#modalCuenta").modal('hide');//ocultamos el modal 
        // console.log(data);
        if (Number(data)) {
            Swal.fire(
                'Completado!',
                obj.Nombres + " ha actualizado correctamente su perfil",
                'success'
            )
        } else {
            Swal.fire(
                'Error!',
                "Error al editar Usuario",
                'error'
            )

        }
        $("#table_div_user").load(" #dtUsuarios", function () {
            $('#dtUsuarios')
                .addClass('table-striped table-bordered')
                .dataTable({
                    "language": {
                        "url": "DataTables/Spanish.json"
                    },
                    destroy: true,
                    responsive: true,
                    dom: 'B<"salto"><"panel-body"<"row"<"col-sm-6"l><"col-sm-6"f>>>rtip',
                    buttons: [
                        'copy', 'excel', 'csv'
                    ]
                });
        });
    });
}
// Función para restaurar contraseña
$("#passReset").click(function () {
    var url = "passreset";
    var id = $("#userid").val();
    var pass1 = $("#password").val();
    var pass2 = $("#confirmPassword").val();
    var dato;
    if (pass1 == pass2) {
        if (pass1 != null && pass1.trim() != "" && pass1.length >= 6) {
            var obj = new Object();
            obj.id = id;
            obj.contraseña = pass1;
            var data = JSON.stringify(obj);
            $.post(url + "/" + data, function (data2) {
                dato = JSON.parse(data2);
            }).done(function () {
                $("#modalPassword").modal('hide');//ocultamos el modal
                Swal.fire(
                    'Completado!',
                    "El usuario " + dato.nombres + " ha cambiado su contraseña",
                    'success'
                );
            });
        } else {
            Swal.fire(
                'Error!',
                "La clave debe tener mínimo 6 caracteres y no se aceptan espacios en blanco",
                'error'
            );
        }
    } else {
        Swal.fire(
            'Error!',
            "Las claves deben coincidir",
            'error'
        );
    }

});

// Función para el modal de detalles de contacto del usuario
function detallesContactoUsuario(id) {
    var url = "usuarios/contacto";
    $.post(url + "/" + id).done(function (data) {
        $("#documento_contacto").val(data.documento);
        $("#nombre_contacto").val(data.nombre);
        $("#email_contacto").val(data.email);
        $("#telefono_contacto").val(data.telefono);
        $("#updateContactoCuenta").attr('onclick', 'updateContactoCuenta(' + data.id + ')');
    });
}
// Actualiza contactos
function updateContactoCuenta(id) {
    var url = "contacto/update";

    $documento = $("#documento_contacto").val();
    $nombres = $("#nombre_contacto").val();
    $correo = $("#email_contacto").val();
    $telefono = $("#telefono_contacto").val();

    var obj = new Object();
    obj.Id = id;
    obj.Documento = $documento;
    obj.Nombres = $nombres;
    obj.Correo = $correo;
    obj.Telefono = $telefono;

    var datos = JSON.stringify(obj);
    console.log(datos);
    $.post(url + "/" + datos).done(function (data) {
        $("#modalCuentaContacto").modal('hide');//ocultamos el modal 
        // console.log(data);
        if (Number(data)) {
            Swal.fire(
                'Completado!',
                "Se ha editado el Contacto correctamente",
                'success'
            )
        } else {
            Swal.fire(
                'Error!',
                "Error al editar Contacto",
                'error'
            )

        }
        $("#table_div_user").load(" #dtUsuarios", function () {
            $('#dtUsuarios')
                .addClass('table-striped table-bordered')
                .dataTable({
                    "language": {
                        "url": "DataTables/Spanish.json"
                    },
                    destroy: true,
                    responsive: true,
                    dom: 'B<"salto"><"panel-body"<"row"<"col-sm-6"l><"col-sm-6"f>>>rtip',
                    buttons: [
                        'copy', 'excel', 'csv'
                    ]
                });
        });
    });
}
// Función para guardar contacto
function crearContactoUsuario() {
    var url = "contacto/guardar";
    $documento = $("#documento_contacto_u").val();
    $nombres = $("#nombre_contacto_u").val();
    $correo = $("#email_contacto_u").val();
    $telefono = $("#telefono_contacto_u").val();
    $id_user = $("#userid_contacto_u").val();

    var obj = new Object();
    obj.Documento = $documento;
    obj.Nombres = $nombres;
    obj.Correo = $correo;
    obj.Telefono = $telefono;
    obj.Iduser = $id_user;

    var datos = JSON.stringify(obj);
    console.log(datos);
    $.post(url + "/" + datos).done(function (data) {
        $("#modalRegistrarContactosUsuario").modal('hide');//ocultamos el modal 
        // console.log(data);
        if (Number(data)) {
            Swal.fire(
                'Completado!',
                "Se ha guardado el Contacto correctamente",
                'success'
            )
        } else {
            Swal.fire(
                'Error!',
                "Error al guardar Contacto",
                'error'
            )

        }
        $("#table_div_user").load(" #dtUsuarios", function () {
            $('#dtUsuarios')
                .addClass('table-striped table-bordered')
                .dataTable({
                    "language": {
                        "url": "DataTables/Spanish.json"
                    },
                    destroy: true,
                    responsive: true,
                    dom: 'B<"salto"><"panel-body"<"row"<"col-sm-6"l><"col-sm-6"f>>>rtip',
                    buttons: [
                        'copy', 'excel', 'csv'
                    ]
                });
        });

    });

}
// ----MODULO USUARIOS

// Función para el modal de detalles
function detallesUsuario(id) {
    var url = "usuarios/detalle";
    $.post(url + "/" + id).done(function (data) {
        $("#documento_user_d").val(data.documento);
        $("#nombres_user_d").val(data.nombres);
        $("#apellidos_user_d").val(data.apellidos);
        $("#email_user_d").val(data.email);
        $("#eps_user_d").val(data.eps);
        $("#sangre_user_d").val(data.sangre);
        $("#rh_user_d").val(data.rh);
        $("#telefono_user_d").val(data.telefono);
        $('#tipoDocumento_user_d').val(data.tipo_documento);
        $("#update").attr('onclick', 'updateUsuario(' + data.id + ')');
    });
}
// Función para actualizar usuario ajax
function updateUsuario(id) {
    var url = "usuarios/update";

    $documento = $("#documento_user_d").val();
    $nombres = $("#nombres_user_d").val();
    $apellidos = $("#apellidos_user_d").val();
    $correo = $("#email_user_d").val();
    $eps = $("[name = 'select_eps_d']").children("option:selected").val();
    $telefono = $("#telefono_user_d").val();
    $tipoDocumento = $("[name = 'select_tipoDocumento_d']").children("option:selected").val();
    $sangre = $("[name = 'select_sangre_d']").children("option:selected").val();
    $rh = $("[name = 'select_rh_d']").children("option:selected").val();

    var obj = new Object();
    obj.Id = id;
    obj.Documento = $documento;
    obj.Nombres = $nombres;
    obj.Apellidos = $apellidos;
    obj.Correo = $correo;
    obj.Eps = $eps;
    obj.Telefono = $telefono;
    obj.TipoDocumento = $tipoDocumento;
    obj.Sangre = $sangre;
    obj.Rh = $rh;


    var datos = JSON.stringify(obj);
    console.log(datos);
    $.post(url + "/" + datos).done(function (data) {
        $("#modalDetalles").modal('hide');//ocultamos el modal 
        // console.log(data);
        if (Number(data)) {
            Swal.fire(
                'Completado!',
                "Se ha editado el Usuario correctamente",
                'success'
            )
        } else {
            Swal.fire(
                'Error!',
                "Error al editar Usuario",
                'error'
            )

        }
        $("#table_div_user").load(" #dtUsuarios", function () {
            $('#dtUsuarios')
                .addClass('table-striped table-bordered')
                .dataTable({
                    "language": {
                        "url": "DataTables/Spanish.json"
                    },
                    destroy: true,
                    responsive: true,
                    dom: 'B<"salto"><"panel-body"<"row"<"col-sm-6"l><"col-sm-6"f>>>rtip',
                    buttons: [
                        'copy', 'excel', 'csv'
                    ]
                });
        });
    });
}
// Activa el estado del Usuario
function activar(id, color) {
    var estado = $(color).html();
    var url = "usuarios/activar";
    $.post(url + "/" + id).done(function (data) {

        Swal.fire(
            'Completado!',
            "el Usuario se ACTIVÓ correctamente",
            'success'
        )
        $("#table_div_user").load(" #dtUsuarios", function () {
            $('#dtUsuarios')
                .addClass('table-striped table-bordered')
                .dataTable({
                    "language": {
                        "url": "DataTables/Spanish.json"
                    },
                    destroy: true,
                    responsive: true,
                    dom: 'B<"salto"><"panel-body"<"row"<"col-sm-6"l><"col-sm-6"f>>>rtip',
                    buttons: [
                        'copy', 'excel', 'csv'
                    ]
                });
        });
    });
}

// Inactiva el estado del usuario
function inactivar(id, color) {
    var estado = $(color).html();
    var url = "usuarios/inactivar";
    $.post(url + "/" + id).done(function (data) {

        Swal.fire(
            'Completado!',
            "el Usuario se INACTIVÓ correctamente",
            'success'
        )

        $("#table_div_user").load(" #dtUsuarios", function () {
            $('#dtUsuarios')
                .addClass('table-striped table-bordered')
                .dataTable({
                    "language": {
                        "url": "DataTables/Spanish.json"
                    },
                    destroy: true,
                    responsive: true,
                    dom: 'B<"salto"><"panel-body"<"row"<"col-sm-6"l><"col-sm-6"f>>>rtip',
                    buttons: [
                        'copy', 'excel', 'csv'
                    ]
                });
        });
    });
}
// Mensaje en caso que no tenga permiso
function Nopermiso() {
    Swal.fire(
        'Error!',
        "Usted no tiene permiso para editar esto",
        'error'
    )
}

// Guarda usuario en la base de datos
function crearUsuario() {
    var url = "registrar/guardar";
    $documento = $("#documento_userGuardar").val();
    $nombres = $("#nombres_userGuardar").val();
    $apellidos = $("#apellidos_userGuardar").val();
    $correo = $("#email_userGuardar").val();
    $eps = $("[name = 'select_user_epsGuardar']").children("option:selected").val();
    $sangreg = $("[name = 'select_user_sangreG']").children("option:selected").val();
    $rh = $("[name = 'select_user_rhGuardar']").children("option:selected").val();
    $telefono = $("#telefono_userGuardar").val();
    $tipoDocumento = $("[name = 'select_user_tipoDocumentoGuardar']").children("option:selected").val();

    $documentoContacto = $("#documento_contacto_guardaru").val();
    $nombreContacto = $("#nombre_contacto_guardaru").val();
    $emailContacto = $("#email_contacto_guardaru").val();
    $telefonoContacto = $("#telefono_contacto_guardaru").val();
    var obj = new Object();
    obj.Documento = $documento;
    obj.Nombres = $nombres;
    obj.Apellidos = $apellidos;
    obj.Correo = $correo;
    obj.Eps = $eps;
    obj.Rh = $rh;
    obj.Sangre = $sangreg;
    obj.Telefono = $telefono;
    obj.TipoDocumento = $tipoDocumento;

    obj.contactoDocumento = $documentoContacto;
    obj.contactoNombre = $nombreContacto;
    obj.contactoEmail = $emailContacto;
    obj.contactoTelefono = $telefonoContacto;
    var datos = JSON.stringify(obj);
    // console.log(datos);
    $.post(url + "/" + datos).done(function (data) {
        $("#modalLogin").modal('hide');//ocultamos el modal 
        console.log(data);
        if (data.estado == 1) {
            Swal.fire(
                'Completado!',
                "Se ha Guardado el Usuario " + obj.Nombres + " correctamente",
                'success'
            )
        } else {
            Swal.fire(
                'Error!',
                "Error al guardar Usuario",
                'error'
            )

        }
        $("#table_div_user").load(" #dtBasicExample", function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');


        });

    });

}

// ----- MODULO CONTACTOS DE EMERGENCIA


// Función para el modal de detalles de contacto
function detallesContacto(id) {
    var url = "usuarios/contacto";
    $.post(url + "/" + id).done(function (data) {
        $("#documento_contacto_d").val(data.documento);
        $("#nombre_contacto_d").val(data.nombre);
        $("#email_contacto_d").val(data.email);
        $("#telefono_contacto_d").val(data.telefono);
        $("#updateContacto").attr('onclick', 'updateContacto(' + data.id + ')');
    });
}
// Actualiza contactos
function updateContacto(id) {
    var url = "contacto/update";

    $documento = $("#documento_contacto_d").val();
    $nombres = $("#nombre_contacto_d").val();
    $correo = $("#email_contacto_d").val();
    $telefono = $("#telefono_contacto_d").val();

    var obj = new Object();
    obj.Id = id;
    obj.Documento = $documento;
    obj.Nombres = $nombres;
    obj.Correo = $correo;
    obj.Telefono = $telefono;

    var datos = JSON.stringify(obj);
    console.log(datos);
    $.post(url + "/" + datos).done(function (data) {
        $("#modalContactos").modal('hide');//ocultamos el modal 
        // console.log(data);
        if (Number(data)) {
            Swal.fire(
                'Completado!',
                "Se ha editado el Contacto correctamente",
                'success'
            )
        } else {
            Swal.fire(
                'Error!',
                "Error al editar Contacto",
                'error'
            )

        }
        $("#table_div_user").load(" #dtUsuarios", function () {
            $('#dtUsuarios')
                .addClass('table-striped table-bordered')
                .dataTable({
                    "language": {
                        "url": "DataTables/Spanish.json"
                    },
                    destroy: true,
                    responsive: true,
                    dom: 'B<"salto"><"panel-body"<"row"<"col-sm-6"l><"col-sm-6"f>>>rtip',
                    buttons: [
                        'copy', 'excel', 'csv'
                    ]
                });
        });
    });
}
// Modal con el nombre del usuario de registro
function registrarContactoModal(id) {
    var url = "usuarios/detalle";
    $.post(url + "/" + id).done(function (data) {
        $("#user_contacto_g").val(data.nombres + ' ' + data.apellidos);
        $("#userid_contacto_g").val(data.id);
    });
}
// Función para guardar contacto
function crearContacto() {
    var url = "contacto/guardar";
    $documento = $("#documento_contacto_g").val();
    $nombres = $("#nombre_contacto_g").val();
    $correo = $("#email_contacto_g").val();
    $telefono = $("#telefono_contacto_g").val();
    $id_user = $("#userid_contacto_g").val();

    var obj = new Object();
    obj.Documento = $documento;
    obj.Nombres = $nombres;
    obj.Correo = $correo;
    obj.Telefono = $telefono;
    obj.Iduser = $id_user;

    var datos = JSON.stringify(obj);
    console.log(datos);
    $.post(url + "/" + datos).done(function (data) {
        $("#modalRegistrarContactos").modal('hide');//ocultamos el modal 
        // console.log(data);
        if (Number(data)) {
            Swal.fire(
                'Completado!',
                "Se ha guardado el Contacto correctamente",
                'success'
            )
        } else {
            Swal.fire(
                'Error!',
                "Error al guardar Contacto",
                'error'
            )

        }
        $("#table_div_user").load(" #dtUsuarios", function () {
            $('#dtUsuarios')
                .addClass('table-striped table-bordered')
                .dataTable({
                    "language": {
                        "url": "DataTables/Spanish.json"
                    },
                    destroy: true,
                    responsive: true,
                    dom: 'B<"salto"><"panel-body"<"row"<"col-sm-6"l><"col-sm-6"f>>>rtip',
                    buttons: [
                        'copy', 'excel', 'csv'
                    ]
                });
        });

    });

}