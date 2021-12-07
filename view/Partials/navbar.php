<!-- Navigation-->

<nav class="navbar navbar-expand-lg navbar-light fixed-top text-shadow" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="<?php echo getUrl("Inicio","Inicio","inicio"); ?>" style="text-decoration:none;">                
                    <img src="images/piecitos.png" alt="Logo PIECITOS" width="32" class="mr-2">
                    PIECITOS
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Piecitos
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="<?php echo getUrl("Inicio","Inicio","inicio"); ?>"style="text-decoration:none;" >Inicio</a></li>

                        <li class="nav-item"><a class="nav-link" href="<?php echo getUrl("Tienda","Tienda","catalogo"); ?>"style="text-decoration:none;"  >Tienda</a></li>

                        <?php
                            if (isset($_SESSION['rol_id']) AND ($_SESSION['rol_id'] != 1)) {
                        ?>
                            <li class="nav-item"><a class="nav-link" href="<?php echo getUrl("Admin","Admin","vista"); ?>"style="text-decoration:none;" >Admin</a></li>
                        <?php
                            }
                        ?>
                        <?php
                            if (!isset($_SESSION['id'])) {
                        ?>
                            <li class="nav-item"><a class="nav-link" href="<?php echo getUrl("Acceso","Acceso","iniciar"); ?>"style="text-decoration:none;"  >Iniciar Sesión</a></li>
                            
                            <li class="nav-item"><a class="nav-link" href="<?php echo getUrl("Acceso","Acceso","registrar"); ?>"style="text-decoration:none;"  >Registrarme</a></li>
                            <?php
                            } else {
                        ?>
                    </ul>
                    <ul class="navbar-nav ml-2 mr-5">    
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle py-2 pr-0 mr-0" style="text-decoration:none;padding-left:0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?php echo $_SESSION['foto']; ?>" alt="<?php echo $_SESSION['nombre']." ".$_SESSION['apellido'] ?>" class="rounded-circle mx-auto size-productos" style="height: 3rem;max-width: 3rem;width:100%;">
                                    <?php echo $_SESSION['nombre']; ?>
                                </a>
                                <div class="dropdown-menu " aria-labelledby="navbarDropdown" style="text-shadow: 0px 0px transparent;">
                                    <a class="dropdown-item" href="<?php echo getUrl("Usuario","Usuario","perfil") ?>">Ver Perfil</a>
                                    <a class="dropdown-item" href="<?php echo getUrl("Acceso","Acceso","logout") ?>">Cerrar Sesion</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-2 mr-5">
                            <li class="nav-item">
                                <a href="<?php echo getUrl("Carrito","Carrito","pedidos"); ?>" class="btn p-2 btn-dark box-shadow actualizarCarrito mostrarCarrito" id="mostrarCarrito">
                                    <i class="fas fa-shopping-cart" style="font-size: 1.3rem;"></i>
                                    <sup><span class="badge badge-danger" data-url="<?php echo getUrl("Carrito","Carrito","verCantidad", false, "ajax"); ?>" id="cantidadCarrito" style="font-size: 0.7rem; top: -7px;"></span></sup>
                                </a>
                            </li>
                        </ul>
                        <?php
                            }
                        ?>
                </div>
            </div>
</nav>