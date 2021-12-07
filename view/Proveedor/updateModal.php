<?php
    while ($prov = mysqli_fetch_assoc($proveedor)) {
?>
<form action="<?php echo getUrl("Proveedor","Proveedor","postUpdate") ?>" method="post">
    <div class="modal-body pt-3 text-light">

        <input type="hidden" name="Prov_Id" id="Prov_Id" value="<?php echo $prov['Prov_Id'] ?>">    

        <div class="row col-md-12 px-5 mx-auto mb-3">
            <label for="Prov_Nombre" class="control-">Nombre</label>
            <input type="text" class="form-control" id="Prov_Nombre" name="Prov_Nombre" placeholder="Nombre del Proveedor" value="<?php echo $prov['Prov_Nombre'] ?>" maxlength="50" required>
        </div>
        <div class="row col-md-12 px-5 mx-auto mb-3">
            <label for="Prov_Razon_Social" class="control-">Razón social</label>
            <input type="text" class="form-control" id="Prov_Razon_Social" name="Prov_Razon_Social" placeholder="Razón social del Proveedor" value="<?php echo $prov['Prov_Razon_Social'] ?>" maxlength="50" required>
        </div>
        <div class="row col-md-12 px-5 mx-auto mb-3">
            <label for="Prov_Direccion" class="control-">Direccion</label>
            <input type="text" class="form-control" id="Prov_Direccion" name="Prov_Direccion" placeholder="Direccion del Proveedor" value="<?php echo $prov['Prov_Direccion'] ?>" maxlength="50" required>
        </div>
        <div class="row col-md-12 px-5 mx-auto mb-3">
            <label for="Prov_Correo" class="control-">Correo Electrónico</label>
            <input type="email" class="form-control" id="Prov_Correo" name="Prov_Correo" placeholder="Correo del Proveedor" value="<?php echo $prov['Prov_Correo'] ?>" maxlength="50" required>
        </div>
        <div class="row col-md-12 px-5 mx-auto">
            <label for="Prov_Telefono" class="control-">Telefono</label>
            <input type="number" class="form-control" id="Prov_Telefono" name="Prov_Telefono" placeholder="Telefono del Proveedor" max="99999999999" value="<?php echo $prov['Prov_Telefono'] ?>" required>
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