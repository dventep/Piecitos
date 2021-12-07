<?php
    while ($pro = mysqli_fetch_assoc($producto)) {
?>
<form action="<?php echo getUrl("Producto","Producto","postUpdate") ?>" method="post" enctype="multipart/form-data">
    <div class="modal-body pt-3 text-light">
        
        <input type="hidden" name="Pro_Id" id="Pro_Id" value="<?php echo $pro['Pro_Id'] ?>">

        <div class="row col-md-12 px-5 mx-auto">
            <input type="hidden" name="Nombre_Viejo" value="<?php echo $pro['Pro_Nombre'] ?>">
            <label for="Pro_Nombre" class="control-">Nombre</label>
            <input type="text" class="form-control" id="Pro_Nombre" name="Pro_Nombre" placeholder="Nombre del Producto" value="<?php echo $pro['Pro_Nombre'] ?>" maxlength="50" required>
        </div>
        <div class="row col-md-12 px-5 pb-3 mx-auto mt-3">
            <label for="Pro_Descripcion" class="control-labe">Descripción</label>
            <textarea name="Pro_Descripcion" class="form-control" id="Pro_Descripcion" cols="100%" rows="10" placeholder="Descripción del Producto" required autocorrect maxlenght="500"><?php echo $pro['Pro_Descripcion'] ?></textarea>
        </div>
        <div class="d-flex justify-content-center flex-wrap col-md-12 pt-3 pb-4 border-top border-bottom border-light">
            <div class="col-md-5 mx-a">
                <label for="Pro_Costo" class="control-labe">Costo ($)</label>
                <input type="number" class="form-control" id="Pro-Costo" name="Pro_Costo" maxlenght="11" placeholder="Costo" value="<?php echo $pro['Pro_Costo'] ?>" required>
            </div>
            <div class="col-md-5 mx-auto">
                <label for="Pro_Precio" placeholder="Precio de Venta">Precio ($)</label>
                <input type="number" class="form-control" id="Pro_Precio" name="Pro_Precio" maxlength="11" placeholder="Precio de Venta" value="<?php echo $pro['Pro_Precio'] ?>" required>
            </div>
            <div class="col-md-5 mx-auto mt-2">
                <label for="Pro_Descuento">Descuento (%)</label>
                <input type="number" class="form-control" id="Pro_Descuento" name="Pro_Descuento" maxlength="3" max="100" placeholder="Descuento" value="<?php echo $pro['Pro_Descuento'] ?>" required>
            </div>
        </div>
        <div class="d-flex justify-content-center flex-wrap col-md-12 pt-3 pb-4 border-top border-bottom border-light">
            <div class="col-md-5 mx-auto">
                <label for="Pro_Cantidad" class="control-label">Cantidad</label>
                <input type="number" id="Pro_Cantidad" name="Pro_Cantidad" class="form-control" placeholder="Cantidad Actual" value="<?php echo $pro['Pro_Cantidad'] ?>" maxlength="11" required>
            </div>
            <div class="col-md-5 mx-auto">
                <input type="hidden" name="Cat_Viejo" value="<?php echo $pro['Cat_Id'] ?>">
                <label for="Pro_Categoria" class="control-label">Categoria</label>
                <select name="Pro_Categoria" id="Pro_Categoria" class="form-control" required>
                    <?php                        
                        foreach ($categorias as $categoria) {
                            if ($pro['Cat_Id'] == $categoria['Cat_Id']) {
                    ?>
                                <option value="<?php echo $categoria["Cat_Id"]."_".$categoria["Cat_Nombre"] ?>" selected><?php echo $categoria['Cat_Nombre']; ?></option>
                    <?php 
                            } else {
                                echo "<option value='".$categoria["Cat_Id"]."_".$categoria["Cat_Nombre"]."'>".$categoria["Cat_Nombre"]."</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-5 mx-auto mt-2">
                <label for="Pro_Color" class="control-label">Color</label>
                <select name="Pro_Color" id="Pro_Color" class="form-control" required>
                    <?php
                        foreach ($colores as $color) {
                            if ($pro['Col_Id'] == $color['Col_Id']) {
                                echo "<option value='".$color["Col_Id"]."' selected>".$color["Col_Nombre"]."</option>";
                            } else {
                                echo "<option value='".$color["Col_Id"]."'>".$color["Col_Nombre"]."</option>";
                            }
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="row col-md-12 pt-3 pb-4 border-top border-bottom border-light">
            <div class="col-md-8 mx-auto">
                <label for="Pro_Proveedor" class="control-label">Proveedor</label>
                <select name="Pro_Proveedor" id="Pro_Proveedor" class="form-control" required>
                    <option value="">Seleccione...</option>
                    <?php
                        foreach ($proveedores as $proveedor) {
                            if ($pro['Prov_Id'] == $proveedor['Prov_Id']) {
                                echo "<option value='".$proveedor["Prov_Id"]."' selected>".$proveedor["Prov_Nombre"]."</option>";
                            } else {
                                echo "<option value='".$proveedor["Prov_Id"]."'>".$proveedor["Prov_Nombre"]."</option>";
                            }
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="row col-md-12 mx-auto mt-5">
            <label for="Pro_Imagen" class="control-label w-100 d-block mx-auto text-center">Cargar Imagen</label>
            <input type='hidden' name='imagenVieja' id='imagenVieja' value='<?php echo $pro['Pro_Imagen'] ?>'>
            <div id="contenedorImagen" class="mx-auto">
                <div class="w-100">
                    <img src="<?php
                        if ($pro['Pro_Imagen']) {
                            echo $pro['Pro_Imagen'];
                        } else {
                            echo "";
                        }                    
                    ?>" alt="<?php echo $pro['Pro_Nombre'] ?>" id="imagen" class="d-block mx-auto" style="height:100%;max-height:200px;min-height:100px;max-width:250px" data-name="Pro_Imagen">
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