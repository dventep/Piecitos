<link href="css_inicio/css_perfil.css" rel="stylesheet" />
<style>    
    #mainNav {
        background: #6d6d41;        }
    .text-shadow {
        text-shadow: 0 0 0 rgba(255, 255, 255, 0.5);
    }
</style>
<?php
    while($usu=mysqli_fetch_assoc($usuario)){
?>
<form action="<?php echo getUrl("Usuario","Usuario","postPerfil") ?>" method="post" enctype="multipart/form-data">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row" id="row" style="margin-top: 30px;">

            <div class="col-md-4 border-right" style="background-color:#c2b899">
                <div class="">
                    <input type="hidden" name="Nombre_Viejo" id="Nombre_Viejo" value="<?php echo $usu['Usu_Nombre'].'_'.$usu['Usu_Apellido'].'_'.$usu['Usu_Id']; ?>">
                    <input type="hidden" name="imagenVieja" id="imagenVieja" value="<?php echo $usu['Usu_Imagen'] ?>">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5" id="cambiarImagenPerfil">
                        <img class="rounded-circle mt-5" style= "height: 10rem;max-width: 10rem;width:100%;" src= "<?php
                        if ($usu['Usu_Imagen']){
                            echo $usu['Usu_Imagen'];
                        }else{
                            echo "images/Usuarios/desconocido.svg";
                        }
                        ?>">
                        <span class="font-weight-bold mt-2"><?php echo $_SESSION['nombre'];?></span>
                        <span class="mt-1 text-black col-md-12"><?php echo $usu['Usu_Correo']?></span>
                    </div>
                </div>
            </div>
                            
            <div class="col-md-4 border-right" style="background-color:#c2b899">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Perfil de Usuario</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label class="labels">Nombres</label>
                            <input type="text" class="form-print form-change" id="Usu_Nombre"  name="Usu_Nombre" value="<?php echo $usu['Usu_Nombre']?>" readonly>
                        </div>                            
                    </div>
                    <div class="row mt-3">                            
                        <div class="col-md-12">
                            <label class="labels">Apellidos</label>
                            <input type="text" class="form-print form-change" id="Usu_Apellido" name="Usu_Apellido" value="<?php echo $usu['Usu_Apellido'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">                            
                        <div class="col-md-12">
                            <label class="labels">Tipo Documento</label>
                            <input type="text" class="form-print" id="Tipo_Nombre" name="Tipo_Nombre" value="<?php echo $usu['Tipo_Nombre'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">                            
                        <div class="col-md-12">
                            <label class="labels">Numero Identificacion</label>
                            <input type="text" class="form-print" id="Usu_Num_Identificacion" name="Usu_Num_Identificacion" value="<?php echo $usu['Usu_Num_Identificacion'] ?>" readonly>
                        </div>
                    </div>                  
                </div>
            </div>
            
            <div class="col-md-4" style="background-color:#c2b899">
                <div class="p-3 py-5 mt-2">                                                                                       
                    
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <label class="labels">Teléfono</label>
                            <input type="text" class="form-print form-change" id= "Usu_Telefono" name="Usu_Telefono" value="<?php echo $usu['Usu_Telefono'] ?>" >
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Dirección Residencia</label>
                            <input type="text" class="form-print form-change" id="Usu_Direccion" name="Usu_Direccion" value="<?php echo $usu['Usu_Direccion']?>">
                        </div>
                    </div>
                    <div class="mt-5 text-center" id="accionPerfil">
                        <button class="btn btn-info" id="actualizarPerfil" type="button">Actualizar</button>
                    </div>
                </div>
            </div>  
        </div>            
    </div>
</form>
<?php
    }
?>   