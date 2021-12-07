<link href="css_inicio/css_admin.css" rel="stylesheet">

<style>
    #revision {
        font-weight: bold;
        background-color: #eddcd25c;        }
    #revision > a > span {
        color: #fff !important;       }
    #mainNav {
        background: #6d6d41;        }
    .text-shadow {
        text-shadow: 0 0 0 rgba(255, 255, 255, 0.5);        }
</style>

<!-- Page Wrapper -->
<div class="mt-7">
    <div id="wrapper">

        <!-- Sidebar -->
        <?php 
            include_once '../view/partials/navbar_admin.php';
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
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

                    <!-- Page Heading - Ventas -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0" style="color:#505050">Ventas</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm border-0" style="background:#CB997E">
                            <i class="fas fa-download fa-sm text-white-50"></i> 
                            Generar Reporte
                        </a>
                    </div>

                    <!-- Page Heading - Ventas por Tiempo -->
                    <div class="row d-flex justify-content-center flex-wrap" style="gap:20px">
                        <!-- Cada Tarjeta donde aparece cada Estadística Unificada "Números"  -->
                        <!-- Dia -->
                        <div class="mt-5">
                            <div class="card" style="width: 20rem;background:#6d6d41;color:#FFF1E6 !important;">
                                <div class="card-body">
                                    <div class="card-parte-superior row">

                                        <div class="card-icono rounded" style="background:#d09508">
                                            <i class="fas fa-shopping-bag"
                                                style="font-size: 35px;color: #FFF1E6"></i>
                                        </div>

                                        <div class="ml-auto mr-3 mb-3 col-md-12
                                    " style="text-align: right;">
                                            <p class="card-title mb-0">Ventas del Día</p>

                                            <h4 class="card-text" style="color:#DDBEA9">$16.000</h4>
                                        </div>
                                    </div>

                                    <div class="actualizado border-top pt-2"
                                        style="border-color:#FFF1E6 !important">
                                        <i class="far fa-clock"></i>
                                        Actualizado justo ahora
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Semanas -->
                        <div class="mt-5">
                            <div class="card" style="width: 20rem;background:#6d6d41;color:#FFF1E6 !important;">
                                <div class="card-body">
                                    <div class="card-parte-superior row">

                                        <div class="card-icono rounded" style="background:#43aa8b">
                                            <i class="fas fa-cash-register"
                                                style="font-size: 35px;color: #FFF1E6"></i>
                                        </div>

                                        <div class="ml-auto mr-3 mb-3 col-md-12
                                    " style="text-align: right;">
                                            <p class="card-title mb-0">Ventas de las Semanas</p>

                                            <h4 class="card-text" style="color:#DDBEA9">$56.000</h4>
                                        </div>
                                    </div>

                                    <div class="actualizado border-top pt-2"
                                        style="border-color:#FFF1E6 !important">
                                        <i class="far fa-clock"></i>
                                        Actualizado hace 24 horas
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Meses -->
                        <div class="mt-5">
                            <div class="card" style="width: 20rem;background:#6d6d41;color:#FFF1E6 !important;">
                                <div class="card-body">
                                    <div class="card-parte-superior row">

                                        <div class="card-icono rounded row" style="background:#277da1">
                                            <i class="fas fa-store-alt" style="font-size: 35px;color: #FFF1E6"></i>
                                        </div>

                                        <div class="ml-auto mr-3 mb-3 col-md-12
                                    " style="text-align: right;">
                                            <p class="card-title mb-0">Ventas de los Meses</p>

                                            <h4 class="card-text" style="color:#DDBEA9">$420.000</h4>
                                        </div>
                                    </div>

                                    <div class="actualizado border-top pt-2"
                                        style="border-color:#FFF1E6 !important">
                                        <i class="far fa-clock"></i>
                                        Actualizado hace 1 mes
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Años - Diagrama de Barras -->
                    </div>
                    <div class="row d-flex justify-content-center px-5">
                        <div class="mt-5" style="min-width: 20rem; width:100%;">
                            <div class="card" style="background:#6d6d41;color:#FFF1E6 !important;">
                                <div class="card-body">
                                    <div class="card-parte-superior row">

                                        <div class="card-icono-diagrama rounded" style="background:#ef476f;">

                                        </div>
                                    </div>
                                    <p class="text-right" style="margin-top:-40px">Ventas por Año</p>
                                    <div class="actualizado border-top pt-2"
                                        style="border-color:#FFF1E6 !important; margin-top:-10px">
                                        <i class="far fa-clock"></i>
                                        Actualizado haces 6 meses
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="sidebar-divider">

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Footer -->
    <?php 
        include_once '../view/partials/footer.php';
    ?>
    <!-- End of Footer -->
</div>