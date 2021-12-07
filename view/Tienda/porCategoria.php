<?php

if (mysqli_fetch_row($productos) > 0) {
    foreach ($productos as $pro) {
?>
    <div class="card box-shadow my-3" style="width: 20%;background:#FFF1E6;min-width: 240px;">
        <div class="position-relative">
            
            <img class="card-img-top size-productos" style="height: 10rem; object-position: center;" src="<?php echo $pro['Pro_Imagen']; ?>" alt="Imagen de <?php echo $pro['Pro_Nombre']; ?>">
        </div>
        <div class="card-body pt-2">

            <h5 class="card-title text-left font-weight-bold mb-0">
                <?php
                    if (strlen($pro['Pro_Nombre']) < 40) {
                        echo $pro['Pro_Nombre']; 
                    } else {
                        echo substr($pro['Pro_Nombre'],0,35)."...";
                    }
                ?>
            </h5>
            <p>
                <?php echo $pro['Cat_Nombre']; ?>
            </p>
            <?php  if ($pro['Pro_Descuento'] != 0) {  ?>
                <p  class='text-dark font-weight-bold' style="margin-bottom: 0;">
                    <?php 
                        echo "<span style='color: #afaaaa; text-decoration: line-through;'>$".number_format($pro['Pro_Precio'])."</span> - ".$pro['Pro_Descuento']."%";
                    ?>
                </p>
            <?php } ?>
            <p style="color:#674d3f;font-weight:bold;font-size:1.5rem">
                <?php 
                    if ($pro['Pro_Descuento'] != 0) {
                        echo "$".number_format($pro['Pro_Precio'] - (($pro['Pro_Precio'] * $pro['Pro_Descuento']) / 100));
                    } else { 
                        echo "$".number_format($pro['Pro_Precio']);
                    }
                ?>
            </p>

            <span class="font-weight-bold w-60">Color:</span> <p class="w-100"><?php echo $pro['Col_Nombre'] ?></p>
            <div class="row col-md-12 m-0">
                <button class="btn mb-3 mx-auto text-light detallesCarrito cantidadCarrito" data-url="<?php echo getUrl("Carrito", "Carrito","verDetalles",false, "ajax"); ?>" id="<?php echo $pro['Pro_Id']; ?>" style="background: #676762; border: 0;">
                    <i class="fas fa-cart-plus text-light"></i>
                    Añadir al carrito
                </button>
            </div>
        </div>            
    </div>
<?php
    }
} else {        
    echo "<span class='pb-5'>No hay productos que mostrar.</span>";
}
?>