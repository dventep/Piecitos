<?php

if (mysqli_fetch_row($usuarios) > 0) {
    foreach ($usuarios as $usu) {
?>
    <tr>
        <th class="align-middle" scope="row"><?php echo $usu['Usu_Id'];  ?></th>
        <td class="align-middle"><?php
            if (!isset($usu['Usu_Imagen']) || ($usu['Usu_Imagen'] == "")) {
                $usu['Usu_Imagen'] = "images/Usuarios/desconocido.svg";
            } ?> 
            
            <img src="<?php echo $usu['Usu_Imagen'] ?>" alt="<?php echo $usu['Usu_Nombre']." ".$usu['Usu_Apellido'] ?>" class="rounded-circle mx-auto size-productos" style="height: 6rem;max-width: 6rem;width:100%;">
        </td>
        <td class="align-middle"><?php echo $usu['Usu_Nombre']." ".$usu['Usu_Apellido']; ?></td>
        <td class="align-middle"><?php echo $usu['Rol_Nombre']; ?></td>
        <td class="align-middle"><?php echo $usu['Usu_Telefono']; ?></td>
        <td class="align-middle"><?php echo $usu['Usu_Direccion']; ?></td>
        <td class="align-middle"><?php echo $usu['Usu_Correo']; ?></td>
        <td class="align-middle">
            <button class="btn btn-info editarModal" id="<?php echo "BtnEditar".$usu['Usu_Id']; ?>" data-url="<?php echo getUrl("Usuario","Usuario","getUpdate",false,"ajax") ?>" data-id="<?php echo $usu['Usu_Id']; ?>" data-tipo="usuario">
                <i class="fas fa-user-edit"></i>
            </button>
        </td>
        <td class="align-middle">
            <button class="btn btn-danger eliminarModal" id="<?php echo "BtnEliminar".$usu['Usu_Id']; ?>" data-url="<?php echo getUrl("Usuario","Usuario","getDelete",false,"ajax"); ?>" data-id="<?php echo $usu['Usu_Id'] ?>" data-tipo="usuario" <?php if ($_SESSION['id']==$usu['Usu_Id']) { echo "disabled";} ?>>
                <i class="fas fa-user-minus"></i>
            </button>
        </td>
    </tr>
<?php
    }
} else {
    echo "<td colspan='9' class='text-center'>No hay usuarios que mostrar</td>";
}
?>