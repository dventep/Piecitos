<link href="css_inicio/css_admin.css" rel="stylesheet">
<style>
    #usuarios {
        font-weight: bold;
        background-color: #eddcd25c;    }
    #usuarios > a > span {
        color: #fff !important;     }
    #mainNav {
        background: #6d6d41;    }

    .text-shadow {
        text-shadow: 0 0 0 rgba(255, 255, 255, 0.5);    }
</style>

<!-- Page Wrapper -->
<div class="mt-7 filtro" data-url="<?php echo getUrl("Usuario","Usuario", "filtroUsuario", false, "ajax") ?>">
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
                    <button id="BtnAñadir" class="btn position-relative px-5" style="background:#885a42;color:white;margin-top: -40px; border-radius: 0px 0px 15px 15px;margin-left:50%" data-url="<?php echo getUrl("Usuario","Usuario","getInsert",false,"ajax"); ?>"  data-tipo="usuario">
                        <i class="fas fa-user-plus"></i>
                        <span id="VersionPrueba">Añadir Usuario</span>
                    </button>

                    <!-- Page Heading - Ventas -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0" style="color:#505050">Lista de Usuarios</h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-dark table-striped" style="width: 150% !important; max-width: 1100px;">                        
                            <thead class="bg-warning text-dark text-center">
                                <tr>
                                    <th scope="col" style="width:3rem">ID</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col" style="width:3rem">Nombre</th>
                                    <th scope="col" style="width:3rem">Rol</th>
                                    <th scope="col" style="width:4rem">Telefono</th>
                                    <th scope="col" style="width:10rem">Direccion</th>
                                    <th scope="col" style="width:10rem">Correo</th>
                                    <th scope="col"><i class="fas fa-user-edit"></i></th>
                                    <th scope="col"><i class="fas fa-user-minus"></i></th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                            <!-- Cada Tarjeta donde aparece cada Estadística Unificada "Números"  -->
                            <?php

                            if (mysqli_fetch_row($usuarios) > 0) {
                                foreach ($usuarios as $usu) {
                            ?>
                                <tr>
                                    <th class="align-middle" scope="row"><?php echo $usu['Usu_Id'];  ?></th>
                                    <td class="align-middle"><?php
                                        if (!isset($usu['Usu_Imagen']) || ($usu['Usu_Imagen'] == "")) {
                                            $usu['Usu_Imagen'] = "images/Usuarios/desconocido.svg";
                                        } ?> 
                                        
                                        <img src="<?php echo $usu['Usu_Imagen'] ?>" alt="<?php echo $usu['Usu_Nombre']." ".$usu['Usu_Apellido'] ?>" class="rounded-circle mx-auto size-productos" style="height: 6rem;max-width: 6rem;width:100%;">
                                    </td>
                                    <td class="align-middle"><?php echo $usu['Usu_Nombre']." ".$usu['Usu_Apellido']; ?></td>
                                    <td class="align-middle"><?php echo $usu['Rol_Nombre']; ?></td>
                                    <td class="align-middle"><?php echo $usu['Usu_Telefono']; ?></td>
                                    <td class="align-middle"><?php echo $usu['Usu_Direccion']; ?></td>
                                    <td class="align-middle"><?php echo $usu['Usu_Correo']; ?></td>
                                    <td class="align-middle">
                                        <button class="btn btn-info editarModal" id="<?php echo "BtnEditar".$usu['Usu_Id']; ?>" data-url="<?php echo getUrl("Usuario","Usuario","getUpdate",false,"ajax") ?>" data-id="<?php echo $usu['Usu_Id']; ?>" data-tipo="usuario">
                                            <i class="fas fa-user-edit"></i>
                                        </button>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-danger eliminarModal" id="<?php echo "BtnEliminar".$usu['Usu_Id']; ?>" data-url="<?php echo getUrl("Usuario","Usuario","getDelete",false,"ajax"); ?>" data-id="<?php echo $usu['Usu_Id'] ?>" data-tipo="usuario" <?php if ($_SESSION['id']==$usu['Usu_Id']) { echo "disabled";} ?>>
                                            <i class="fas fa-user-minus"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                                }
                            } else {
                                echo "<td colspan='9' class='text-center'>No hay usuarios que mostrar</td>";
                            }
                            ?>
                            <tbody>
                        </table>
                    </div>
                    <!-- End of Main Content -->
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