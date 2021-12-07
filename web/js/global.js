$(document).ready(function() {

    // !------------------------- Parte de Añadir -------------------------------
    $(document).on("click", "#BtnAñadir", function() {

        var url = $(this).attr("data-url");
        var tipo = $(this).attr("data-tipo")
        var titulo = "Insertar nuevo " + tipo;
        var colorTitulo = "bg-success";

        $.ajax({
            url: url,
            success: function(datos) {
                $("#modalHeader").attr("class", "modal-header " + colorTitulo);
                $("#tituloModal").html(titulo);
                $("#content_Modal").html(datos);
                $("#parte_Modal").modal("show");
            }
        });
    });
    // !------------------------- Parte de Editar -------------------------------
    $(document).on("click", ".editarModal", function() {

        var url = $(this).attr("data-url");
        var id = $(this).attr("data-id");
        var tipo = $(this).attr("data-tipo")
        var titulo = "Editar " + tipo;
        var colorTitulo = "bg-info";

        $.ajax({
            url: url,
            data: "id=" + id,
            type: "POST",
            success: function(datos) {
                $("#modalHeader").attr("class", "modal-header " + colorTitulo);
                $("#tituloModal").html(titulo);
                $("#content_Modal").html(datos);
                $("#parte_Modal").modal("show");
            }
        });
    });

    // !------------------------- Parte de Cambiar Imagen -------------------------------
    $(document).on("click", "#cambioImagen", function() {
        var ruta_imagen = $("#imagen").attr("src");
        var name = $("#imagen").attr("data-name");

        $("#contenedorImagen").html("<input type='file' class='mx-auto' name='" + name + "' id='" + name + "'>");

    });

    // !------------------------- Parte de Eliminar -------------------------------
    $(document).on("click", ".eliminarModal", function() {

        var url = $(this).attr("data-url");
        var id = $(this).attr("data-id");
        var tipo = $(this).attr("data-tipo");
        var titulo = "Eliminar " + tipo;
        var colorTitulo = "bg-danger text-light";

        $.ajax({
            url: url,
            data: "id=" + id,
            type: "POST",
            success: function(datos) {
                $("#modalHeader").attr("class", "modal-header " + colorTitulo);
                $("#tituloModal").html(titulo);
                $("#content_Modal").html(datos);
                $("#parte_Modal").modal("show");
            }
        });
    });

    // !------------------------- Parte de Campanita y Notificación -------------------------------
    $(document).on("input", "#filtro", function() {
        url = $(".filtro").attr("data-url");

        buscar = $(this).val()

        $.ajax({
            url: url,
            data: "buscar=" + buscar,
            type: "POST",
            success: function(datos) {
                if ($(".filtro").hasClass("is-producto")) {
                    $("#adminProductos").html(datos)
                } else {
                    $("#tbody").html(datos);
                }
            }
        })
    });

    // !------------------------- Parte de Campanita y Notificación -------------------------------
    $(document).on("click", "#campanita", function() {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            success: function(datos) {
                $("#notificaciones-activas").html(datos);
            }
        })
    });

    // TODO: *-------------------- Más Notificaciones ------------------
    $(document).on("click", "#masNotificaciones", function() {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            success: function(datos) {
                $("#interfaz_Notificacion").attr("class", "nav-item dropdown no-arrow mx-1 show");
                $("#campanita").attr("aria-expanded", true);
                $("#contenido_Notificaciones").attr("class", "dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in show");
                $("#notificaciones-activas").attr("style", "overflow: scroll; overflow-x: hidden; height: 53vh;");
                $("#notificaciones-activas").html(datos);
                $("#contenidor_Mostrar_Mas").html("");
            }
        })
    });

    // TODO: *-------------------- Cantidad Notificaciones ------------------
    function cantidad_Notificaciones() {
        var url = $("#cantidad_Notificaciones").attr("data-url");

        $.ajax({
            url: url,
            success: function(datos) {
                $("#cantidad_Notificaciones").html(datos);
            }
        })
    }
    $(window).on("load", cantidad_Notificaciones);
    $(document).on("click", ".cada_notificacion", cantidad_Notificaciones);

    // TODO: *-------------------- Hover al Entrar ------------------
    $(document).on("mouseover", ".cada_notificacion", function() {
        id = $(this).attr("data-id");
        $("#cada-icono" + id).html("<i class='fas fa-check-double'></i>");
    });

    // ? *-------------------- Hover al Salir ------------------
    $(document).on("mouseout", ".cada_notificacion", function() {
        id = $(this).attr("data-id");
        icono = $(this).attr("data-icono");

        $("#cada-icono" + id).html("<i class='" + icono + " text-white'></i>");
    });

    // TODO: -------------------- Marcar como Leído ------------------
    $(document).on("click", ".marcar-leido", function() {
        id = $(this).attr("data-id");
        url = $(this).attr("data-url");

        $.ajax({
            url: url,
            data: "id=" + id,
            type: "POST",
            success: function(datos) {
                $("#notificaciones-activas").html(datos);
                $("#interfaz_Notificacion").attr("class", "nav-item dropdown no-arrow mx-1 show");
                $("#campanita").attr("aria-expanded", true);
                $("#contenido_Notificaciones").attr("class", "dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in show");
            }
        })
    });

    // TODO: -------------------- Marcar como Eliminado ------------------
    $(document).on("click", ".marcar-eliminado", function() {
        id = $(this).attr("data-id");
        url = $(this).attr("data-url");

        $.ajax({
            url: url,
            data: "id=" + id,
            type: "POST",
            success: function(datos) {
                $("#notificaciones-activas").html(datos);
                $("#interfaz_Notificacion").attr("class", "nav-item dropdown no-arrow mx-1 show");
                $("#campanita").attr("aria-expanded", true);
                $("#contenido_Notificaciones").attr("class", "dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in show");
            }
        })
    });

    // !------------------------- Notificar Registro de EMAIL - INICIO -------------------------------
    $(document).on("click", "#btnNotificarCorreo", function() {
        url = $(this).attr("data-url")
        correo = $("#CorreoElectronico").val()

        $.ajax({
            url: url,
            data: "correo=" + correo,
            type: "POST",
            success: function(datos) {
                verificador = datos.substr(0, 1);
                contenido = datos.substr(1, datos.length)
                $("#notificarCorreo").html(contenido)
                if (verificador == 1) {
                    $("#CorreoElectronico").attr("disabled", "disabled");
                    $("#btnNotificarCorreo").addClass("NotificadoCorreo");
                    $("#btnNotificarCorreo").html("¡Notificado!");
                    $("#btnNotificarCorreo").attr("id", "btnNotificadoCorreo");
                }
            }
        })
    })

    // TODO:------------------------- Notificar CANTIDAD de EMAILS - ADMIN -------------------------------
    function correo_Notificaciones() {
        var url = $("#correo_Notificaciones").attr("data-url");

        $.ajax({
            url: url,
            success: function(datos) {
                $("#correo_Notificaciones").html(datos);
            }
        })
    }
    $(window).on("load", correo_Notificaciones);
    $(document).on("click", ".cada_correo", correo_Notificaciones);

    // TODO:------------------------- Mostrar EMAILS - ADMIN -------------------------------
    function mostrar_Correos() {
        var url = $("#cartita").attr("data-url");

        $.ajax({
            url: url,
            success: function(datos) {
                $("#contenidoCorreos").html(datos);
            }
        })
    }
    $(document).on("click", "#cartita", mostrar_Correos);
    $(document).on("click", ".cada_correo", mostrar_Correos);
    // !------------------------- Parte de Ocultar y Mostrar los Enlaces de Navegación Admin -------------------------------
    var Interruptor_Admin = true;

    $(document).on("click", "#admin_Boton_Ocultar", function() {

        if (Interruptor_Admin) {
            $(".admin_Navegacion").attr("class", "d-none admin_Navegacion");
            $(".admin_Navegacion_titulo").attr("class", "d-none admin_Navegacion_titulo");
            $("#admin_Navbar").attr("style", "height:100hw;width:56px !important");
            $("#admin_Icono_Ocultar").attr("class", "fas fa-angle-right text-light");
            Interruptor_Admin = false;
        } else {
            $(".admin_Navegacion").attr("class", "d-inline admin_Navegacion");
            $(".admin_Navegacion_titulo").attr("class", "sidebar-heading admin_Navegacion_titulo");
            $("#admin_Navbar").attr("style", "height:100hw;width:200px !important");
            $("#admin_Icono_Ocultar").attr("class", "fas fa-angle-left text-light");
            Interruptor_Admin = true;
        }
    });

    // !------------------------- Parte de Ocultar y Mostrar los Enlaces de Navegación Admin -------------------------------
    var Interruptor_Admin_VerMas = true;

    $(document).on("click", ".a_icono", function() {
        var id = $(this).attr("data-id");

        if (Interruptor_Admin_VerMas) {
            $("#" + id).attr("class", "iconoFlechas_Admin fas fa-chevron-down flecha-derecha align-middl");
            Interruptor_Admin_VerMas = false;
        } else {
            $("#" + id).attr("class", "iconoFlechas_Admin fas fa-chevron-right flecha-derecha align-middl");
            Interruptor_Admin_VerMas = true;
        }
    });

    // !------------------------- Duración del Carousel -------------------------------
    $('.carousel').carousel({
        interval: 6000
    });

    // !------------------------- Mostrar por Categoria - TIENDA -------------------------------
    $(document).on("click", ".porCategoria", function() {
        id = $(this).attr("id");
        url = $("#cont_porCategoria").attr("data-url-barra");
        id_envio = id;

        if ($("#" + id).hasClass("activar_Categoria")) {
            id_envio = 0;
        }
        $.ajax({
            url: url,
            data: "id=" + id_envio,
            type: "POST",
            success: function(datos) {
                $("#catalogoProductos").html(datos);

                if ($(".porCategoria").hasClass("activar_Categoria")) {
                    if ($("#" + id).hasClass("activar_Categoria")) {
                        $("#" + id).removeClass("activar_Categoria");
                    } else {
                        $(".porCategoria").removeClass("activar_Categoria");
                        $("#" + id).addClass("activar_Categoria");
                    }
                } else {
                    $("#" + id).addClass("activar_Categoria");
                }
            }
        })
    });
    // !------------------------- Mostrar por Categoria - Filtro - TIENDA -------------------------------
    function filtrarBusqueda() {
        var cat = "Pro.Cat_Id";
        var col = "Pro.Col_Id";
        var prv = "Pro.Prov_Id";
        var des = "Pro.Pro_Descuento";

        url = $("#cont_porCategoria").attr("data-url");

        valorCat = $("#Cat").attr("data-filtro");
        if (valorCat != "") { cat = valorCat; }
        valorCol = $("#Col").attr("data-filtro");
        if (valorCol != "") { col = valorCol; }
        valorPrv = $("#Prv").attr("data-filtro");
        if (valorPrv != "") { prv = valorPrv; }
        valorDes = $("#Des").attr("data-filtro");
        if (valorDes != "") { des = valorDes; }

        $.ajax({
            url: url,
            data: { "cat": cat, "prv": prv, "col": col, "des": des },
            type: "POST",
            success: function(datos) {
                $("#catalogoProductos").html(datos);

                if (valorCat != "") {
                    $(".valorCat").removeClass("activar_Filtro");
                    $("#Cat" + valorCat).addClass("activar_Filtro");
                }
                if (valorPrv != "") {
                    $(".valorPrv").removeClass("activar_Filtro");
                    $("#Prv" + valorPrv).addClass("activar_Filtro");
                }
                if (valorCol != "") {
                    $(".valorCol").removeClass("activar_Filtro");
                    $("#Col" + valorCol).addClass("activar_Filtro");
                }
            }
        })
    }
    $(document).on("click", ".porFiltro", function() {

        id = $(this).attr("id");
        id_envio = id.substr(3, id.length);

        filtro = "#" + id.substr(0, 3);
        filtro_clase = ".valor" + id.substr(0, 3);
        verificacion = $(filtro).attr("data-filtro");

        if (id_envio == verificacion) {
            $(filtro).attr("data-filtro", "");
            $(filtro_clase).removeClass("activar_Filtro");
        } else { $(filtro).attr("data-filtro", id_envio); }

        filtrarBusqueda();
    });

    // !------------------------- Mostrar por Busqueda - Filtro - TIENDA -------------------------------
    $(document).on("input", "#filtroTienda", function() {
        url = $(this).attr("data-url")
        buscar = $(this).val()

        $.ajax({
            url: url,
            data: "buscar=" + buscar,
            type: "POST",
            success: function(datos) {
                $("#catalogoProductos").html(datos)
                $(".porFiltro").removeClass("activar_Filtro")
                $(".porCategoria").removeClass("activar_Categoria")
            }
        });
    });

    // !------------------------- Mostrar por Categoria - PRODUCTO -------------------------------
    $(document).on("click", ".porCategoria_Producto", function() {
        id = $(this).attr("id");
        url = $("#cont_porCategoria").attr("data-url");
        id_envio = id;

        if ($("#" + id).hasClass("active")) {
            id_envio = 0;
        }

        $.ajax({
            url: url,
            data: "id=" + id_envio,
            type: "POST",
            success: function(datos) {
                $("#adminProductos").html(datos);

                if ($(".porCategoria_Producto").hasClass("active")) {
                    if ($("#" + id).hasClass("active")) {
                        $("#" + id).removeClass("active");
                    } else {
                        $(".porCategoria_Producto").removeClass("active");
                        $("#" + id).addClass("active");
                    }
                } else {
                    $("#" + id).addClass("active");
                }
            }
        })
    });

    // !------------------------- Agregar al Carrito - TIENDA -------------------------------
    $(document).on("click", ".detallesCarrito", function() {

        var url = $(this).attr("data-url");
        var id = $(this).attr("id");

        $.ajax({
            url: url,
            data: "id=" + id,
            type: "POST",
            success: function(datos) {
                $("#modalHeader").attr("class", "modal-header bg-success");
                $("#tituloModal").html("Más detalles del producto");
                $("#content_Modal").html(datos);
                $("#parte_Modal").modal("show");
            }
        })
    });

    // !------------------------- Ver Cantidad del Carrito - TIENDA -------------------------------
    function verCantidadCarrito() {
        url = $("#cantidadCarrito").attr("data-url");

        $.ajax({
            url: url,
            success: function(datos) {
                $("#cantidadCarrito").html(datos);
            }
        })
    }

    $(window).on("load", verCantidadCarrito);
    $(document).on("click", ".cantidadCarrito", verCantidadCarrito)
        // !------------------------- Ver Perfil - PERFIL -------------------------------
    $(document).on("click", "#actualizarPerfil", function() {
        $(".form-change").removeAttr("readonly");
        $(".form-change").attr("required", "required");
        $(".form-change").attr("class", "form-control form-change");
        var accionGuardar = '<button class="btn btn-info" id="guardarPerfil" type="submit">Guardar</button><button id="cancelarActualizar" class="btn btn-danger ml-5" type="button">Cancelar</button>';
        $("#accionPerfil").html(accionGuardar);
        $("#cambiarImagenPerfil").append('<div id="parteImagenPerfil" ><button type="button" class="btn btn profile-button mt-3 d-block mx-auto" id="cambioImagenPerfil">Cambiar Imagen</button></div>');
    });
    $(document).on("click", "#cancelarActualizar", function() {
        var accionCancelar = '<button class="btn btn-info" id="actualizarPerfil" type="button">Actualizar</button>';
        $("#accionPerfil").html(accionCancelar);
        $(".form-change").attr("readonly", "readonly");
        $(".form-change").removeAttr("required");
        $(".form-change").attr("class", "form-print form-change");
        $("#parteImagenPerfil").remove();
    });
    $(document).on("click", "#cambioImagenPerfil", function() {
        $("#parteImagenPerfil").html("<input type='file' class='mx-auto' name='urlCambioImagenPerfil' id='urlCambioImagenPerfil'>");
    });

    // !------------------------- Eliminar Producto - Carrito -------------------------------
    $(document).on("click", ".eliminarCarDet", function() {
        var id = $(this).attr("id");
        var id = id.substr(17, id.length);
        var url = $(this).attr("data-url");

        $.ajax({
            data: `id=${id}`,
            type: "POST",
            url: url,
            success: function(response) {
                verCantidadCarrito()
                $(`#trProducts${id}`).remove()
            },
            error: function(message) {
                console.log(message);
            }
        })
    });
    $(document).on("click", "#btnComprar", function() {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            success: function(response) {
                $("#metodoPagoContainer").html(response);
            },
            error: function(message) {
                console.log(message);
            }
        })
    });
    // $(document).on("click", "#finalizarCompra", function() {
    //     $("#errorValue").remove()

    //     if (($("#metodoPagoOption").val() != "") && ($("#direccionEnvio").val() != "")) {
    //         var url = $(this).attr("data-url");
    //         var metodo = $("#metodoPagoOption").val()
    //         var direccion = $("#direccionEnvio").val()
    //         // window.location = url;
    //         $.ajax({
    //             data: "direccion=" + direccion,
    //             type: "POST",
    //             url: url,
    //             success: function(response) {
    //                 alert("url:" + url)
    //             },
    //             error: function(message) {
    //                 console.log(message);
    //             }
    //         })

    //     } else {
    //         $("#sndSectionCompra").append("<div id='errorValue' class='alert alert-danger'>Debe completar los campos</div>")
    //     }
    // });
});