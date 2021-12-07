<?php
    while ($usu = mysqli_fetch_assoc($usuario)) {
?>
<form action="<?php echo getUrl("Usuario","Usuario","postDelete") ?>" method="post">
    <div class="modal-body pt-3 text-light">
               
    <input type="hidden" name="Usu_Id" id="Usu_Id" value="<?php echo $usu['Usu_Id'] ?>">    

    <div class="row col-md-12 mx-auto mb-3">
        <div class="col-md-6">
            <label for="Usu_Nombre" class="control-label">Nombre</label>
            <input type="text" class="form-control" id="Usu_Nombre" name="Usu_Nombre" value="<?php echo $usu['Usu_Nombre'] ?>" readonly>                
        </div>
        <div class="col-md-6">
            <label for="Usu_Apellido" class="control-">Apellido</label>
            <input type="text" class="form-control" id="Usu_Apellido" name="Usu_Apellido" value="<?php echo $usu['Usu_Apellido'] ?>" disabled>                
        </div>
    </div>
    <div class="row col-md-12 mx-auto mb-3">
        <div class="col-md-6">
            <label for="Usu_Telefono" class="control-">Telefono</label>
            <input type="text" class="form-control" id="Usu_Telefono" name="Usu_Telefono" value="<?php echo $usu['Usu_Telefono'] ?>" disabled>                
        </div>
        <div class="col-md-6">
            <label for="Usu_Direccion" class="control-">Direccion</label>
            <input type="text" class="form-control" id="Usu_Direccion" name="Usu_Direccion" value="<?php echo $usu['Usu_Direccion'] ?>" disabled>                
        </div>
    </div>
    <div class="row col-md-12 mx-auto mb-3">
        <div class="col-md-12 mx-auto">
            <label for="Usu_Correo" class="control-">Correo</label>
            <input type="text" class="form-control" id="Usu_Correo" name="Usu_Correo" value="<?php echo $usu['Usu_Correo'] ?>" disabled>                
        </div>
    </div>

    <div class="row col-md-12 mx-auto mb-3">
        <div class="col-md-6">
            <label for="Usu_Num_Identificacion" class="control-label">Numero de Identificación</label>
            <select name="Tipo_Id" id="Tipo_Id" style="background:#EDDCD2;" class="form-control" disabled>
                <?php
                    echo "<option value='".$usu['Tipo_Id']."' selected>".$usu['Tipo_Nombre']."</option>";
                ?>
            </select>                
            <input type="number" class="form-control" id="Usu_Num_Identificacion" name="Usu_Num_Identificacion" value="<?php echo $usu['Usu_Num_Identificacion'] ?>" disabled>                
        </div>
        <div class="col-md-6">
            <label for="Rol_Id" class="control-label">Rol</label>
            <select name="Rol_Id" id="Rol_Id" class="form-control" disabled>
                <?php
                    echo "<option value='".$usu['Rol_Id']."' selected>".$usu['Rol_Nombre']."</option>";
                ?>
            </select>            
        </div>
    </div>

    <div class="row col-md-12 mx-auto mt-5">
        <label for="Usu_Imagen" class="control-label w-100 d-block mx-auto text-center">Imagen del Usuario</label>
        <div id="contenedorImagen" class="mx-auto">
            <div class="w-100">
                <img src="<?php
                    if ($usu['Usu_Imagen']) {
                        echo $usu['Usu_Imagen'];
                    } else {
                        echo "";
                    }                    
                ?>" alt="<?php echo $usu['Usu_Nombre'] ?>" id="imagen" class="d-block mx-auto" style="height:100%;max-height:200px;min-height:100px;max-width:250px" data-name="Usu_Imagen">
                <input type="hidden" name="Usu_Imagen" id="Usu_Imagen" value="<?php echo $usu['Usu_Imagen']; ?>">
            </div>
        </div>
    </div>        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </div>
</form>
<?php
    }
?>