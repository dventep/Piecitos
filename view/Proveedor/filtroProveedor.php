<?php

if (mysqli_fetch_row($proveedores) > 0) {
    foreach ($proveedores as $prov) {
?>
    <tr>
        <th class="align-middle" scope="row"><?php echo $prov['Prov_Id'];  ?></th>
        <td class="align-middle">
            <?php 
                echo $prov['Prov_Nombre'];
                echo "<span class='badge badge-warning text-dark rounded-circle position-relative' style='top:-10px'>";
                $cont=true;
                foreach ($cantidades as $cant) {
                    if ($cant['Prov_Id'] == $prov['Prov_Id']) {
                        echo $cant['Cantidad'];
                        $cont = false;
                    }
                }
                if ($cont) {echo 0;} 
                echo "</span>";
            ?>
        </td>
        <td class="align-middle"><?php echo $prov['Prov_Razon_Social']; ?></td>
        <td class="align-middle"><?php echo $prov['Prov_Direccion']; ?></td>
        <td class="align-middle"><?php echo $prov['Prov_Correo']; ?></td>
        <td class="align-middle"><?php echo $prov['Prov_Telefono']; ?></td>
        <td class="align-middle">
            <button class="btn btn-info editarModal" id="<?php echo "BtnEditar".$prov['Prov_Id']; ?>" data-url="<?php echo getUrl("Proveedor","Proveedor","getUpdate",false,"ajax") ?>" data-id="<?php echo $prov['Prov_Id']; ?>" data-tipo="proveedor">
                <i class="fas fa-users-cog"></i>
            </button>
        </td>
        <td class="align-middle">
            <button class="btn btn-danger eliminarModal" id="<?php echo "BtnEliminar".$prov['Prov_Id']; ?>" data-url="<?php echo getUrl("Proveedor","Proveedor","getDelete",false,"ajax"); ?>" data-id="<?php echo $prov['Prov_Id'] ?>" data-tipo="proveedor">
                <i class="fas fa-users-slash"></i>
            </button>
        </td>
    </tr>
<?php
    }
} else {                                        
    echo "<td colspan='8' class='text-center'>No hay proveedores que mostrar</td>";
}
?>