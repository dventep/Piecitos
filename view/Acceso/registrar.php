
    <link href="css_inicio/registrar.css" rel="stylesheet" />
    <style>
      #mainNav {
        background:#6d6d41;
      }
      .text-shadow {    
        text-shadow: 0 0 0 rgba(255, 255, 255, 0.5);
      }
    </style>
    
  <div class="container mt-7">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <h2 class="card-title text-center mb-5 fw-light font-weight-bold">¡Regístrate!</h2>
            
            <form action="<?php echo getUrl("Acceso","Acceso","signup",false,"ajax") ?>" method="post">

              <div class="form-floating mb-3">
                <label for="usuario_input">Nombre Usuario</label>
                <input type="text" class="form-control" id="usuario_input" name="usuario_input" placeholder="Nombre de Usuario" autofocus required>
              </div>

              <div class="form-floating mb-3">
                <label for="correo_input">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo_input" name="correo_input" placeholder="luis@cacharreo.com" required>
              </div>

              <hr>

              <div class="form-floating mb-3">
                <label for="contraseña_input">Contraseña</label>
                <input type="password" class="form-control" id="contraseña_input" name="contraseña_input" placeholder="Contraseña" required>
              </div>

              <div class="form-floating mb-3">
                <label for="confirmar_input">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="confirmar_input" name="confirmar_input" placeholder="Confirmar Contraseña" required>
              </div>
              <?php
                if (isset($_SESSION['error'])) {
              ?>
                  <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error']; ?>  
                  </div>
              <?php
                unset($_SESSION['error']);
                }
              ?>

              <hr>

              <div class="d-grid mb-2">
                <button class="btn btn-lg text-light btn-login fw-bold text-uppercase col-md-12" style="background:#6d6d41" type="submit">Registrarme</button>
              </div>

              <a class="d-block text-center mt-2 small" style="color:#904b26" href="<?php echo getUrl("Acceso","Acceso","iniciar"); ?>">¿Tienes una cuenta? Inicia sesión</a>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </script>
