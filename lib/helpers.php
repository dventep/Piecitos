<?php
    session_start();

    function redirect($url) {
        echo "<script type='text/javascript'>".
             "window.location.href='$url'".
            "</script>";
    }

    function dd($var) {
        echo "<pre>";
        die(print_r($var));
    }

    function getUrl($modulo,$controlador,$funcion,$parametros=false,$pagina=false) {

        if ($pagina == false) {
            $pagina = "index";
        }

        $url = "$pagina.php?modulo=$modulo&controlador=$controlador&funcion=$funcion";

        if ($parametros!=false) {
            foreach ($parametros as $key => $value) {
                $url.="&$key=$value";
            }
        }

        return $url;        
    }

    function resolve() {
        $modulo = ucwords($_GET['modulo']);
        $controlador = ucwords($_GET['controlador']);
        $funcion = $_GET['funcion'];

        if (is_dir("../controller/$modulo")) {
            
            if (file_exists("../controller/$modulo/".$controlador."Controller.php")) {
                
                include_once "../controller/$modulo/".$controlador."Controller.php";

                $nombreClase = $controlador."Controller";

                $objClase = new $nombreClase();

                if (method_exists($objClase,$funcion)) {
                    $objClase->$funcion();
                } else {
                    echo "La función especificada no existe";
                }
            } else {
                echo "El controlador especificado no existe";
            }
        } else {
            echo "el módulo especificado no existe";
        }
    }

    function validate($texto) {

        $noValidos = "?¿!¡#$%&@/()=|°¬\'".'"'.";,:._-{}[]+~1234567890";
        $cont = 0;
        for ($i=0; $i < strlen($texto); $i++) {
            for ($k = 0; $k < strlen($texto); $k++) {
                if ($texto[$i] == $noValidos[$k]) {
                    $cont++;
                }
            }
        }

        if ($cont == 0) {
            return true;
        } else {
            return false;
        }
    }
    


?>