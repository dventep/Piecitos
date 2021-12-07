<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background:#A5A58D">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input id="filtro" type="text" class="form-control bg-light border-0 small" placeholder="Buscar..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <div class="btn" id="buttonBuscar" style="background:#DDBEA9;cursor:auto;">
                    <i class="fas fa-search fa-sm"></i>
                </div>
            </div>
        </div>
    </form>
    
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Buscar..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <div>
            <li class="nav-item dropdown no-arrow mx-1" id="interfaz_Notificacion">
                <a class="nav-link dropdown-toggle cada_correo cada_notificacion" href="#" id="campanita" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-url="<?php echo getUrl("Admin","Admin","notificacion",false, "ajax"); ?>">
                    <i class="fas fa-bell fa-fw" style="color:#FFF1E6;font-size:25px"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter alert-notificaciones" style="font-size:15px"><div id="cantidad_Notificaciones" data-url="<?php echo getUrl("Admin","Admin","cantNotificaciones",false,"ajax"); ?>"></div></span>
                </a>
                <!-- Dropdown - Alerts -->
                <div id="contenido_Notificaciones" class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="campanita">
                    <h6 class="dropdown-header">
                        Notificaciones
                    </h6>

                    <div id="notificaciones-activas" style="cursor:default;overflow:scroll;height:56vh;overflow-x:hidden">
                    </div>

                    <div id="contenidor_Mostrar_Mas">
                        <span class="dropdown-item text-center small bg-warning" id="masNotificaciones" style="color: #885a42; cursor:pointer" data-url="<?php echo getUrl("Admin","Admin","masNotificaciones",false,"ajax"); ?>">Mostrar más</span>
                    </div>
                </div>
            </li>
        </div>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="cada_correo nav-link dropdown-toggle" href="#" id="cartita" role="button"
                data-toggle="dropdown" aria-haspopup="true" data-url="<?php echo getUrl("Admin","Admin","correos",false, "ajax") ?>" aria-expanded="false">
                <i class="fas fa-envelope fa-fw" style="color:#FFF1E6;font-size:25px"></i>
                <!-- Counter - Messages -->
                <span id="correo_Notificaciones" data-url="<?php echo getUrl("Admin","Admin","mostrarCorreos",false, "ajax") ?>" class="badge badge-danger badge-counter" style="font-size:15px"></span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in "
                aria-labelledby="cartita">
                <h6 class="dropdown-header">
                    Correos de Interesados
                </h6>

                <div id="contenidoCorreos" style="cursor:default;overflow:scroll;height:56vh;overflow-x:hidden"></div>
            </div>
        </li>
    </ul>

</nav>