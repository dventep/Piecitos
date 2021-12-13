<?php
    include_once '../model/Tienda/TiendaModel.php';

    class TiendaController {
        public function catalogo() {
            $obj = new TiendaModel();

            $sql = "SELECT Pro.Pro_Id,Pro.Pro_Nombre,Pro.Pro_Cantidad,Pro.Pro_Precio,Pro.Pro_Imagen,Pro.Pro_Descuento,Pro.Col_Id,Pro.Cat_Id,Col.Col_Id,Col.Col_Nombre,Cat.Cat_Id,Cat.Cat_Nombre FROM Producto Pro, Color Col, Categoria_Pro Cat WHERE Pro.Col_Id = Col.Col_Id AND Pro.Cat_Id = Cat.Cat_Id AND Pro.Pro_Cantidad > 0 ORDER BY Cat.Cat_Nombre, Pro.Pro_Nombre";
            $productos = $obj->consult($sql);

            $sql = "SELECT Cat_Id, Cat_Nombre FROM Categoria_Pro";
            $categorias = $obj->consult($sql);

            $sql = "SELECT Prov_Id, Prov_Nombre, Prov_Razon_Social FROM Proveedor";
            $proveedores = $obj->consult($sql);

            $sql = "SELECT Col_Id,Col_Nombre FROM Color";
            $colores = $obj->consult($sql);

            $sql = "SELECT MAX(Pro_Descuento) maximo, MIN(Pro_Descuento) minimo FROM producto;";
            $descuentos = $obj->consult($sql);

            include_once '../view/Tienda/catalogo.php';
        } 
        
        public function porCategoria() {
            $obj = new TiendaModel();

            $cat = $_POST['cat'];
            $col = $_POST['col'];
            $prv = $_POST['prv'];
            
            if (($cat == 0) AND ($col == 0) AND ($prv == 0)) {
                $sql = "SELECT Pro.Pro_Id,Pro.Pro_Nombre,Pro.Pro_Cantidad,Pro.Pro_Precio,Pro.Pro_Imagen,Pro.Pro_Descuento,Pro.Col_Id,Pro.Cat_Id,Col.Col_Id,Col.Col_Nombre,Cat.Cat_Id,Cat.Cat_Nombre FROM Producto Pro, Color Col, Categoria_Pro Cat WHERE Pro.Col_Id = Col.Col_Id AND Pro.Cat_Id = Cat.Cat_Id AND Pro.Pro_Cantidad > 0 ORDER BY Cat.Cat_Nombre, Pro.Pro_Nombre";
            } else {
                $sql = "SELECT Pro.Pro_Id,Pro.Pro_Nombre,Pro.Pro_Cantidad,Pro.Pro_Precio,Pro.Pro_Imagen,Pro.Pro_Descuento,Pro.Col_Id,Pro.Cat_Id,Col.Col_Id, Col.Col_Nombre, Cat.Cat_Id, Cat.Cat_Nombre FROM Producto Pro, Color Col, Categoria_Pro Cat WHERE Pro.Col_Id = Col.Col_Id AND Pro.Cat_Id = Cat.Cat_Id AND Pro.Cat_Id = $cat AND Pro.Prov_Id = $prv AND Pro.Col_Id = $col AND Pro.Pro_Cantidad > 0 ORDER BY Cat.Cat_Nombre, Pro.Pro_Nombre";
            }

            $productos = $obj->consult($sql);

            include_once '../view/Tienda/porCategoria.php';

        }        

        public function porCategoriaBarra() {
            $obj = new TiendaModel();

            $id = $_POST['id'];
            
            if ($id == 0) {
                $sql = "SELECT Pro.Pro_Id,Pro.Pro_Nombre,Pro.Pro_Cantidad,Pro.Pro_Precio,Pro.Pro_Imagen,Pro.Pro_Descuento,Pro.Col_Id,Pro.Cat_Id,Col.Col_Id,Col.Col_Nombre,Cat.Cat_Id,Cat.Cat_Nombre FROM Producto Pro, Color Col, Categoria_Pro Cat WHERE Pro.Col_Id = Col.Col_Id AND Pro.Cat_Id = Cat.Cat_Id AND Pro.Pro_Cantidad > 0 ORDER BY Cat.Cat_Nombre, Pro.Pro_Nombre";
            } else {
                $sql = "SELECT Pro.Pro_Id,Pro.Pro_Nombre,Pro.Pro_Cantidad,Pro.Pro_Precio,Pro.Pro_Imagen,Pro.Pro_Descuento,Pro.Col_Id,Pro.Cat_Id,Col.Col_Id, Col.Col_Nombre, Cat.Cat_Id, Cat.Cat_Nombre FROM Producto Pro, Color Col, Categoria_Pro Cat WHERE Pro.Col_Id = Col.Col_Id AND Pro.Cat_Id = Cat.Cat_Id AND Pro.Cat_Id = $id AND Pro.Pro_Cantidad > 0 ORDER BY Cat.Cat_Nombre, Pro.Pro_Nombre";
            }
            $productos = $obj->consult($sql);

            include_once '../view/Tienda/porCategoria.php';

        }

        public function filtroCatalogo() {
            $obj = new TiendaModel();

            $buscar = $_POST['buscar'];

            $sql = "SELECT Pro.Pro_Id,Pro.Pro_Nombre,Pro.Pro_Cantidad,Pro.Pro_Precio,Pro.Pro_Imagen,Pro.Pro_Descuento,Pro.Col_Id,Pro.Cat_Id,Col.Col_Id,Col.Col_Nombre,Cat.Cat_Id,Cat.Cat_Nombre FROM Producto Pro, Color Col, Categoria_Pro Cat WHERE Pro.Col_Id = Col.Col_Id AND Pro.Cat_Id = Cat.Cat_Id AND Pro.Pro_Cantidad > 0 AND (Pro.Pro_Id LIKE '%$buscar%' OR Pro.Pro_Nombre LIKE '%$buscar%' OR Pro.Pro_Cantidad LIKE '%$buscar%' OR Pro.Pro_Precio LIKE '%$buscar%' OR Pro.Pro_Descuento LIKE '%$buscar%' OR Col.Col_Nombre LIKE '%$buscar%' OR Cat.Cat_Nombre LIKE '%$buscar%') ORDER BY Cat.Cat_Nombre, Pro.Pro_Nombre";
            $productos = $obj->consult($sql);

            $sql = "SELECT Cat_Id, Cat_Nombre FROM Categoria_Pro";
            $categorias = $obj->consult($sql);

            $sql = "SELECT Prov_Id, Prov_Nombre, Prov_Razon_Social FROM Proveedor";
            $proveedores = $obj->consult($sql);

            $sql = "SELECT Col_Id,Col_Nombre FROM Color";
            $colores = $obj->consult($sql);

            $sql = "SELECT MAX(Pro_Descuento) maximo, MIN(Pro_Descuento) minimo FROM producto;";
            $descuentos = $obj->consult($sql);

            include_once '../view/Tienda/filtroTienda.php';
        }
    }
?>