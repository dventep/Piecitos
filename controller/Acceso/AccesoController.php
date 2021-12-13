<?php
    include_once '../model/Acceso/AccesoModel.php';

    class AccesoController {

        public function iniciar() {
            include_once '../view/Acceso/iniciar.php';
        }
        public function registrar() {
            $obj = new AccesoModel();
            $sql = "SELECT Tipo_Id, Tipo_Nombre FROM Tipo_Id";
            $identificaciones = $obj->consult($sql);
            include_once '../view/Acceso/registrar.php';
        }
        public function signup() {
            if (isset($_POST) AND isset($_POST['nombre_input'])) {
                $obj = new AccesoModel();

                $_SESSION['nombre_input'] = $nombre = $_POST['nombre_input'];
                $_SESSION['apellido_input'] = $apellido = $_POST['apellido_input'];
                $_SESSION['num_Identificacion_input'] = $num_Identificacion = $_POST['num_Identificacion_input'];
                $_SESSION['correo_input'] = $correo = $_POST['correo_input'];
                $_SESSION['contrasena_input'] = $clave = $_POST['contraseña_input'];
                $_SESSION['identificacion_input'] = $identificacion = $_POST['identificacion_input'];
                $_SESSION['confirmar_input'] = $confirm_clave = $_POST['confirmar_input'];
                $is_Correct = True;
                
                $sql = "SELECT * FROM Usuario WHERE Usu_Correo = '$correo'";
                $if_email = $obj->consult($sql);
                $sql = "SELECT * FROM Usuario WHERE Usu_Num_Identificacion = '$num_Identificacion' AND Tipo_Id = '$identificacion'";
                $if_identificacion = $obj->consult($sql);

                if ($clave != $confirm_clave) {
                    $is_Correct = False;
                    $_SESSION['error'] = "Las contraseñas deben ser iguales.";
                    redirect(getUrl("Acceso","Acceso","registrar"));
                } else if (mysqli_num_rows($if_email) > 0) {
                    $is_Correct = False;
                    $_SESSION['error'] = "El correo ($correo) ya está tomado.";
                    redirect(getUrl("Acceso","Acceso","registrar"));
                } else if (mysqli_num_rows($if_identificacion) > 0) {
                    $is_Correct = False;
                    $_SESSION['error'] = "Ya existe una cuenta con este número de identificación ($num_Identificacion).";
                    redirect(getUrl("Acceso","Acceso","registrar"));
                }
                if ($is_Correct == True) {
                    $id = $obj->autoincrement("Usuario","Usu_Id");
                    $sql = "INSERT INTO Usuario VALUES ($id,'$nombre', '$apellido', Null, Null, $num_Identificacion, '$correo','$clave', NULL, $identificacion, 1)";

                    $ejecutar = $obj->insert($sql);

                    if ($ejecutar) {
                        unset($_SESSION['nombre_input']);
                        unset($_SESSION['apellido_input']);
                        unset($_SESSION['num_Identificacion_input']);
                        unset($_SESSION['correo_input']);
                        unset($_SESSION['contrasena_input']);
                        unset($_SESSION['identificacion_input']);
                        unset($_SESSION['confirmar_input']);
                        redirect(getUrl("Acceso","Acceso","iniciar"));
                        print("<br>Todo correcto");
                    } else {
                        $_SESSION['error'] = "Ha ocurrido un error al registrarte";
                        redirect(getUrl("Acceso","Acceso","registrar"));
                    }
                }
            } else {
                redirect(getUrl("Acceso", "Acceso", "registrar"));
            }
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