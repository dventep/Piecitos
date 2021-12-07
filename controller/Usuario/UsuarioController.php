<?php
    include_once '../model/Usuario/UsuarioModel.php';

    class UsuarioController {   

        public function lista() {
            if ((isset($_SESSION['id'])) AND ($_SESSION['rol_id'] > 1)) {
                $obj = new UsuarioModel();

                $sql = "SELECT Usu.Usu_Id,Usu.Usu_Nombre,Usu.Usu_Apellido,Usu.Usu_Telefono,Usu.Usu_Direccion,Usu.Usu_Num_Identificacion,Usu.Usu_Correo,Usu.Usu_Imagen,Usu.Tipo_Id,Usu.Rol_Id, Tip.Tipo_Id,Tip.Tipo_Nombre, Rol.Rol_Id,Rol.Rol_Nombre FROM Rol Rol, Tipo_Id Tip, Usuario Usu WHERE Usu.Rol_Id = Rol.Rol_Id AND Usu.Tipo_Id = Tip.Tipo_Id ORDER BY Usu.Usu_Id";
                $usuarios = $obj->consult($sql);

                $sql = "SELECT Rol_Id,Rol_Nombre FROM Rol";
                $roles = $obj->consult($sql);

                $sql = "SELECT Tipo_Id, Tipo_Nombre From Tipo_Id ORDER BY Tipo_Nombre";
                $tipo_identificacion = $obj->consult($sql);

                include_once '../view/Usuario/Usuario.php';
            } else {
                redirect(getUrl("Inicio", "Inicio", "Inicio"));
            }
        }

        public function getInsert() {
            if ((isset($_SESSION['id'])) AND ($_SESSION['rol_id'] > 1)) {
                $obj = new UsuarioModel();
                
                $sql = "SELECT Rol_Id,Rol_Nombre FROM Rol";
                $roles = $obj->consult($sql);

                $sql = "SELECT Tipo_Id, Tipo_Nombre From Tipo_Id ORDER BY Tipo_Nombre";
                $tipo_identificacion = $obj->consult($sql);

                include_once '../view/Usuario/insertModal.php';
            } else {
                redirect(getUrl("Inicio", "Inicio", "Inicio"));
            }
        }

        public function postInsert() {
            if ((isset($_SESSION['id'])) AND ($_SESSION['rol_id'] > 1)) {
                $obj = new UsuarioModel();

                $Id = $obj->autoincrement("Usuario","Usu_Id");
                $Nombre = $_POST['Usu_Nombre'];
                $Apellido = $_POST['Usu_Apellido'];
                $Telefono = $_POST['Usu_Telefono'];           
                $Direccion = $_POST['Usu_Direccion'];
                $Num_Identificacion = $_POST['Usu_Num_Identificacion'];
                $Correo = $_POST['Usu_Correo'];    
                $Clave = $_POST['Usu_Clave'];     
                $Tipo_Id = $_POST['Tipo_Id'];     
                $Rol_Id = $_POST['Rol_Id'];

                if (isset($_FILES['Usu_Imagen'])) {
                    if ($_FILES['Usu_Imagen']['name'] == "") {
                        
                        $ruta = "";
                    } else {
                        $Usu_Imagen = $_FILES['Usu_Imagen']['name'];
                        $ruta = "images/Usuarios/$Nombre"."_".$Apellido."_"."$Id.jpg";
        
                        move_uploaded_file($_FILES['Usu_Imagen']['tmp_name'],"$ruta");
                    }

                    $sql = "INSERT INTO Usuario VALUES($Id,'$Nombre','$Apellido','$Telefono','$Direccion',$Num_Identificacion,'$Correo','$Clave','$ruta','$Tipo_Id',$Rol_Id)";            
                } else {
                    $sql = "INSERT INTO Usuario VALUES($Id,'$Nombre','$Apellido','$Telefono','$Direccion',$Num_Identificacion,'$Correo','$Clave',Null,'$Tipo_Id',$Rol_Id)";                
                }

                $ejecutar = $obj->insert($sql);

                if ($ejecutar) {
                    $Usuario = $_SESSION['id'];
                    $Id = $obj->autoincrement("Notificacion","Not_Id");
                    if (strlen($Nombre) > 15) { $Nombre = substr($Nombre,0,15)."..."; }
                    $sql = "INSERT INTO Notificacion VALUES($Id,$Usuario,'USUARIOS', 'Se ha añadido el usuario ($Nombre) satisfactoriamente.','','success','fas fa-users',NULL)"; 
                    $ejecutar = $obj->insert($sql);

                    redirect(getUrl("Usuario","Usuario","lista"));
                } else {
                    echo "Ha ocurrido un error al ingresar datos.";
                }
                
            } else {
                redirect(getUrl("Inicio", "Inicio", "Inicio"));
            }
        }

        public function getUpdate() {
            if ((isset($_SESSION['id'])) AND ($_SESSION['rol_id'] > 1)) {
                $obj = new UsuarioModel();

                $id = $_POST['id'];

                $sql = "SELECT Usu.Usu_Id,Usu.Usu_Nombre,Usu.Usu_Apellido,Usu.Usu_Telefono,Usu.Usu_Direccion,Usu.Usu_Num_Identificacion,Usu.Usu_Correo,Usu.Usu_Imagen,Usu.Tipo_Id,Usu.Rol_Id, Tip.Tipo_Id,Tip.Tipo_Nombre, Rol.Rol_Id,Rol.Rol_Nombre FROM Rol Rol, Tipo_Id Tip, Usuario Usu WHERE Usu.Rol_Id = Rol.Rol_Id AND Usu.Tipo_Id = Tip.Tipo_Id AND Usu.Usu_Id = $id";
                $usuario = $obj->consult($sql);
                
                $sql = "SELECT Rol_Id,Rol_Nombre FROM Rol";
                $roles = $obj->consult($sql);

                $sql = "SELECT Tipo_Id, Tipo_Nombre From Tipo_Id ORDER BY Tipo_Nombre";
                $tipo_identificacion = $obj->consult($sql);

                include_once '../view/Usuario/updateModal.php';
            } else {
                redirect(getUrl("Inicio", "Inicio", "Inicio"));
            }
        }

        public function postUpdate() {
            if ((isset($_SESSION['id'])) AND ($_SESSION['rol_id'] > 1)) {
                $obj = new UsuarioModel();

                $Id = $_POST['Usu_Id'];
                $Nombre = $_POST['Usu_Nombre'];
                $Nombre_Viejo = $_POST['Nombre_Viejo'];
                $Apellido = $_POST['Usu_Apellido'];

                $Telefono = $_POST['Usu_Telefono'];           
                $Direccion = $_POST['Usu_Direccion'];
                $Num_Identificacion = $_POST['Usu_Num_Identificacion'];
                $Correo = $_POST['Usu_Correo'];

                $Tipo_Id = $_POST['Tipo_Id'];     
                $Rol_Id = $_POST['Rol_Id'];

                if (isset($_FILES['Usu_Imagen']) || ($Nombre != $Nombre_Viejo)) {
                    
                    $ruta = NULL;
                    if (isset($_FILES['Usu_Imagen']) AND ($_FILES['Usu_Imagen'] != Null)) {
                        $ruta = "images/Usuarios/$Nombre"."_".$Apellido."xs_"."$Id.jpg";
                        $imagenVieja = $_POST['imagenVieja'];
                        if ($imagenVieja != "" || $imagenVieja != Null) {
                            unlink($imagenVieja);
                        }
                        $Usu_Imagen = $_FILES['Usu_Imagen']['name'];
                        move_uploaded_file($_FILES['Usu_Imagen']['tmp_name'],$ruta);

                    } else {
                        $imagenVieja = $_POST['imagenVieja'];
                        if ($imagenVieja != "" || $imagenVieja != NULL) {  
                            $ruta = "images/Usuarios/$Nombre"."_".$Apellido."_"."$Id.jpg";
                            rename("$imagenVieja","$ruta");  
                        }                      
                    }
                    
                    $sql = "UPDATE Usuario SET Usu_Id = $Id, Usu_Nombre = '$Nombre', Usu_Apellido = '$Apellido', Usu_Telefono = '$Telefono', Usu_Direccion = '$Direccion', Usu_Num_Identificacion = $Num_Identificacion, Usu_Correo = '$Correo', Usu_Imagen = '$ruta', Tipo_Id = $Tipo_Id, Rol_Id = $Rol_Id  WHERE Usu_Id = $Id";
                } else {
                    $sql = "UPDATE Usuario SET Usu_Id = $Id, Usu_Nombre = '$Nombre', Usu_Apellido = '$Apellido', Usu_Telefono = '$Telefono', Usu_Direccion = '$Direccion', Usu_Num_Identificacion = $Num_Identificacion, Usu_Correo = '$Correo', Tipo_Id = $Tipo_Id, Rol_Id = $Rol_Id  WHERE Usu_Id = $Id";
                }
                
                $ejecutar = $obj->update($sql);

                if ($ejecutar) {

                    if ($_SESSION['id'] == $Id) {
                        $_SESSION['id'] = $_POST['Usu_Id'];
                        $_SESSION['nombre'] = $_POST['Usu_Nombre'];
                        $_SESSION['apellido'] = $_POST['Usu_Apellido'];
                        $_SESSION['telefono'] = $_POST['Usu_Telefono'];
                        $_SESSION['direccion'] = $_POST['Usu_Direccion'];
                        $_SESSION['numero_id'] = $_POST['Usu_Num_Identificacion'];
                        $_SESSION['correo'] = $_POST['Usu_Correo'];
                        if ($imagenVieja != "" || $imagenVieja != NULL || $_FILES['Usu_Imagen'] != Null) { $_SESSION['foto'] = $ruta; }
                        $_SESSION['documento_id'] = $_POST['Tipo_Id'];
                        $_SESSION['rol_id'] = $_POST['Rol_Id'];
                    }

                    $Usuario = $_SESSION['id'];
                    $Id = $obj->autoincrement("Notificacion","Not_Id");
                    if (strlen($Nombre) > 15) { $Nombre = substr($Nombre,0,15)."..."; }
                    $sql = "INSERT INTO Notificacion VALUES($Id,$Usuario,'USUARIOS', 'Se ha actualizado el usuario ($Nombre) satisfactoriamente.','','info','fas fa-users',NULL)"; 
                    $ejecutar = $obj->insert($sql);
                    

                    redirect(getUrl("Usuario","Usuario","lista"));
                } else {
                    echo "Ha ocurrido un error al actualizar, intente de nuevo";
                    echo "<a style='margin-top:100px' class='btn btn-danger' href='".getUrl("Usuario","Usuario","lista")."'>Volver</a>";
                }
            } else {
                redirect(getUrl("Inicio", "Inicio", "Inicio"));
            }
        }

        public function getDelete() {
            if ((isset($_SESSION['id'])) AND ($_SESSION['rol_id'] > 1)) {
                $obj = new UsuarioModel();

                $id = $_POST['id'];

                $sql = "SELECT Usu.Usu_Id,Usu.Usu_Nombre,Usu.Usu_Apellido,Usu.Usu_Telefono,Usu.Usu_Direccion,Usu.Usu_Num_Identificacion,Usu.Usu_Correo,Usu.Usu_Imagen,Usu.Tipo_Id,Usu.Rol_Id, Tip.Tipo_Id,Tip.Tipo_Nombre, Rol.Rol_Id,Rol.Rol_Nombre FROM Rol Rol, Tipo_Id Tip, Usuario Usu WHERE Usu.Rol_Id = Rol.Rol_Id AND Usu.Tipo_Id = Tip.Tipo_Id AND Usu.Usu_Id = $id";
                $usuario = $obj->consult($sql);           

                if ($usuario) {
                    include_once '../view/Usuario/deleteModal.php';
                } else {
                    echo "Ha ocurrido un error al traer los datos";
                }
            } else {
                redirect(getUrl("Inicio", "Inicio", "Inicio"));
            }

        }

        public function postDelete() {
            if ((isset($_SESSION['id'])) AND ($_SESSION['rol_id'] > 1)) {
                $obj = new UsuarioModel();

                $Id = $_POST['Usu_Id'];
                $Nombre = $_POST['Usu_Nombre'];
                $Imagen = $_POST['Usu_Imagen'];
                if ($_SESSION['id'] == $Id) {
                    redirect(getUrl("Usuario","Usuario","lista"));
                } else {

                    $sql = "DELETE FROM Usuario WHERE Usu_Id = $Id";
                    $ejecutar = $obj->delete($sql);

                    if ($ejecutar) {
                        unlink($Imagen);

                        $Usuario = $_SESSION['id'];
                        $Id = $obj->autoincrement("Notificacion","Not_Id");
                        if (strlen($Nombre) > 15) { $Nombre = substr($Nombre,0,15)."..."; }
                        $sql = "INSERT INTO Notificacion VALUES($Id,$Usuario,'USUARIOS', 'Se ha eliminado el usuario ($Nombre) satisfactoriamente.','','danger','fas fa-users',NULL)"; 
                        $ejecutar = $obj->insert($sql);

                        redirect(getUrl("Usuario","Usuario","lista"));
                    } else {
                        echo "Ha ocurrido un error al eliminar, intente de nuevo";
                        echo "<a class='btn btn-danger mt-5' href='".getUrl("Usuario","Usuario","lista")."'>Volver</a>";
                    }
                }
            } else {
                redirect(getUrl("Inicio", "Inicio", "Inicio"));
            }
        }

        public function filtroUsuario() {
            if ((isset($_SESSION['id'])) AND ($_SESSION['rol_id'] > 1)) {
                $obj = new UsuarioModel();

                $buscar = $_POST['buscar'];

                $sql = "SELECT Usu.Usu_Id,Usu.Usu_Nombre,Usu.Usu_Apellido,Usu.Usu_Telefono,Usu.Usu_Direccion,Usu.Usu_Num_Identificacion,Usu.Usu_Correo,Usu.Usu_Imagen,Usu.Tipo_Id,Usu.Rol_Id, Tip.Tipo_Id,Tip.Tipo_Nombre, Rol.Rol_Id,Rol.Rol_Nombre FROM Rol Rol, Tipo_Id Tip, Usuario Usu WHERE Usu.Rol_Id = Rol.Rol_Id AND Usu.Tipo_Id = Tip.Tipo_Id AND (Usu.Usu_Id LIKE '%$buscar%' OR Usu.Usu_Nombre LIKE '%$buscar%' OR Usu.Usu_Apellido LIKE '%$buscar%' OR Usu.Usu_Num_Identificacion LIKE '%$buscar%' OR Usu.Tipo_Id LIKE '%$buscar%' OR Usu.Usu_Correo LIKE '%$buscar%' OR Usu.Rol_Id LIKE '%$buscar%' OR Tip.Tipo_Nombre LIKE '%$buscar%'  OR Rol.Rol_Nombre LIKE '%$buscar%') ORDER BY Usu.Usu_Id";
                $usuarios = $obj->consult($sql);

                $sql = "SELECT Rol_Id,Rol_Nombre FROM Rol";
                $roles = $obj->consult($sql);

                $sql = "SELECT Tipo_Id, Tipo_Nombre From Tipo_Id ORDER BY Tipo_Nombre";
                $tipo_identificacion = $obj->consult($sql);

                include_once '../view/Usuario/filtroUsuario.php';
            } else {
                redirect(getUrl("Inicio", "Inicio", "Inicio"));
            }
        }
            
        public function Perfil(){
            $obj = new UsuarioModel();

            $id = $_SESSION['id'];
            
            $sql = "SELECT Usu.Usu_Id,Usu.Usu_Nombre,Usu.Usu_Apellido,Usu.Usu_Telefono,Usu.Usu_Direccion,Usu.Usu_Num_Identificacion,Usu.Usu_Correo,Usu.Usu_Imagen,Usu.Tipo_Id,Usu.Rol_Id, Tip.Tipo_Id,Tip.Tipo_Nombre, Rol.Rol_Id,Rol.Rol_Nombre FROM Rol Rol, Tipo_Id Tip, Usuario Usu WHERE Usu.Rol_Id = Rol.Rol_Id AND Usu.Tipo_Id = Tip.Tipo_Id AND Usu.Usu_Id = $id";           
            
            $usuario = $obj->consult($sql);
            
            if($usuario){
                include_once '../view/Usuario/perfil.php';
            }else{
                echo "Ups ha ocurrido un error";
            }                                                        
        }

        public function postPerfil() {
            $obj = new UsuarioModel();

            $Id = $_SESSION['id'];

            $Nombre = $_POST['Usu_Nombre'];
            $Nombre_Viejo = $_POST['Nombre_Viejo'];
            $Apellido = $_POST['Usu_Apellido'];
            $Nombre_Comparar = $Nombre."_".$Apellido."_".$Id;

            $Telefono = $_POST['Usu_Telefono'];           
            $Direccion = $_POST['Usu_Direccion'];
            if (isset($_FILES['urlCambioImagenPerfil']) AND ($_FILES['urlCambioImagenPerfil'] != Null) OR ($Nombre_Comparar != $Nombre_Viejo)) {
            
                $ruta = "images/Usuarios/$Nombre_Comparar.jpg";
                $imagenVieja = $_POST['imagenVieja'];
                if ($imagenVieja != "" AND $imagenVieja != Null) {
                    unlink($imagenVieja);
                }
                $urlCambioImagenPerfil = $_FILES['urlCambioImagenPerfil']['name'];
                move_uploaded_file($_FILES['urlCambioImagenPerfil']['tmp_name'],$ruta);

                $imagenVieja = $_POST['imagenVieja'];
                if ($imagenVieja != "" AND $imagenVieja != NULL) {  
                    $ruta = "images/Usuarios/$Nombre_Comparar.jpg";
                    rename("$imagenVieja","$ruta");  
                }
                
                $sql = "UPDATE Usuario SET Usu_Nombre = '$Nombre', Usu_Apellido = '$Apellido', Usu_Telefono = '$Telefono', Usu_Direccion = '$Direccion', Usu_Imagen = '$ruta' WHERE Usu_Id =  '$Id'";
            } else {
                $sql = "UPDATE Usuario SET Usu_Nombre = '$Nombre', Usu_Apellido = '$Apellido', Usu_Telefono = '$Telefono', Usu_Direccion = '$Direccion' WHERE Usu_Id = '$Id'";
            }
            
            echo $sql;
            $ejecutar = $obj->update($sql);

            if ($ejecutar) {

                $_SESSION['nombre'] = $_POST['Usu_Nombre'];
                $_SESSION['apellido'] = $_POST['Usu_Apellido'];
                $_SESSION['telefono'] = $_POST['Usu_Telefono'];
                $_SESSION['direccion'] = $_POST['Usu_Direccion'];
                if (isset($_FILES['urlCambioImagenPerfil'])) {
                    if ($imagenVieja != "" || $imagenVieja != NULL || $_FILES['urlCambioImagenPerfil'] != Null) { $_SESSION['foto'] = $ruta; }
                }

                $Usuario = $_SESSION['id'];
                $Id = $obj->autoincrement("Notificacion","Not_Id");
                if (strlen($Nombre) > 15) { $Nombre = substr($Nombre,0,15)."..."; }
                $sql = "INSERT INTO Notificacion VALUES($Id,$Usuario,'USUARIOS', 'El usuario ($Nombre) ha actualizado su información.','','info','fas fa-users',NULL)"; 
                $ejecutar = $obj->insert($sql);
                

                redirect(getUrl("Usuario","Usuario","perfil"));
            } else {
                echo "Ha ocurrido un error al actualizar, intente de nuevo";
                echo "<a style='margin-top:100px' class='btn btn-danger' href='".getUrl("Usuario","Usuario","perfil")."'>Volver</a>";
            }

        }

    } 
?>