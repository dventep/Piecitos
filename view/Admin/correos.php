<?php
    while ($correo = mysqli_fetch_assoc($correos)) {
?>    
    <a class="dropdown-item d-flex align-items-center alternarBackground" href="#">
        <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" style="width:60px;color:red;" src="images/Usuarios/desconocido.svg"
                alt="Correo interesado">
        </div>
        <div>
            <div class="text-truncate font-weight-bold"><?php echo $correo['Cor_Direccion'] ?></div>
            <div class="small" style="color:#17a2b8;">Interesado</div>
        </div>
    </a>
<?php
    }
?>