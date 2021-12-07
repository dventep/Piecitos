<?php
    include_once '../model/Producto/ProductoModel.php';    

    if ((isset($_SESSION['id'])) AND ($_SESSION['rol_id'] > 1)) {

        class ProductoController {        
            public function catalogo() {
                $obj = new ProductoModel();

                $sql = "SELECT Pro.Pro_Id,Pro.Pro_Nombre,Pro.Pro_Cantidad,Pro.Pro_Precio,Pro.Pro_Costo,Pro.Pro_Descripcion,Pro.Pro_Imagen,Pro.Pro_Descuento,Pro.Pro_Fecha_Registro,Pro.Prov_Id,Pro.Usu_Id,Pro.Col_Id,Pro.Cat_Id,Prov.Prov_Id,Prov.Prov_Nombre,Usu.Usu_Id,Usu.Usu_Nombre,Usu.Usu_Apellido,Col.Col_Id,Col.Col_Nombre,Cat.Cat_Id,Cat.Cat_Nombre FROM Producto Pro, Proveedor Prov,Usuario Usu,Color Col, Categoria_Pro Cat WHERE Pro.Prov_Id = Prov.Prov_Id AND Pro.Usu_Id = Usu.Usu_Id AND Pro.Col_Id = Col.Col_Id AND Pro.Cat_Id = Cat.Cat_Id ORDER BY Pro.Pro_Id, Pro.Cat_Id";
                $productos = $obj->consult($sql);
                
                include_once '../view/Producto/Producto.php';
            }

            public function porCategoria() {
                $obj = new ProductoModel();
                
                $id = $_POST['id'];

                if ($id == 0) {
                    $sql = "SELECT Pro.Pro_Id,Pro.Pro_Nombre,Pro.Pro_Cantidad,Pro.Pro_Precio,Pro.Pro_Costo,Pro.Pro_Descripcion,Pro.Pro_Imagen,Pro.Pro_Descuento,Pro.Pro_Fecha_Registro,Pro.Prov_Id,Pro.Usu_Id,Pro.Col_Id,Pro.Cat_Id,Prov.Prov_Id,Prov.Prov_Nombre,Usu.Usu_Id,Usu.Usu_Nombre,Usu.Usu_Apellido,Col.Col_Id,Col.Col_Nombre,Cat.Cat_Id,Cat.Cat_Nombre FROM Producto Pro, Proveedor Prov,Usuario Usu,Color Col, Categoria_Pro Cat WHERE Pro.Prov_Id = Prov.Prov_Id AND Pro.Usu_Id = Usu.Usu_Id AND Pro.Col_Id = Col.Col_Id AND Pro.Cat_Id = Cat.Cat_Id ORDER BY Pro.Pro_Id, Pro.Cat_Id";
                } else {
                    $sql = "SELECT Pro.Pro_Id,Pro.Pro_Nombre,Pro.Pro_Cantidad,Pro.Pro_Precio,Pro.Pro_Costo,Pro.Pro_Descripcion,Pro.Pro_Imagen,Pro.Pro_Descuento,Pro.Pro_Fecha_Registro,Pro.Prov_Id,Pro.Usu_Id,Pro.Col_Id,Pro.Cat_Id,Prov.Prov_Id,Prov.Prov_Nombre,Usu.Usu_Id,Usu.Usu_Nombre,Usu.Usu_Apellido,Col.Col_Id,Col.Col_Nombre,Cat.Cat_Id,Cat.Cat_Nombre FROM Producto Pro, Proveedor Prov,Usuario Usu,Color Col, Categoria_Pro Cat WHERE Pro.Prov_Id = Prov.Prov_Id AND Pro.Usu_Id = Usu.Usu_Id AND Pro.Col_Id = Col.Col_Id AND Pro.Cat_Id = Cat.Cat_Id AND Pro.Cat_Id = $id ORDER BY Pro.Pro_Id";
                }
                $productos = $obj->consult($sql);
                
                include_once '../view/Producto/porCategoria.php';
            }

            public function getInsert() {
                $obj = new ProductoModel();

                $sql = "SELECT * FROM Categoria_Pro";
                $categorias = $obj->consult($sql);

                $sql = "SELECT Prov_Id,Prov_Nombre FROM Proveedor";
                $proveedores = $obj->consult($sql);

                $sql = "SELECT Col_Id,Col_Nombre FROM Color";
                $colores = $obj->consult($sql);

                include_once '../view/Producto/insertModal.php';
            }

            public function postInsert() {
                $obj = new ProductoModel();

                $Id = $obj->autoincrement("Producto","Pro_Id");
                $Nombre = $_POST['Pro_Nombre'];
                $Cantidad = $_POST['Pro_Cantidad'];
                $Precio = $_POST['Pro_Precio'];
                $Costo = $_POST['Pro_Costo'];
                $Descripcion = $_POST['Pro_Descripcion'];           
                
                $Descuento = $_POST['Pro_Descuento'];
                date_default_timezone_set("America/Bogota");
                $Fecha = date("d-m-Y h:ia");
                $Proveedor = $_POST['Pro_Proveedor'];
                $Usuario = $_SESSION['id'];
                $Color = $_POST['Pro_Color'];
                $Categoria = $_POST['Pro_Categoria'];
                $Categoria_Id = substr($Categoria,0,1);

                $Pro_Imagen = $_FILES['Pro_Imagen']['name'];
                $ruta = "images/Productos/$Categoria/$Nombre.jpg";


                move_uploaded_file($_FILES['Pro_Imagen']['tmp_name'],"$ruta");

                $sql = "INSERT INTO Producto VALUES($Id,'$Nombre',$Cantidad,$Precio,$Costo,'$Descripcion','$ruta',$Descuento,'$Fecha',$Proveedor,$Usuario,$Color,$Categoria_Id)";
                $ejecutar = $obj->insert($sql);

                if ($ejecutar) {
                    $Id = $obj->autoincrement("Notificacion","Not_Id");
                    if (strlen($Nombre) > 15) { $Nombre = substr($Nombre,0,15)."..."; }
                    $sql = "INSERT INTO Notificacion VALUES($Id,$Usuario,'PRODUCTOS', 'Se ha añadido el producto ($Nombre) satisfactoriamente.','','success','fas fa-cubes',NULL)"; 
                    $ejecutar = $obj->insert($sql);

                    redirect(getUrl("Producto","Producto","catalogo"));
                } else {
                    echo "Ha ocurrido un error al ingresar datos.";
                }
            }

            public function getUpdate() {
                $obj = new ProductoModel();

                $id = $_POST['id'];

                $sql = "SELECT Pro.Pro_Id,Pro.Pro_Nombre,Pro.Pro_Cantidad,Pro.Pro_Precio,Pro.Pro_Costo,Pro.Pro_Descripcion,Pro.Pro_Imagen,Pro.Pro_Descuento,Pro.Pro_Fecha_Registro,Pro.Prov_Id,Pro.Usu_Id,Pro.Col_Id,Pro.Cat_Id,Prov.Prov_Id,Prov.Prov_Nombre,Usu.Usu_Id,Usu.Usu_Nombre,Usu.Usu_Apellido,Col.Col_Id,Col.Col_Nombre,Cat.Cat_Id,Cat.Cat_Nombre FROM Producto Pro, Proveedor Prov,Usuario Usu,Color Col, Categoria_Pro Cat WHERE Pro.Pro_Id = $id AND Pro.Prov_Id = Prov.Prov_Id AND Pro.Usu_Id = Usu.Usu_Id AND Pro.Col_Id = Col.Col_Id AND Pro.Cat_Id = Cat.Cat_Id";
                $producto = $obj->consult($sql);

                $sql = "SELECT * FROM Categoria_Pro";
                $categorias = $obj->consult($sql);

                $sql = "SELECT Prov_Id,Prov_Nombre FROM Proveedor";
                $proveedores = $obj->consult($sql);

                $sql = "SELECT Col_Id,Col_Nombre FROM Color";
                $colores = $obj->consult($sql);


                include_once '../view/Producto/updateModal.php';
            }

            public function postUpdate() {
                $obj = new ProductoModel();

                $Id = $_POST['Pro_Id'];

                $Nombre = $_POST['Pro_Nombre'];
                $Nombre_Viejo = $_POST['Nombre_Viejo'];

                $Cantidad = $_POST['Pro_Cantidad'];
                $Precio = $_POST['Pro_Precio'];
                $Costo = $_POST['Pro_Costo'];
                $Descripcion = $_POST['Pro_Descripcion'];           
                
                $Descuento = $_POST['Pro_Descuento'];
                $Proveedor = $_POST['Pro_Proveedor'];
                $Color = $_POST['Pro_Color'];

                $Cat_Viejo = $_POST['Cat_Viejo'];
                $Categoria = $_POST['Pro_Categoria'];
                $Categoria_Id = substr($Categoria,0,1);

                if (isset($_FILES['Pro_Imagen']) || ($Cat_Viejo != $Categoria_Id) || ($Nombre != $Nombre_Viejo)) {

                    $imagenVieja = $_POST['imagenVieja'];
                    
                    $ruta = "images/Productos/$Categoria/$Nombre.jpg";
                    
                    if (isset($_FILES['Pro_Imagen'])) {
                        if ($imagenVieja != "") {
                            unlink($imagenVieja);
                        }
                        $Pro_Imagen = $_FILES['Pro_Imagen']['name'];
                        move_uploaded_file($_FILES['Pro_Imagen']['tmp_name'],$ruta);
                    } else {
                        rename("$imagenVieja","$ruta");
                    }


                    $sql = "UPDATE Producto SET Pro_Nombre = '$Nombre', Pro_Cantidad = $Cantidad, Pro_Precio = $Precio, Pro_Costo = $Costo, Pro_Descripcion = '$Descripcion', Pro_Imagen = '$ruta',Pro_Descuento = $Descuento,Prov_Id = $Proveedor,Col_Id = $Color,Cat_Id = $Categoria_Id WHERE Pro_Id = $Id";
                } else {
                    $sql = "UPDATE Producto SET Pro_Nombre = '$Nombre', Pro_Cantidad = $Cantidad, Pro_Precio = $Precio, Pro_Costo = $Costo, Pro_Descripcion = '$Descripcion',Pro_Descuento = $Descuento,Prov_Id = $Proveedor,Col_Id = $Color,Cat_Id = $Categoria_Id WHERE Pro_Id = $Id";
                }

                $ejecutar = $obj->update($sql);

                if ($ejecutar) {
                    $Usuario = $_SESSION['id'];
                    $Id = $obj->autoincrement("Notificacion","Not_Id");
                    if (strlen($Nombre) > 15) { $Nombre = substr($Nombre,0,15)."..."; }
                    $sql = "INSERT INTO Notificacion VALUES($Id,$Usuario,'PRODUCTOS', 'Se ha actualizado el producto ($Nombre) satisfactoriamente.','','info','fas fa-cubes',NULL)"; 
                    $ejecutar = $obj->insert($sql);
                    
                    redirect(getUrl("Producto","Producto","catalogo"));
                } else {
                    echo "Ha ocurrido un error al actualizar, intente de nuevo";
                    echo "<a style='margin-top:100px' class='btn btn-danger' href='".getUrl("Producto","Producto","catalogo")."'>Volver</a>";
                }
            }

            public function getDelete() {
                $obj = new ProductoModel();

                $id = $_POST['id'];

                $sql = "SELECT Pro.Pro_Id,Pro.Pro_Nombre,Pro.Pro_Cantidad,Pro.Pro_Precio,Pro.Pro_Costo,Pro.Pro_Descripcion,Pro.Pro_Imagen,Pro.Pro_Descuento,Pro.Pro_Fecha_Registro,Pro.Prov_Id,Pro.Usu_Id,Pro.Col_Id,Pro.Cat_Id,Prov.Prov_Id,Prov.Prov_Nombre,Usu.Usu_Id,Usu.Usu_Nombre,Usu.Usu_Apellido,Col.Col_Id,Col.Col_Nombre,Cat.Cat_Id,Cat.Cat_Nombre FROM Producto Pro, Proveedor Prov,Usuario Usu,Color Col, Categoria_Pro Cat WHERE Pro.Pro_Id = $id AND Pro.Prov_Id = Prov.Prov_Id AND Pro.Usu_Id = Usu.Usu_Id AND Pro.Col_Id = Col.Col_Id AND Pro.Cat_Id = Cat.Cat_Id";
                $producto = $obj->consult($sql);           

                if ($producto) {
                    include_once '../view/Producto/deleteModal.php';
                } else {
                    echo "Ha ocurrido un error al traer los datos";
                }

            }

            public function postDelete() {
                $obj = new ProductoModel();

                $Id = $_POST['Pro_Id'];
                $Nombre = $_POST['Pro_Nombre'];
                $Imagen = $_POST['Pro_Imagen'];

                $sql = "DELETE FROM Producto WHERE Pro_Id = $Id";
                $ejecutar = $obj->delete($sql);

                if ($ejecutar) {
                    unlink($Imagen);

                    $Usuario = $_SESSION['id'];
                    $Id = $obj->autoincrement("Notificacion","Not_Id");
                    if (strlen($Nombre) > 15) { $Nombre = substr($Nombre,0,15)."..."; }
                    $sql = "INSERT INTO Notificacion VALUES($Id,$Usuario,'PRODUCTOS', 'Se ha eliminado el producto ($Nombre) satisfactoriamente','','danger','fas fa-cubes',NULL)"; 
                    $ejecutar = $obj->insert($sql);

                    redirect(getUrl("Producto","Producto","catalogo"));
                } else {
                    echo "Ha ocurrido un error al eliminar, intente de nuevo";
                    echo "<a class='btn btn-danger' href='".getUrl("Producto","Producto","catalogo")."'>Volver</a>";
                }
            }
            
            public function filtroProducto() {                
                $obj = new ProductoModel();
                
                $buscar = $_POST['buscar'];
                
                $sql = "SELECT Pro.Pro_Id,Pro.Pro_Nombre,Pro.Pro_Cantidad,Pro.Pro_Precio,Pro.Pro_Costo,Pro.Pro_Descripcion,Pro.Pro_Imagen,Pro.Pro_Descuento,Pro.Pro_Fecha_Registro,Pro.Prov_Id,Pro.Usu_Id,Pro.Col_Id,Pro.Cat_Id,Prov.Prov_Id,Prov.Prov_Nombre,Usu.Usu_Id,Usu.Usu_Nombre,Usu.Usu_Apellido,Col.Col_Id,Col.Col_Nombre,Cat.Cat_Id,Cat.Cat_Nombre FROM Producto Pro, Proveedor Prov,Usuario Usu,Color Col, Categoria_Pro Cat WHERE Pro.Prov_Id = Prov.Prov_Id AND Pro.Usu_Id = Usu.Usu_Id AND Pro.Col_Id = Col.Col_Id AND Pro.Cat_Id = Cat.Cat_Id AND (Pro.Pro_Id LIKE '%$buscar%' OR Pro.Pro_Nombre LIKE '%$buscar%' OR Pro.Pro_Cantidad LIKE '%$buscar%'  OR Pro.Pro_Precio LIKE '%$buscar%' OR Pro.Pro_Costo LIKE '%$buscar%' OR Pro.Pro_Descuento LIKE '%$buscar%' OR Cat.Cat_Nombre LIKE '%$buscar%') ORDER BY Pro.Pro_Id, Pro.Cat_Id";
                $productos = $obj->consult($sql);
                
                include_once '../view/Producto/filtroProducto.php';
            }
        }
    } else {
        redirect(getUrl("Inicio","Inicio","inicio"));
    }
?>