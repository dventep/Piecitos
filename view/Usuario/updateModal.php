<?php
    while ($usu = mysqli_fetch_assoc($usuario)) {
?>
<form action="<?php echo getUrl("Usuario","Usuario","postUpdate") ?>" method="post" enctype="multipart/form-data">
    <div class="modal-body pt-3 text-light">

        <input type="hidden" name="Usu_Id" id="Usu_Id" value="<?php echo $usu['Usu_Id'] ?>">
        <input type="hidden" name="Nombre_Viejo" value="<?php echo $pro['Usu_Nombre'] ?>">    

        <div class="row col-md-12 mx-auto mb-3">
            <div class="col-md-6">
                <label for="Usu_Nombre" class="control-">Nombre</label>
                <input type="text" class="form-control" id="Usu_Nombre" name="Usu_Nombre" placeholder="Nombre del Usuario" value="<?php echo $usu['Usu_Nombre'] ?>" maxlength="30" required>                
            </div>
            <div class="col-md-6">
                <label for="Usu_Apellido" class="control-">Apellido</label>
                <input type="text" class="form-control" id="Usu_Apellido" name="Usu_Apellido" placeholder="Apellido del Usuario" value="<?php echo $usu['Usu_Apellido'] ?>" maxlength="30" required>                
            </div>
        </div>
        <div class="row col-md-12 mx-auto mb-3">
            <div class="col-md-6">
                <label for="Usu_Telefono" class="control-">Telefono</label>
                <input type="text" class="form-control" id="Usu_Telefono" name="Usu_Telefono" placeholder="Telefono del Usuario" value="<?php echo $usu['Usu_Telefono'] ?>" maxlength="15" required>                
            </div>
            <div class="col-md-6">
                <label for="Usu_Direccion" class="control-">Direccion</label>
                <input type="text" class="form-control" id="Usu_Direccion" name="Usu_Direccion" placeholder="Direccion del Usuario" value="<?php echo $usu['Usu_Direccion'] ?>" maxlength="30" required>                
            </div>
        </div>
        <div class="row col-md-12 mx-auto mb-3">
            <div class="col-md-12 mx-auto">
                <label for="Usu_Correo" class="control-">Correo</label>
                <input type="text" class="form-control" id="Usu_Correo" name="Usu_Correo" placeholder="Correo del Usuario" value="<?php echo $usu['Usu_Correo'] ?>" maxlength="30" required>                
            </div>
        </div>

        <div class="row col-md-12 mx-auto mb-3">
            <div class="col-md-6">
                <label for="Usu_Num_Identificacion" class="control-">Numero de Identificación</label>
                <select class="form-control" name="Tipo_Id" id="Tipo_Id" style="background:#EDDCD2;">
                    <option value="">Seleccione..</option>
                    <?php
                        foreach ($tipo_identificacion as $tip) {
                            if ($tip['Tipo_Id'] == $usu['Tipo_Id']) {
                                echo "<option value='".$tip['Tipo_Id']."' selected>".$tip['Tipo_Nombre']."</option>";
                            } else {
                                echo "<option value='".$tip['Tipo_Id']."'>".$tip['Tipo_Nombre']."</option>";
                            }
                        }
                    ?>
                </select>               
                <input type="number" class="form-control" id="Usu_Num_Identificacion" name="Usu_Num_Identificacion" placeholder="Numero de Identificación" value="<?php echo $usu['Usu_Num_Identificacion'] ?>" max="99999999999" required>                
            </div>
            <div class="col-md-6">
                <label for="Rol_Id" class="control-">Rol</label>
                <select class="form-control" name="Rol_Id" id="Rol_Id">
                    <option value="">Seleccione..</option>
                    <?php
                        foreach ($roles as $rol) {
                            if ($rol['Rol_Id'] == $usu['Rol_Id']) {
                                echo "<option value='".$rol['Rol_Id']."' selected>".$rol['Rol_Nombre']."</option>";
                            } else {
                                echo "<option value='".$rol['Rol_Id']."'>".$rol['Rol_Nombre']."</option>";
                            }
                        }
                    ?>
                </select>            
            </div>
        </div>

        <div class="row col-md-12 mx-auto mt-5">
            <label for="Usu_Imagen" class="control-label w-100 d-block mx-auto text-center">Cargar Imagen</label>
            <input type='hidden' name='imagenVieja' id='imagenVieja' value='<?php echo $usu['Usu_Imagen'] ?>'>
            <div id="contenedorImagen" class="mx-auto">
                <div class="w-100">
                    <img src="<?php
                        if ($usu['Usu_Imagen']) {
                            echo $usu['Usu_Imagen'];
                        } else {
                            echo "images/Usuarios/desconocido.svg";
                        }                    
                    ?>" alt="<?php echo $usu['Usu_Nombre'] ?>" id="imagen" class="rounded-circle size-productos d-block mx-auto" style="width:50%; height:6rem;max-height:200px;min-height:100px;max-width:250px" data-name="Usu_Imagen">
                </div>
                <button type="button" class="btn btn-primary mt-3 d-block mx-auto" id="cambioImagen">Cambiar Imagen</button>
            </div>
        </div>    
          
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-info">Actualizar</button>
    </div>
</form>
<?php
    }
?>