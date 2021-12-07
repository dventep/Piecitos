<?php
    while ($prov = mysqli_fetch_assoc($proveedor)) {
?>
<form action="<?php echo getUrl("Proveedor","Proveedor","postDelete") ?>" method="post">
    <div class="modal-body pt-3 text-light">
               
        <input type="hidden" name="Prov_Id" id="Prov_Id" value="<?php echo $prov['Prov_Id'] ?>">    

        <div class="row col-md-12 px-5 mx-auto mb-3">
            <label for="Prov_Nombre" class="control-">Nombre</label>
            <input type="text" class="form-control" id="Prov_Nombre" name="Prov_Nombre" value="<?php echo $prov['Prov_Nombre'] ?>" readonly>
        </div>
        <div class="row col-md-12 px-5 mx-auto mb-3">
            <label for="Prov_Razon_Social" class="control-">Razón social</label>
            <input type="text" class="form-control" id="Prov_Razon_Social" name="Prov_Razon_Social" value="<?php echo $prov['Prov_Razon_Social'] ?>" disabled>
        </div>
        <div class="row col-md-12 px-5 mx-auto mb-3">
            <label for="Prov_Direccion" class="control-">Direccion</label>
            <input type="text" class="form-control" id="Prov_Direccion" name="Prov_Direccion" value="<?php echo $prov['Prov_Direccion'] ?>" disabled>
        </div>
        <div class="row col-md-12 px-5 mx-auto mb-3">
            <label for="Prov_Correo" class="control-">Correo Electrónico</label>
            <input type="email" class="form-control" id="Prov_Correo" name="Prov_Correo" value="<?php echo $prov['Prov_Correo'] ?>" disabled>
        </div>
        <div class="row col-md-12 px-5 mx-auto">
            <label for="Prov_Telefono" class="control-">Telefono</label>
            <input type="number" class="form-control" id="Prov_Telefono" name="Prov_Telefono" value="<?php echo $prov['Prov_Telefono'] ?>" disabled>
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