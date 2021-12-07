<link href="css_inicio/css_admin.css" rel="stylesheet">
<style>
    #productos {
        font-weight: bold;
        background-color: #eddcd25c;    }
    #productos > a > span {
        color: #fff !important;     }
    #mainNav {
        background: #6d6d41;    }

    .text-shadow {
        text-shadow: 0 0 0 rgba(255, 255, 255, 0.5);    }
</style>

<!-- Page Wrapper -->
<div class="mt-7 filtro is-producto" data-url="<?php echo getUrl("Producto","Producto", "filtroProducto", false, "ajax") ?>">
    <div id="wrapper">

        <!-- Sidebar -->
        <?php 
            include_once '../view/partials/navbar_admin.php';
        ?>
        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" style="background: #eddcd2;">

                <!-- Topbar -->                
                <?php
                    include_once '../view/partials/navbar_admin_top.php';
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <button id="BtnAñadir" class="btn position-relative px-5" style="background:#885a42;color:white;margin-top: -40px; border-radius: 0px 0px 15px 15px;margin-left:50%" data-url="<?php echo getUrl("Producto","Producto","getInsert",false,"ajax"); ?>" data-tipo="producto">
                        <i class="fas fa-folder-plus mr-1"></i>
                        <span id="VersionPrueba">Añadir Producto</span>
                    </button>

                    <!-- Page Heading - Ventas -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0" style="color:#505050">Vista General de los Productos</h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-dark table-striped" style="width: 150% !important; max-width: 1100px;">                        
                            <thead class="bg-warning text-dark text-center">
                                <tr>
                                    <th scope="col" style="width:10px">ID</th>
                                    <th scope="col" style="width: 8rem;">Imagen</th>
                                    <th scope="col" style="width:5rem">Nombre</th>
                                    <th scope="col" style="width:3rem">Categoría</th>
                                    <th scope="col" style="width:3rem">Cantidad</th>
                                    <th scope="col" style="width:3rem">Costo</th>
                                    <th scope="col" style="width:3rem">Precio</th>
                                    <th scope="col" style="width:3rem">Descuento</th>
                                    <th scope="col" style="width:10px"><i class="fas fa-edit"></i></th>
                                    <th scope="col" style="width:10px"><i class="fas fa-trash-alt"></i></th>
                                </tr>
                            </thead>
                            <tbody class="text-center" id="adminProductos">
                            <!-- Cada Tarjeta donde aparece cada Estadística Unificada "Números"  -->
                            <?php
                            if (mysqli_fetch_row($productos) > 0) {
                                foreach ($productos as $pro) {
                            ?>
                                <tr>
                                    <th class="align-middle" scope="row"><?php echo $pro['Pro_Id']; ?></th>
                                    <td class="align-middle">                                        
                                        <img src="<?php echo $pro['Pro_Imagen']; ?>" alt="<?php echo $pro['Pro_Nombre']; ?>" class="mx-auto size-productos" style="height: 6rem;max-width: 6rem;width:100%;">
                                    </td>
                                    <td class="align-middle"><?php echo $pro['Pro_Nombre']; ?></td>
                                    <td class="align-middle"><?php echo $pro['Cat_Nombre']; ?></td>
                                    <td class="align-middle"><?php echo number_format($pro['Pro_Cantidad']); ?></td>
                                    <td class="align-middle"><?php echo "$".number_format($pro['Pro_Costo']); ?></td>
                                    <td class="align-middle"><?php echo "$".number_format($pro['Pro_Precio']); ?></td>
                                    <td class="align-middle"><span class="cursor-pointer" data-toggle="tooltip" data-placement="top" title="<?php if ($pro['Pro_Descuento'] != 0) {
                                                    echo "$".number_format($pro['Pro_Precio'] - (($pro['Pro_Precio'] * $pro['Pro_Descuento']) / 100));
                                                } else { 
                                                    echo "$".number_format($pro['Pro_Precio']);
                                                }
                                            ?>"><?php echo $pro['Pro_Descuento']."%"; ?></span></td>
                                    <td class="align-middle">
                                        <button class="btn btn-info editarModal" id="<?php echo "BtnEditar".$pro['Pro_Id']; ?>" data-url="<?php echo getUrl("Producto","Producto","getUpdate",false,"ajax") ?>" data-id="<?php echo $pro['Pro_Id']; ?>" data-tipo="producto">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-danger eliminarModal" id="<?php echo "BtnEliminar".$pro['Pro_Id']; ?>" data-url="<?php echo getUrl("Producto","Producto","getDelete",false,"ajax"); ?>" data-id="<?php echo $pro['Pro_Id'] ?>" data-tipo="producto">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                                }
                            } else {                                                                    
                                echo "<td colspan='10' class='text-center'>No hay productos que mostrar</td>";
                            }
                            ?>
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
                
    <!-- Footer -->
    <?php 
        include_once '../view/partials/footer.php';
    ?>
    <!-- End of Footer -->
</div>