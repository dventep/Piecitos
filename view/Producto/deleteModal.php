<?php
    while ($pro = mysqli_fetch_assoc($producto)) {
?>
<form action="<?php echo getUrl("Producto","Producto","postDelete") ?>" method="post" enctype="multipart/form-data">
    <div class="modal-body pt-3 text-light">
        
        <input type="hidden" name="Pro_Id" id="Pro_Id" value="<?php echo $pro['Pro_Id'] ?>">

        <div class="row col-md-12 px-5 mx-auto">
            <label for="Pro_Nombre" class="control-">Nombre</label>
            <input type="text" class="form-control" id="Pro_Nombre" name="Pro_Nombre" value="<?php echo $pro['Pro_Nombre'] ?>" readonly>
        </div>
        <div class="row col-md-12 px-5 pb-3 mx-auto mt-3">
            <label for="Pro_Descripcion" class="control-labe">Descripción</label>
            <textarea name="Pro_Descripcion" class="form-control" id="Pro_Descripcion" cols="100%" disabled><?php echo $pro['Pro_Descripcion'] ?></textarea>
        </div>
        <div class="d-flex justify-content-center flex-wrap col-md-12 pt-3 pb-4 border-top border-bottom border-light">
            <div class="col-md-5 mx-a">
                <label for="Pro_Costo" class="control-label">Costo ($)</label>
                <input type="number" class="form-control" id="Pro-Costo" name="Pro_Costo" value="<?php echo $pro['Pro_Costo'] ?>" readonly>
            </div>
            <div class="col-md-5 mx-auto">
                <label for="Pro_Precio" placeholder="Precio de Venta">Precio ($)</label>
                <input type="number" class="form-control" id="Pro_Precio" name="Pro_Precio"value="<?php echo $pro['Pro_Precio'] ?>" disabled>
            </div>
            <div class="col-md-5 mx-auto mt-2">
                <label for="Pro_Descuento">Descuento (%)</label>
                <input type="number" class="form-control" id="Pro_Descuento" name="Pro_Descuento" value="<?php echo $pro['Pro_Descuento'] ?>" disabled>
            </div>
        </div>
        <div class="d-flex justify-content-center flex-wrap col-md-12 pt-3 pb-4 border-top border-bottom border-light">
            <div class="col-md-5 mx-auto">
                <label for="Pro_Cantidad" class="control-label">Cantidad</label>
                <input type="number" id="Pro_Cantidad" name="Pro_Cantidad" class="form-control" value="<?php echo $pro['Pro_Cantidad'] ?>" disabled>
            </div>
            <div class="col-md-5 mx-auto">
                <label for="Pro_Categoria" class="control-label">Categoria</label>
                <select name="Pro_Categoria" id="Pro_Categoria" class="form-control" disabled>
                    <option value="<?php echo $pro["Cat_Id"]."_".$pro["Cat_Nombre"] ?>" seleted><?php echo $pro['Cat_Nombre'] ?></option>
                </select>
            </div>
            <div class="col-md-5 mx-auto mt-2">
                <label for="Pro_Color" class="control-label">Color</label>
                <select name="Pro_Color" id="Pro_Color" class="form-control" disabled>
                    <?php
                        echo "<option value='".$pro["Col_Id"]."' selected>".$pro["Col_Nombre"]."</option>";
                    ?>
                </select>
            </div>
        </div>
        <div class="row col-md-12 pt-3 pb-4 border-top border-bottom border-light">
            <div class="col-md-8 mx-auto">
                <label for="Pro_Proveedor" class="control-label">Proveedor</label>
                <select name="Pro_Proveedor" id="Pro_Proveedor" class="form-control" disabled>
                    <?php
                        echo "<option value='".$pro["Prov_Id"]."' selected>".$pro["Prov_Nombre"]."</option>";
                    ?>
                </select>
            </div>
        </div>
        <div class="row col-md-12 mx-auto mt-5">
            <label for="Pro_Imagen" class="control-label w-100 d-block mx-auto text-center">Imagen del Producto</label>
            <div id="contenedorImagen" class="mx-auto">
                <img src="<?php
                    if ($pro['Pro_Imagen']) {
                        echo $pro['Pro_Imagen'];
                    } else {
                        echo "";
                    }                    
                ?>" alt="<?php echo $pro['Pro_Nombre'] ?>" id="imagen" class="d-block mx-auto" style="height:100%;max-height:200px;min-height:100px;max-width:250px">
                <input type="hidden" name="Pro_Imagen" id="Pro_Imagen" value="<?php echo $pro['Pro_Imagen']; ?>">
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