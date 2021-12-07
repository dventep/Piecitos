<form action="<?php echo getUrl("Producto","Producto","postInsert") ?>" method="post" enctype="multipart/form-data">

    <div class="modal-body pt-3 text-light">
        <div class="row col-md-12 px-5 mx-auto">
            <label for="Pro_Nombre" class="control-">Nombre</label>
            <input type="text" class="form-control" id="Pro_Nombre" name="Pro_Nombre" placeholder="Nombre del Producto" maxlength="50" required>
        </div>
        <div class="row col-md-12 px-5 pb-3 mx-auto mt-3">
            <label for="Pro_Descripcion" class="control-labe">Descripción</label>
            <textarea name="Pro_Descripcion" class="form-control" id="Pro_Descripcion" cols="100%" rows="10" placeholder="Descripción del Producto" required autocorrect maxlenght="500"></textarea>
        </div>
        <div class="d-flex justify-content-center flex-wrap col-md-12 pt-3 pb-4 border-top border-bottom border-light">
            <div class="col-md-5 mx-a">
                <label for="Pro_Costo" class="control-label">Costo ($)</label>
                <input type="number" class="form-control" id="Pro-Costo" name="Pro_Costo" maxlenght="11" placeholder="Costo" required>
            </div>
            <div class="col-md-5 mx-auto">
                <label for="Pro_Precio" placeholder="Precio de Venta">Precio ($)</label>
                <input type="number" class="form-control" id="Pro_Precio" name="Pro_Precio" maxlength="11" placeholder="Precio de Venta"required>
            </div>
            <div class="col-md-5 mx-auto mt-2">
                <label for="Pro_Descuento">Descuento (%)</label>
                <input type="number" class="form-control" id="Pro_Descuento" name="Pro_Descuento" maxlength="3" max="100" placeholder="Descuento" value="0" required>
            </div>
        </div>
        <div class="d-flex justify-content-center flex-wrap col-md-12 pt-3 pb-4 border-top border-bottom border-light">
            <div class="col-md-5 mx-auto">
                <label for="Pro_Cantidad" class="control-label">Cantidad</label>
                <input type="number" id="Pro_Cantidad" name="Pro_Cantidad" class="form-control" placeholder="Cantidad Actual" maxlength="11" required>
            </div>
            <div class="col-md-5 mx-auto">
                <label for="Pro_Categoria" class="control-label">Categoria</label>
                <select name="Pro_Categoria" id="Pro_Categoria" class="form-control" required>
                    <option value="">Seleccione...</option>
                    <?php
                        foreach ($categorias as $categoria) {
                            echo "<option value='".$categoria["Cat_Id"]."_".$categoria["Cat_Nombre"]."'>".$categoria["Cat_Nombre"]."</option>";
                        }

                    ?>
                </select>
            </div>
            <div class="col-md-5 mx-auto mt-2">
                <label for="Pro_Color" class="control-label">Color</label>
                <select name="Pro_Color" id="Pro_Color" class="form-control" required>
                    <option value="">Seleccione...</option>
                    <?php
                        foreach ($colores as $color) {
                            echo "<option value='".$color["Col_Id"]."'>".$color["Col_Nombre"]."</option>";
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
                            echo "<option value='".$proveedor["Prov_Id"]."'>".$proveedor["Prov_Nombre"]."</option>";
                        }

                    ?>
                </select>
            </div>
        </div>
        <div class="row col-md-12 mx-auto mt-5">
            <label for="Pro_Imagen" class="control-label col-md-6 d-block mx-auto text-center">Cargar Imagen</label>
            <input type="file" name="Pro_Imagen" class="mx-auto form-control" id="Pro_Imagen" required>
        </div>    
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Añadir</button>
    </div>
</form>