
        <link href="css_inicio/styles.css" rel="stylesheet" />
    
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase text-shadow-h1">Piecitos</h1>
                        <h2 class=" mx-auto mt-2 mb-5 text-shadow-h2">Una zona para disfrutar</h2>
                        <a class="btn text-light" style="background-color: #CB997E" href="<?php echo getUrl("Tienda","Tienda","catalogo") ?>">Ir a la tienda</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container px-4">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h2 class=" mb-4 text-shadow-producto" style="border-bottom:#FFF1E6 solid 2px;color:#FFF1E6;">NUESTROS PRODUCTOS</h2>
                        <p class="text-light">
                            Nuestros productos ofrecen un completo catálogo para los espacios interiores de hoteles, casinos, oficinas, auditorios y centros de convenciones donde la identidad corporativa es lo más importante. 
                            
                            Nuestros asesores están disponibles para desarrollar ambientes exclusivos y únicos en su espacio.
                        </p>
                    </div>
                </div>
            </div>
            <img class="img-fluid" style="width: 500px; position: relative; margin-top: -60px; left: -35%;" src="images/img/alfombra-doblada.png" alt="..." />
        </section>
        <!-- Projects-->
        <section class="projects-section bg-light" id="projects">
            <div class="container px-4 px-lg-5">
                <!-- Featured Project Row-->
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="images/img/bg-masthead-2.jpg" alt="..." /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Fibras de la alfombra</h4>
                            <p class="text-black-50 mb-0">
                                Las más comunes en la elaboración de alfombras son el nylon y el polipropileno . Estas fibras ofrecen comodidad, durabilidad y gran variedad de colores, las material primas utilizadas no producen alergias 
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Project One Row-->
                <div class="row gx-0  justify-content-center" style="position:relative;">
                    <div class="col-lg-6"><img class="img-fluid" style="position: absolute; bottom: 0;" src="images/img/demo-image-01.jpg" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="text-center h-100 project" style="background:#A5A58D;">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white text-shadow">Mantenimiento</h4>
                                    <p class="mb-0">
                                        Gran cantidad de alfombras Residenciales , Oficina, Auditorios y caminos ceremoniales son fáciles de limpiar utilizando Aspiradora, Trapero y Escoba . Para las diferentes y suciedades existen productos muy fáciles de aplicar.
                                    </p>
                                    <hr class="d-none d-lg-block mb-0 ms-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Project Two Row-->
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="images/img/demo-image-02.jpg" alt="..." /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="text-center h-100 project" style="background:#DDBEA9;">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-white text-shadow">Tráfico</h4>
                                    <p class="mb-0">
                                        Debemos tener muy claro cual será el uso que daremos a nuestra alfombra. Las áreas de tráfico pesado como corredores, entradas, salones requieren alfombras durables, áreas como alcobas pueden tener alfombra de tráfico medio o liviano.
                                    </p>
                                    <hr class="d-none d-lg-block mb-0 me-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Signup-->
        <section class="signup-section" id="signup">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                        <h2 class="text-white mb-5 text-shadow">¡Suscríbete!<br> Para recibir nuestras novedades</h2>
                        <form class="form-signup" id="formCorreo">
                            <!-- Email address input-->
                            <div class="row input-group-newsletter">
                                <div class="col">
                                    <input class="form-control" id="CorreoElectronico" type="email" placeholder="Ingrese su dirección de correo..." aria-label="Ingresa tu dirección de correo..." required/>
                                </div>
                                <div class="col-auto"><button class="btn" style="background:#CB997E;" id="btnNotificarCorreo" type="button" data-url="<?php echo getUrl("Admin","Admin", "notificarCorreo", false, "ajax"); ?>">¡Notifícame!</button></div>
                            </div>
                            <span id="notificarCorreo"></span>                          
                        </form>
                        
                        <form class="form-signup d-none" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Email address input-->
                            <div class="row input-group-newsletter">
                                <div class="col">
                                    <input class="form-control" id="emailAddress" type="email" placeholder="Enter email address..." aria-label="Enter email address..." data-sb-validations="required,email" />
                                </div>
                                <div class="col-auto"><button class="btn disabled" style="background:#CB997E;" id="submitButton" type="submit">¡Notifícame!</button></div>
                            </div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:required">Se necesita un correo electrónico.</div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:email">El correo electrónico no es válido.</div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3 mt-2 text-white">
                                    <div class="fw-bolder text-shadow">Se ha suscrito satisfactoriamente</div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3 mt-2 text-shadow">Ha habido un error al suscribirte</div></div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="contact-section pb-4" style="background: #A5A58D">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt mb-2" style="color:#CB997E"></i>
                                <h4 class="text-uppercase m-0">Dirección</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">Calle 35D #56-42</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope mb-2" style="color:#CB997E"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="#!" style="color:#CB997E">info@piecitos.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt mb-2" style="color:#CB997E"></i>
                                <h4 class="text-uppercase m-0">Celular</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">+57 321 643 9529</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social d-flex justify-content-center">
                    <a class="mx-2 social-twitter" href="#!"><i class="fab fa-twitter" style="color:black"></i></a>
                    <a class="mx-2 social-facebook" href="#!"><i class="fab fa-facebook-f" style="color:black"></i></a>
                    <a class="mx-2 social-whatsapp" href="#!"><i class="fab fa-whatsapp" style="color:black"></i></a>
                    <a class="mx-2 social-youtube" href="#!"><i class="fab fa-youtube" style="color:black"></i></a>
                </div>
            </div>
        </section>
        
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>