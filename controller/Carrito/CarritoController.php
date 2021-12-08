<?php
    include_once '../model/Carrito/CarritoModel.php';

    class CarritoController {
        
        public function verCantidad() {
            $obj = new CarritoModel();

            $Usuario = $_SESSION['id'];

            $sql =  "SELECT count(*) Cantidad FROM Carrito Car, Carrito_Detalle Car_Det WHERE Car.Car_Id = Car_Det.Car_Id AND Car.Usu_Id = $Usuario GROUP BY Car.Usu_Id;";
            $ejecutar = $obj->consult($sql);

            if (mysqli_num_rows($ejecutar) > 0) { $dato = mysqli_fetch_array($ejecutar); $cantidad = $dato['Cantidad']; } 
            else { $cantidad = 0;  }

            include_once '../view/Carrito/cantidad.php';
        }

        public function verDetalles() {
            $obj = new CarritoModel();

            $id = $_POST['id'];

            $sql = "SELECT Pro.Pro_Id,Pro.Pro_Nombre,Pro.Pro_Cantidad,Pro.Pro_Precio,Pro.Pro_Descripcion, Pro.Pro_Imagen,Pro.Pro_Descuento,Pro.Col_Id,Pro.Cat_Id, Pro.Prov_id, Col.Col_Id,Col.Col_Nombre,Cat.Cat_Id,Cat.Cat_Nombre,Prov.Prov_Id, Prov.Prov_Nombre FROM Producto Pro, Color Col, Categoria_Pro Cat, Proveedor Prov WHERE Pro.Col_Id = Col.Col_Id AND Pro.Cat_Id = Cat.Cat_Id AND Pro.Prov_Id = Prov.Prov_Id AND Pro.Pro_Id = $id ORDER BY Cat.Cat_Nombre, Pro.Pro_Nombre";

            $producto = $obj->consult($sql);

            include_once '../view/Carrito/verMasModal.php';
        }

        public function pedidos() {
            $obj = new CarritoModel();
            $Usuario = $_SESSION['id'];

            $sql = "SELECT Pro.Pro_Id, Pro.Pro_Nombre,Pro.Pro_Imagen, Car_Det.Car_Det_Id, Car_Det.Car_Det_Cantidad, Car_Det.Car_Det_Total FROM Producto Pro, Carrito_Detalle Car_Det, Carrito Car WHERE Pro.Pro_Id = Car_Det.Pro_Id AND Car_Det.Car_Id = Car.Car_Id AND Car.Usu_Id = $Usuario ORDER BY Car_Det.Car_Det_Id DESC";

            $productos = $obj->consult($sql);

            $sql = "SELECT Car_Id, Car_Total FROM Carrito WHERE Usu_Id = $Usuario";
            $totalCarrito = $obj->consult($sql);
            // Probar todo lo de carrito pasarlo a factura - Carrito_detalle a Factura_detalle, Carrito a Factura

            // Una vez funcione, hacen el delete de lo que hay en Carrito_detalle y Carrito.
                
            //

            include_once '../view/Carrito/consultarAñadidos.php';
        }

        public function añadirCarrito() {
            $obj = new CarritoModel();
            $Usuario = $_SESSION['id'];
            $Nombre = $_POST['Pro_Nombre'];

            $Id = $obj->autoincrement("Carrito_Detalle","Car_Det_Id");
            $Cantidad = $_POST['Pro_Cantidad'];
            $Precio = $_POST['Pro_Precio'];
            $Total = intval($Precio) * intval($Cantidad);
            $Pro = $_POST['Pro_Id'];

            $sql = "SELECT * FROM Carrito WHERE Usu_Id = $Usuario";
            $verificar = $obj->consult($sql);

            if (mysqli_num_rows($verificar) < 1) {
                $Car_Id = $obj->autoincrement("Carrito","Car_Id");
                $Car_Total = $Total;
                
                $sql = "INSERT INTO Carrito VALUES($Car_Id, $Car_Total, $Usuario)";
                $ejecutar = $obj->insert($sql);
            } else {
                
                while ($val = mysqli_fetch_assoc($verificar)) {
                    $Car_Id = $val['Car_Id'];
                    $Car_Total = $val['Car_Total'];
                    $Car_Total = intval($Car_Total) + intval($Total);

                    $sql = "UPDATE Carrito SET Car_Total = $Car_Total WHERE Car_Id = $Car_Id";
                    $ejecutar = $obj->insert($sql);
                }
            }

            $sql = "INSERT INTO Carrito_Detalle VALUES($Id, $Cantidad, $Total, $Pro, $Car_Id)";
            $ejecutar = $obj->insert($sql);

            if ($ejecutar) {

                $Usuario = $_SESSION['nombre']." ".$_SESSION['apellido'];
                if (strlen($Nombre) > 20) { $Nombre = substr($Nombre,0,20)."..."; }
                
                $sql_Usu = "SELECT Usu_Nombre, Usu_Id, Usu_Apellido FROM Usuario WHERE rol_id > 1";
                $Usuarios = $obj->consult($sql_Usu);
                
                while ($usu = mysqli_fetch_assoc($Usuarios)) {
                    $Id = $obj->autoincrement("Notificacion","Not_Id");
                    $Usu_Id = $usu['Usu_Id'];
                    $sql = "INSERT INTO Notificacion VALUES($Id,$Usu_Id,'CARRITO', 'El usuario $Usuario ha añadido el producto $Nombre a su carrito.','','purple','fas fa-shopping-cart',NULL)"; 
                    $ejecutar = $obj->insert($sql);                    
                }

                redirect(getUrl("Tienda","Tienda","catalogo"));
            } else {
                echo "Ha habido un error al insertar la petición en el Carrito <br> Car_Id:$Car_Id - Car_TOTAL:$Car_Total - Usuario:$Usuario <br> ID:$Id - Cantidad:$Cantidad - Precio:$Precio - Total:$Total - Pro_ID:$Pro";
            }
        }

        public function getDelete() {
            $obj = new CarritoModel();
            $id_CarDet = $_POST['id'];
            $sql = "SELECT Car_Det_Total FROM Carrito_Detalle WHERE Car_Det_Id = $id_CarDet";
            $cantidadCar_Det = $obj->consult($sql);       
            while ($CarDet = mysqli_fetch_assoc($cantidadCar_Det)) {
                $totalCar_Det = $CarDet['Car_Det_Total'];
            }

            $id_User = $_SESSION['id'];
            $sql = "SELECT Car_Total FROM Carrito WHERE Usu_Id = $id_User";
            $cantidadCar = $obj->consult($sql);
            while ($Car = mysqli_fetch_assoc($cantidadCar)) {
                $totalCar = $Car['Car_Total'];
            }
            
            $newTotal = intval($totalCar) - intval($totalCar_Det);
            
            $sql = "DELETE FROM Carrito_Detalle WHERE Car_Det_Id = $id_CarDet";
            $ejecutar = $obj->delete($sql);

            $sql = "UPDATE Carrito SET Car_Total = $newTotal WHERE Usu_Id=$id_User";
            $ejecutar = $obj->update($sql);
            
           include_once '../view/Carrito/test.php';
        }
        public function metodoPago() {  
            $obj = new CarritoModel();
            $sql = "SELECT * FROM Metodo_Pago";
            $metodosPago = $obj->consult($sql);

            include_once '../view/Carrito/metodoPago.php';
        }
        public function generarFactura() {
            $obj= new CarritoModel();
            if (isset($_POST) and isset($_POST['direccionEnvio'])) {                
                $variables = array();
                
                // Tomar la Zona Horaria y Enviarle los datos que necesito traer.
                $dtz = new DateTimeZone("America/Bogota");
                $dt = new DateTime("now", $dtz);
                $currentTime = $dt->format('D, j/M/Y');                
                $variables['fecha_actual'] = $currentTime;
                
                // Tomar Los datos del POST
                $direccion = $_POST['direccionEnvio'];
                $variables['direccion_envio'] = $direccion;
                
                $metodo_pago = $_POST['metodoPagoOption'];
                $sql = "SELECT Met_Pag_Nombre FROM metodo_pago where Met_Pag_Id = $metodo_pago";
                $metodo_sql = $obj->consult($sql);
                foreach ($metodo_sql as $metodo) {
                    $variables['metodo'] = $metodo['Met_Pag_Nombre'];
                }
                
                $correo = "davidventepolo@gmail.com";
                echo "Correo: " . $_SESSION['correo']."<br>";
                $contenido =  file_get_contents("../view/Carrito/factura_correo.php");
                $id_Usuario = $_SESSION['id'];

                // Tomar los datos del detalle carrito.
                $sql = "SELECT Pro.Pro_Id, Pro.Pro_Nombre, Pro.Pro_Descripcion, Pro.Pro_Precio ,Pro.Pro_Imagen, Car_Det.Car_Det_Id, Car_Det.Car_Det_Cantidad, Car_Det.Car_Det_Total FROM Producto Pro, Carrito_Detalle Car_Det, Carrito Car WHERE Pro.Pro_Id = Car_Det.Pro_Id AND Car_Det.Car_Id = Car.Car_Id AND Car.Usu_Id = $id_Usuario ORDER BY Car_Det.Car_Det_Id DESC";
                $productos = $obj->consult($sql);
                $variables['productos'] = $productos;

                // Tomar los datos del carrito, su Valor Total.
                $sql = "SELECT Car_Id, Car_Total FROM Carrito WHERE Usu_Id = $id_Usuario";
                $carrito = $obj->consult($sql);
                $variables['carrito'] = $carrito;


                $variables['id_usuario'] = $_SESSION['id'];
                $variables['nombre'] = $_SESSION['nombre'];
                $variables['apellido'] = $_SESSION['apellido'];
                $variables['telefono'] = $_SESSION['telefono'];
                $variables['numero_id'] = $_SESSION['numero_id'];
                $variables['correo'] = $_SESSION['correo'];
                foreach($variables as $key => $value)
                {
                    if (strval('{{'.$key.'}}')== '{{productos}}') {
                        $contador = 0;
                        foreach ($productos as $producto) {
                            $contador += 1;

                            $fila = '
                                <tr class="detalles_compra">
                                    <td class="numero_Compra">'.number_format($producto['Pro_Id']).'</td>
                                    <td class="descripcion_Compra">
                                        <span class="titulo_Producto">'.$producto['Pro_Nombre'].'</span>'.$producto['Pro_Descripcion'].'
                                    </td>
                                    <td class="precio_Compra">$'.number_format($producto['Pro_Precio']).'</td>
                                    <td class="cantidad_Compra">'.number_format($producto['Car_Det_Cantidad']).'</td>
                                    <td class="total_unidad_Compra">$'.number_format($producto['Car_Det_Total']).'</td>
                                </tr>
                                
                            ';
                            $cantidad = mysqli_num_rows($productos);
                            if ($contador == $cantidad) {
                                $contenido = str_replace('{{ fila }}', $fila, $contenido);
                            } else {
                                $contenido = str_replace('{{ fila }}', $fila.'{{ fila }}', $contenido);
                            }
                            
                        }
                    } else if (strval('{{'.$key.'}}') == '{{carrito}}') {
                        
                        foreach ($carrito as $car) {
                            $fila = number_format($car['Car_Total']);

                            $contenido = str_replace('{{ carrito }}', $fila, $contenido);
                        }
                    } else {
                        $contenido = str_replace('{{ '.$key.' }}', $value, $contenido);
                    }
                }
                // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                $titulo_Email = "Factura de compra - 26 SR. " . $variables['nombre'] . " " . $variables['apellido'];
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                if (mail($correo, $titulo_Email, $contenido, $headers)) {
                    // mail($correo, "Contacto", $contenido, $headers);
                    echo "Successfully!";
                } else {
                    echo "Mailer Error: ".error_get_last();
                }
            }

            
            include_once '../view/Carrito/factura.php';
        }
        
    }
?>