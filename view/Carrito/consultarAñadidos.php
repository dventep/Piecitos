
    <link href="css_inicio/consultarAñadidos.css" rel="stylesheet" />

<div class="containerAñadidos">
    <div class="div-Añadidos my-4">
        <h1 class="h3 mb-0" style="color:#505050">Lista de Productos</h1>
    </div>
    <div class="div-Añadidos">
        <table class="table table-hover table-dark table-striped" style="width: 60% !important;border-radius: 0 0 37px 37px;">                        
            <thead class="text-dark text-center" style="background-color: #CB997E;">
                <tr>
                    <th scope="col" style="width:3rem">Item</th>
                    <th scope="col" style="width:3rem">Cantidad</th>
                    <th scope="col" style="width:4rem">Precio</th>
                    <th scope="col" style="width:20px"><i class="fas fa-minus-square"></i></th>
                </tr>
            </thead>
            <tbody id="tbody">
            <!-- Cada Tarjeta donde aparece cada Estadística Unificada "Números"  -->
            <?php

            if (mysqli_num_rows($productos) > 0) {
                foreach ($productos as $pro) {
            ?>
                <tr id="trProducts<?php echo $pro['Car_Det_Id']; ?>">
                    <td class="align-middle itemTable">                        
                        <img src="<?php echo $pro['Pro_Imagen'] ?>" alt="<?php echo $pro['Pro_Nombre']; ?>" class="size-productos" style="height: 6vw;width: 6vw;">
                        <?php echo $pro['Pro_Nombre']; ?>
                    </td>
                    <td class="align-middle text-center"><?php echo $pro['Car_Det_Cantidad']; ?></td>
                    <td class="align-middle text-center">$<?php echo number_format($pro['Car_Det_Total']); ?></td>
                    <td class="align-middle">
                        <button class="btn btn-danger eliminarCarDet" style="width:100%" id="<?php echo "BtnEliminarCarDet".$pro['Car_Det_Id']; ?>" data-url="<?php echo getUrl("Carrito","Carrito","getDelete",false,"ajax"); ?>" data-id="<?php echo $pro['Car_Det_Id'] ?>" data-tipo="Carrito" <?php if ($_SESSION['id']==$pro['Pro_Id']) { echo "disabled";} ?>>
                            <i class="fas fa-minus-square"></i>
                        </button>
                    </td>
                </tr>
            <?php
                }
            } else {
                echo "<td colspan='9' class='text-center'>No hay productos que mostrar</td>";
            }
            ?>
            
            <tr style="color: black !important">
                <td class="text-center" colspan="2" style="background-color: #EDDCD2;">Total</td>
                <td class="text-center text-light">
                    <?php while ($total = mysqli_fetch_assoc($totalCarrito)) { echo "$".number_format($total["Car_Total"]); } ?>
                </td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <?php
            if (mysqli_num_rows($productos) > 0) {

        ?>
            <button id="btnComprar" class="btn" data-url="<?php echo getUrl("Carrito", "Carrito", "metodoPago", false, "ajax"); ?>">Comprar</button>
            <div id="metodoPagoContainer"></div>
        <?php 
            }
        ?>
    </div>
</div>