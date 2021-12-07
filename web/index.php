<?php
    include_once '../lib/helpers.php';

    echo "<!DOCTYPE html>
        <html lang='en'>";

        include_once '../view/Partials/head.php';
        
        echo "<body>";
        include_once '../view/Partials/navbar.php';
        
            if (isset($_GET['modulo'])) {
                resolve();
            } else {
                redirect(getUrl("Inicio","Inicio","inicio"));
            }

        include_once '../view/Partials/modal.php';
        include_once '../view/Partials/footer.php';


        echo "</body>";
    echo "</html>";
?>