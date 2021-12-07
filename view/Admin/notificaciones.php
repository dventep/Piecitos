
<?php 
    while ($noti = mysqli_fetch_assoc($notificaciones)) {
?>

<span class="dropdown-item d-flex align-items-center alternarBackground <?php if (!is_null($noti['Not_Estado'])) { echo 'cada_notificacion';} else { echo 'fondo-noti-leida';} ?>" data-color="<?php  $noti['Not_Color']; ?>" data-id="<?php echo $noti['Not_Id']; ?>" data-icono="<?php echo $noti['Not_Icono'] ?>" href="#">

    <?php if (!is_null($noti['Not_Estado'])) { echo '<div class="mr-3" data-id="'.$noti['Not_Id'].'"  title="Marcar como leído">'; } else { echo '<div class="mr-3" title="Marcado como leído">'; } ?>

        <button id="<?php echo 'cada-icono'.$noti['Not_Id']; ?>"  data-id="<?php echo $noti['Not_Id']; ?>" data-url="<?php echo getUrl("Admin","Admin","marcarLeido",false,"ajax"); ?>" class="<?php echo 'marcar-leido icon-circle bg-'.$noti['Not_Color']; ?>" style="cursor:pointer;">

            <i class="<?php if (is_null($noti['Not_Estado'])) { echo "fas fa-check-double"; } else { echo $noti['Not_Icono'].' text-white'; } ?>"></i>

        </button>

    </div>
    <div class="position-relative pb-3">

        <div class="<?php echo 'position-relative small font-weight-bold text-'.$noti['Not_Color']; ?>"><?php if (is_null($noti['Not_Estado'])) { echo "<span class='notificacion_leida rounded-bottom rounded-right'>LEIDO</span><br>"; } echo $noti['Not_Titulo']." ~ ".$noti['Not_Fecha'];?>
        </div>

        <span><?php if (is_null($noti['Not_Estado'])) { echo "<span class='font-italic font-weight-light'>".$noti['Not_Descripcion']."</span>"; } else { echo "<strong>".$noti['Not_Descripcion']."</strong>";} ?></span>
        
        <span class="marcar-eliminado text-danger" id="<?php echo 'marcar-eliminado'.$noti['Not_Id']; ?>" data-id="<?php echo $noti['Not_Id']; ?>" title="Eliminar notificación" data-url="<?php echo getUrl("Admin","Admin","marcarEliminado",false,"ajax"); ?>" style="position: absolute; right: -17px; bottom: -5px;cursor:pointer">
            <i class="fas fa-trash-alt"></i>
        </span>
        
    </div>
</span>
<?php 
    }
?>