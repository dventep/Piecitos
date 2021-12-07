<?php
    include_once '../model/Acceso/AccesoModel.php';

    class AccesoController {

        public function iniciar() {
            include_once '../view/Acceso/iniciar.php';
        }
        public function registrar() {
            include_once '../view/Acceso/registrar.php';
        }
        public function login() {
            $obj = new AccesoModel();

            $user = $_POST['user'];
            $clave = $_POST['clave'];

            $sql = "SELECT Usu.Usu_Id, Usu.Usu_Nombre, Usu.Usu_Apellido, Usu.Usu_Telefono, Usu.Usu_Direccion, Usu.Usu_Num_Identificacion, Usu.Usu_Correo,Usu.Usu_Imagen, Usu.Tipo_Id, Usu.Rol_Id, Tip.Tipo_Id, Tip.Tipo_Nombre,Rol.Rol_Id, Rol.Rol_Nombre FROM Usuario Usu, Rol Rol, Tipo_Id Tip WHERE Usu.Tipo_Id = Tip.Tipo_Id AND Usu.Rol_Id = Rol.Rol_Id AND (Usu.Usu_Correo = '$user' OR Usu.Usu_Num_Identificacion = '$user') AND Usu.Usu_Clave = '$clave'";

            $usuario = $obj->consult($sql);

            if (mysqli_num_rows($usuario) > 0){
                while ($usu = mysqli_fetch_assoc($usuario)) {
                    $_SESSION['id'] = $usu['Usu_Id'];
                    $_SESSION['nombre'] = $usu['Usu_Nombre'];
                    $_SESSION['apellido'] = $usu['Usu_Apellido'];
                    $_SESSION['telefono'] = $usu['Usu_Telefono'];
                    $_SESSION['direccion'] = $usu['Usu_Direccion'];
                    $_SESSION['numero_id'] = $usu['Usu_Num_Identificacion'];
                    $_SESSION['correo'] = $usu['Usu_Correo'];

                    $_SESSION['foto'] = $usu['Usu_Imagen'];
                    if ($_SESSION['foto'] == "") {
                        $_SESSION['foto'] = "images/Usuarios/desconocido.svg";
                    }                    
                    $_SESSION['documento_id'] = $usu['Tipo_Id'];
                    $_SESSION['documento'] = $usu['Tipo_Nombre'];
                    $_SESSION['rol'] = $usu['Rol_Nombre'];
                    $_SESSION['rol_id'] = $usu['Rol_Id'];
                    $_SESSION['auth'] = "ok";

                    redirect("index.php");
                }
            } else {
                $_SESSION['error'] = "El Correo o el Número de Identificación y la Contraseña es incorrecta";
                redirect(getUrl("Acceso","Acceso","iniciar"));
            }
        }
        public function logout() {
            session_destroy();
            redirect(getUrl("Acceso","Acceso","iniciar"));
        }
    }
?>