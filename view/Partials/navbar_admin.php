<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark d-fixed" style="height:100hw" id="admin_Navbar">

        <!-- Nav Item - Dashboard -->
    <div class="sticky-top" style="height: 100vh; overflow-y: auto; overflow-x: hidden; padding-top: 60px;">
        <li class="nav-item mt-4 mb-2" id="revision">
    
            <a class="nav-link" href="<?php echo getUrl("Admin","Admin","vista"); ?>">
                <i class="fas fa-chart-bar"></i>
                <span class="admin_Navegacion">Revisión</span>
            </a>
        </li>

        <!--! Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading admin_Navegacion_titulo">
            PRODUCTOS
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item"  id="productos">
            <a class="nav-link" href="<?php echo getUrl("Producto","Producto","catalogo") ?>">
                <i class="fas fa-cubes"></i>
                <span class="admin_Navegacion">Vista General</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="a_icono nav-link collapsed" data-toggle="collapse" href="#cont_porCategoria" role="button" aria-expanded="false" aria-controls="cont_porCategoria" data-id="iconoCategoria">
                <i class="fas fa-cube"></i>
                <span class="admin_Navegacion">Categorías</span>
                <i id="iconoCategoria" class="iconoFlechas_Admin fas fa-chevron-right flecha-derecha align-middle"></i>
            </a>
            <div class="collapse  position-absolute" style="top: 45px" id="cont_porCategoria" data-url="<?php echo getUrl("Producto","Producto","porCategoria",false,"ajax"); ?>">
                <div class="bg-white py-2 collapse-inner rounded mr-auto">
                    <h6 class="sidebar-heading admin_Navegacion_titulo">Tipo de Productos:</h6>
                    
                    <a id="1" class="collapse-item porCategoria_Producto" style="cursor:pointer; margin:0;"><i class="fas fa-paw"></i><span class="admin_Navegacion"> Alfombras</span></a>
                    
                    <a id="2" class="collapse-item porCategoria_Producto" style="cursor:pointer; margin:0;"><i class="fas fa-shoe-prints"></i><span class="admin_Navegacion"> Tapetes</span></a>

                    <a id="3" class="collapse-item porCategoria_Producto" style="cursor:pointer; margin:0;"><i class="fas fa-couch"></i><span class="admin_Navegacion"> Cojines</span></a>                    
                    
                    <a id="4" class="collapse-item porCategoria_Producto" style="cursor:pointer; margin:0;"><i class="fas fa-pump-soap"></i><span class="admin_Navegacion"> Mantenimiento</span></a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item" id="proveedores">
            <a class="nav-link" href="<?php echo getUrl("Proveedor","Proveedor","lista") ?>">
                <i class="fas fa-user-tie"></i>
                <span class="admin_Navegacion">Proveedores</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item" id="usuarios">
            <a class="nav-link" href="<?php echo getUrl("Usuario","Usuario","lista") ?>">
                <i class="fas fa-users"></i>
                <span class="admin_Navegacion">Usuarios</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-flex mt-3 justify-content-center" >
        <button class="rounded-circle border-0 py-2 px-3" style="background: #A5A58D;" id="admin_Boton_Ocultar" ><i class="fas fa-angle-left text-light" id="admin_Icono_Ocultar"></i></button>
  </div>      
    </div>

</ul>