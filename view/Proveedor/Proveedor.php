<link href="css_inicio/css_admin.css" rel="stylesheet">
<style>
    #proveedores {
        font-weight: bold;
        background-color: #eddcd25c;    }
    #proveedores > a > span {
        color: #fff !important;     }
    #mainNav {
        background: #6d6d41;    }

    .text-shadow {
        text-shadow: 0 0 0 rgba(255, 255, 255, 0.5);    }
</style>

<!-- Page Wrapper -->
<div class="mt-7 filtro" data-url="<?php echo getUrl("Proveedor","Proveedor", "filtroProveedor", false, "ajax") ?>">
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
                    <button id="BtnAñadir" class="btn position-relative px-5" style="background:#885a42;color:white;margin-top: -40px; border-radius: 0px 0px 15px 15px;margin-left:50%" data-url="<?php echo getUrl("Proveedor","Proveedor","getInsert",false,"ajax"); ?>"  data-tipo="proveedor">
                        <i class="fas fa-id-card-alt"></i>
                        <span id="VersionPrueba">Añadir Proveedor</span>
                    </button>

                    <!-- Page Heading - Ventas -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0" style="color:#505050">Lista de Proveedores</h1>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-dark table-striped" style="width: 150% !important; max-width: 1200px;">                        
                            <thead class="bg-warning text-dark text-center">
                                <tr>
                                    <th scope="col" style="width:10px">ID</th>
                                    <th scope="col" style="width:12rem">Nombre</th>
                                    <th scope="col" style="width:10rem">Razón Social</th>
                                    <th scope="col" style="width:11rem">Direccion</th>
                                    <th scope="col" style="width:10rem">Correo</th>
                                    <th scope="col" style="width:3rem">Telefono</th>
                                    <th scope="col" style="width:10px"><i class="fas fa-users-cog"></i></th>
                                    <th scope="col" style="width:10px"><i class="fas fa-users-slash"></i></i></th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                        <!-- Cada Tarjeta donde aparece cada Estadística Unificada "Números"  -->
                                <?php

                                if (mysqli_fetch_row($proveedores) > 0) {
                                    foreach ($proveedores as $prov) {
                                ?>
                                    <tr>
                                        <th class="align-middle" scope="row"><?php echo $prov['Prov_Id'];  ?></th>
                                        <td class="align-middle">
                                            <?php 
                                                echo $prov['Prov_Nombre'];
                                                echo "<span class='badge badge-warning text-dark rounded-circle position-relative' style='top:-10px'>";
                                                $cont=true;
                                                foreach ($cantidades as $cant) {
                                                    if ($cant['Prov_Id'] == $prov['Prov_Id']) {
                                                        echo $cant['Cantidad'];
                                                        $cont = false;
                                                    }
                                                }
                                                if ($cont) {echo 0;} 
                                                echo "</span>";
                                            ?>
                                        </td>
                                        <td class="align-middle"><?php echo $prov['Prov_Razon_Social']; ?></td>
                                        <td class="align-middle"><?php echo $prov['Prov_Direccion']; ?></td>
                                        <td class="align-middle"><?php echo $prov['Prov_Correo']; ?></td>
                                        <td class="align-middle"><?php echo $prov['Prov_Telefono']; ?></td>
                                        <td class="align-middle">
                                            <button class="btn btn-info editarModal" id="<?php echo "BtnEditar".$prov['Prov_Id']; ?>" data-url="<?php echo getUrl("Proveedor","Proveedor","getUpdate",false,"ajax") ?>" data-id="<?php echo $prov['Prov_Id']; ?>" data-tipo="proveedor">
                                                <i class="fas fa-users-cog"></i>
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-danger eliminarModal" id="<?php echo "BtnEliminar".$prov['Prov_Id']; ?>" data-url="<?php echo getUrl("Proveedor","Proveedor","getDelete",false,"ajax"); ?>" data-id="<?php echo $prov['Prov_Id'] ?>" data-tipo="proveedor">
                                                <i class="fas fa-users-slash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                } else {                                    
                                    echo "<td colspan='8' class='text-center'>No hay proveedores que mostrar</td>";
                                }
                                ?>
                            <tbody>
                        </table>
                    </div>
                    <!-- End of Main Content -->
                </div>
            </div>                
                    
            <!-- Footer -->
            <?php 
                include_once '../view/partials/footer.php';
            ?>
            <!-- End of Footer -->
        </div>
    </div>
</div>