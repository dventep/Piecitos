<form action="<?php echo getUrl("Usuario","Usuario","postInsert") ?>" method="post" enctype="multipart/form-data">
    <div class="modal-body pt-3 text-light">  

        <div class="row col-md-12 mx-auto mb-3">
            <div class="col-md-6">
                <label for="Usu_Nombre" class="control-">Nombre</label>
                <input type="text" class="form-control" id="Usu_Nombre" name="Usu_Nombre" placeholder="Nombre del Usuario" maxlength="30" required>                
            </div>
            <div class="col-md-6">
                <label for="Usu_Apellido" class="control-">Apellido</label>
                <input type="text" class="form-control" id="Usu_Apellido" name="Usu_Apellido" placeholder="Apellido del Usuario" maxlength="30" required>                
            </div>
        </div>
        <div class="row col-md-12 mx-auto mb-3">
            <div class="col-md-6">
                <label for="Usu_Telefono" class="control-">Telefono</label>
                <input type="tel" class="form-control" id="Usu_Telefono" name="Usu_Telefono" placeholder="Telefono del Usuario" maxlength="15" required>                
            </div>
            <div class="col-md-6">
                <label for="Usu_Direccion" class="control-">Direccion</label>
                <input type="text" class="form-control" id="Usu_Direccion" name="Usu_Direccion" placeholder="Direccion del Usuario" maxlength="30" required>   
            </div>
        </div>
        <div class="row col-md-12 mx-auto mb-3">
            <div class="col-md-12 mx-auto">
                <label for="Usu_Correo" class="control-">Correo</label>
                <input type="email" class="form-control" id="Usu_Correo" name="Usu_Correo" placeholder="Correo del Usuario" maxlength="30" required>                
            </div>
            <div class="col-md-6 mx-auto">
                <label for="Usu_Clave" class="control-">Contraseña</label>
                <input type="password" class="form-control" id="Usu_Clave" name="Usu_Clave" placeholder="Contraseña del Usuario" maxlength="30" required> 
            </div>
        </div>

        <div class="row col-md-12 mx-auto mb-3">
            <div class="col-md-6">
                <label for="Usu_Num_Identificacion" class="control-">Numero de Identificación</label>
                <select class="form-control" name="Tipo_Id" id="Tipo_Id" style="background:#EDDCD2;">
                    <option value="">Seleccione..</option>
                    <?php
                        foreach ($tipo_identificacion as $tip) {
                            echo "<option value='".$tip['Tipo_Id']."'>".$tip['Tipo_Nombre']."</option>";
                        }
                    ?>
                </select>               
                <input type="number" class="form-control" id="Usu_Num_Identificacion" name="Usu_Num_Identificacion" placeholder="Numero de Identificación" max="99999999999" required>                
            </div>
            <div class="col-md-6">
                <label for="Rol_Id" class="control-">Rol</label>
                <select class="form-control" name="Rol_Id" id="Rol_Id">
                    <option value="">Seleccione..</option>
                    <?php
                        foreach ($roles as $rol) {
                            echo "<option value='".$rol['Rol_Id']."'>".$rol['Rol_Nombre']."</option>";
                        }
                    ?>
                </select>            
            </div>
        </div>

        <div class="row col-md-12 mx-auto mt-5">
            <label for="Usu_Imagen" class="control-label col-md-9 d-block mx-auto text-center">Cargar Imagen<br>(No es obligatorio este campo)</label>
            <input type="file" name="Usu_Imagen" class="mx-auto form-control" id="Usu_Imagen">
        </div>         
          
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Añadir</button>
    </div>
</form>