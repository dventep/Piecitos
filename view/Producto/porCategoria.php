<?php
if (mysqli_fetch_row($productos) > 0) {
    foreach ($productos as $pro) {
?>
    <tr>
        <th class="align-middle" scope="row"><?php echo $pro['Pro_Id'];  ?></th>
        <td class="align-middle">                                        
            <img src="<?php echo $pro['Pro_Imagen'] ?>" alt="<?php echo $pro['Pro_Nombre']." ".$pro['Pro_Apellido'] ?>" class="mx-auto size-productos" style="height: 6rem;max-width: 6rem;width:100%;">
        </td>
        <td class="align-middle"><?php echo $pro['Pro_Nombre']; ?></td>
        <td class="align-middle"><?php echo $pro['Cat_Nombre']; ?></td>
        <td class="align-middle"><?php echo number_format($pro['Pro_Cantidad']); ?></td>
        <td class="align-middle"><?php echo "$".number_format($pro['Pro_Costo']); ?></td>
        <td class="align-middle"><?php echo "$".number_format($pro['Pro_Precio']); ?></td>
        <td class="align-middle"><span class="cursor-pointer" data-toggle="tooltip" data-placement="top" title="<?php if ($pro['Pro_Descuento'] != 0) {
                        echo "$".number_format($pro['Pro_Precio'] - (($pro['Pro_Precio'] * $pro['Pro_Descuento']) / 100));
                    } else { 
                        echo "$".number_format($pro['Pro_Precio']);
                    }
                ?>"><?php echo $pro['Pro_Descuento']."%"; ?></span></td>
        <td class="align-middle">
            <button class="btn btn-info editarModal" id="<?php echo "BtnEditar".$pro['Pro_Id']; ?>" data-url="<?php echo getUrl("Producto","Producto","getUpdate",false,"ajax") ?>" data-id="<?php echo $pro['Pro_Id']; ?>" data-tipo="producto">
                <i class="fas fa-edit"></i>
            </button>
        </td>
        <td class="align-middle">
            <button class="btn btn-danger eliminarModal" id="<?php echo "BtnEliminar".$pro['Pro_Id']; ?>" data-url="<?php echo getUrl("Producto","Producto","getDelete",false,"ajax"); ?>" data-id="<?php echo $pro['Pro_Id'] ?>" data-tipo="producto">
                <i class="fas fa-trash-alt"></i>
            </button>
        </td>
    </tr>
<?php
    }
} else {
    echo "<tr><td colspan='10'>No hay productos que mostrar</td></tr>";
}
?>