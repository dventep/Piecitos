  <style>
    #mainNav {
      background:#6d6d41;
    }
    .text-shadow {    
      text-shadow: 0 0 0 rgba(255, 255, 255, 0.5);
    }
  </style>
  
  
<div class="container-fluid ps-md-0">
  <div class="row" style="margin-right: 0;">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4 text-center font-weight-bold">¡Bienvenido De Nuevo!</h3>

              <!-- Sign In Form -->
              <form action="<?php echo getUrl("Acceso","Acceso","login",false,"ajax") ?>" method="post">
                <div class="form-floating mb-3">
                  <label for="correo_input">Correo Electrónico o Número de Identificación</label>
                  <input type="text" class="form-control" id="user" name="user" placeholder="luis@cacharreo.com">
                </div>
                <div class="form-floating mb-3">
                  <label for="contraseña_input">Contraseña</label>
                  <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña">
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

                <div class="d-grid">
                  <div class="row">
                    <button class="btn btn-lg btn-login text-uppercase fw-bold mb-2 mx-auto text-light" type="submit" style="background:#6d6d41">Iniciar Sesión</button>
                  </div>
                  <div class="text-center">
                    <a class="small" style="color:#904b26;" href="#">¿Olvidaste la contraseña?</a>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>