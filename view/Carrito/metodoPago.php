<div class="descripcionFinalizarCompra">
    <form action="<?php echo getUrl("Carrito", "Carrito","generarFactura"); ?>" method="post">
    <section id="frsSectionCompra">
        <span>Completa los campos</span>
    </section>
    <section id="sndSectionCompra">
        <label class="control-label" for="metodoPagoOption">Método de pago</label>
        <select class="form-control col-md-12" name="metodoPagoOption" id="metodoPagoOption" required>
            <option value="">Seleccione..</option>
            <?php 
                while ($metodo = mysqli_fetch_assoc($metodosPago)) {
            ?>
                <option value="<?php echo $metodo['Met_Pag_Id'] ?>"><?php echo $metodo['Met_Pag_Nombre'] ?></option>
            <?php
                }
            ?>
        </select>
        <label class="control-label" for="direccionEnvio">Dirección de envío</label>
        <input class="form-control col-md-12" type="text" id="direccionEnvio" name="direccionEnvio" placeholder="Especifique la dirección de quien recibe" required>        
    </section>
    <section id="thrSectionCompra">
        <button class="btn" type="submit" id="finalizarCompra" data-url="<?php echo getUrl("Carrito", "Carrito", "generarFactura"); ?>">Finalizar Compra</button>
    </section>
    </form>
</div>