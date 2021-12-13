<?php
    include_once '../model/Admin/AdminModel.php';

    if ((isset($_SESSION['id'])) AND ($_SESSION['rol_id'] > 1)) {

        class AdminController {            
            public function cantNotificaciones() {
                $obj = new AdminModel;

                $usuario = $_SESSION['id'];
                $sql = "SELECT Count(*) FROM Notificacion WHERE Usu_Id = $usuario AND Not_Estado IS NOT NULL";
                $cantidadSQL = $obj->consult($sql);
                $cant = mysqli_fetch_row($cantidadSQL);

                include_once '../view/Admin/cant_Notificaciones.php';
            }

            public function notificacion() {
                $obj = new AdminModel;                

                $usuario = $_SESSION['id'];
                $sql = "SELECT Not_Id,Usu_Id,Not_Titulo,Not_Descripcion, Not_Estado, Not_Color, Not_Icono,Not_Fecha FROM Notificacion WHERE Usu_Id = $usuario ORDER BY Not_Estado DESC,Not_Fecha DESC LIMIT 4";
                $notificaciones = $obj->consult($sql);

                include_once '../view/Admin/notificaciones.php';
            }

            public function masNotificaciones() {
                $obj = new AdminModel;                

                $usuario = $_SESSION['id'];
                $sql = "SELECT Not_Id,Usu_Id,Not_Titulo,Not_Descripcion, Not_Estado, Not_Color, Not_Icono,Not_Fecha FROM Notificacion WHERE Usu_Id = $usuario ORDER BY Not_Estado DESC,Not_Fecha DESC";
                $notificaciones = $obj->consult($sql);

                include_once '../view/Admin/notificaciones.php';
            }

            public function marcarLeido() {
                $obj = new AdminModel;

                $id = $_POST['id'];
                $sql = "UPDATE Notificacion SET Not_Estado = NULL WHERE Not_Id = $id";
                $ejecutar = $obj->update($sql);

                $usuario = $_SESSION['id'];
                $sql = "SELECT Not_Id,Usu_Id,Not_Titulo,Not_Descripcion, Not_Estado, Not_Color, Not_Icono,Not_Fecha FROM Notificacion WHERE Usu_Id = $usuario ORDER BY Not_Estado DESC,Not_Fecha DESC";
                $notificaciones = $obj->consult($sql);

                include_once '../view/Admin/notificaciones.php';
            }

            public function marcarEliminado() {
                $obj = new AdminModel;

                $id = $_POST['id'];
                $sql = "DELETE FROM Notificacion WHERE Not_Id = $id";
                $ejecutar = $obj->update($sql);

                $usuario = $_SESSION['id'];
                $sql = "SELECT Not_Id,Usu_Id,Not_Titulo,Not_Descripcion, Not_Estado, Not_Color, Not_Icono,Not_Fecha FROM Notificacion WHERE Usu_Id = $usuario ORDER BY Not_Estado DESC,Not_Fecha DESC";
                $notificaciones = $obj->consult($sql);

                include_once '../view/Admin/notificaciones.php';
            }

            public function notificarCorreo() {
                $obj = new AdminModel;

                $correo = $_POST['correo'];
                $notificacion = 0;
                
                $result = (false !== filter_var($correo, FILTER_VALIDATE_EMAIL));
  
                if ($result) {
                    list($user, $domain) = explode('@', $correo);                    
                    $result = checkdnsrr($domain, 'MX');

                    if ($result) {
                        
                        $id = $obj->autoincrement("Correo","Cor_Id");
                        $sql = "INSERT INTO Correo VALUES($id,'$correo')";
                        $ejecutar = $obj->insert($sql);
        
                        if ($ejecutar) {
                            $notificacion = 1;                            
                        } else {
                            $notificacion = 2;
                        }
                        
                    } else {
                        $notificacion = 3;
                    }
                }
                include_once '../view/Admin/estadoCorreo.php';
            }

            public function mostrarCorreos() {
                $obj = new AdminModel();

                $sql = "SELECT COUNT(*) FROM Correo";
                $correos = $obj->consult($sql);
                $correos = mysqli_fetch_row($correos);

                include_once '../view/Admin/cantCorreos.php';
            }            

            public function correos() {
                $obj = new AdminModel;                

                $sql = "SELECT Cor_Direccion,Cor_Id FROM Correo ORDER BY Cor_Id DESC";
                $correos = $obj->consult($sql);

                include_once '../view/Admin/correos.php';
            }
        } 
    }else {
            redirect(getUrl("Inicio","Inicio","inicio"));
    }
?>