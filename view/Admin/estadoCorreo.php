<?php

    if ($notificacion == 1) {
        echo '1<div id="submitSuccessMessage">
            <div class="text-center mb-3 mt-2 text-white">
                <div class="fw-bolder text-shadow">Se ha suscrito satisfactoriamente</div>
            </div>
        </div>';
    } else if ($notificacion == 2) {    
        echo '2<div id="submitSuccessMessage">
        <div class="text-center mb-3 mt-2 text-danger-p">
        <div class="fw-bolder text-shadow">Ha ocurrido un error al suscribirte.</div>
        </div>';    
    } else if ($notificacion == 3) {        
        echo '3<div id="submitSuccessMessage">
        <div class="text-center mb-3 mt-2 text-warning">
        <div class="fw-bolder text-shadow">El correo electrónico no es válido.</div>
        </div>';
    } else {
        echo '0<div id="submitSuccessMessage">
            <div class="text-center mb-3 mt-2 text-danger-p">
                <div class="fw-bolder text-shadow">Se necesita un correo electrónico</div>
            </div>';
    }
?>