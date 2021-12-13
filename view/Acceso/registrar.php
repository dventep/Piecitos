
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
                <label for="nombre_input">Nombre</label>
                <input type="text" class="form-control" id="nombre_input" name="nombre_input" placeholder="Nombre" <?php if (isset($_SESSION['nombre_input'])) { echo "value='".$_SESSION['nombre_input']."'"; 
                unset($_SESSION['nombre_input']);
                } ?> autofocus required>
              </div>
              <div class="form-floating mb-3">
                <label for="apellido_input">Apellido</label>
                <input type="text" class="form-control" id="apellido_input" name="apellido_input" placeholder="Apellido" <?php if (isset($_SESSION['apellido_input'])) { echo "value='".$_SESSION['apellido_input']."'";
                unset($_SESSION['apellido_input']);
                 } ?> required>
              </div>
              <div class="form-floating mb-3">
                <label for="identificacion_input">Tipo de Identificación</label>                
                <select name="identificacion_input" id="identificacion_input" class="form-control" required>                  
                  <option value="">Seleccione..</option>
                  <?php 
                      while ($identificacion = mysqli_fetch_assoc($identificaciones)) {
                  ?>
                      <option value="<?php echo $identificacion['Tipo_Id'] ?>" <?php if (isset($_SESSION['identificacion_input']) and $_SESSION['identificacion_input'] == $identificacion['Tipo_Id']) {echo "selected";
                      unset($_SESSION['identificacion_input']);
                      } ?>><?php echo $identificacion['Tipo_Nombre'] ?></option>
                  <?php
                      }
                  ?>
                </select>
              </div>
              <div class="form-floating mb-3">
                <label for="num_Identificacion_input">Número de Identificación</label>
                <input type="text" class="form-control" id="num_Identificacion_input" name="num_Identificacion_input" placeholder="Número de Identificación" <?php if (isset($_SESSION['num_Identificacion_input'])) { echo "value='".$_SESSION['num_Identificacion_input']."'";
                unset($_SESSION['num_Identificacion_input']);
                 } ?> required>
              </div>

              <div class="form-floating mb-3">
                <label for="correo_input">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo_input" name="correo_input" placeholder="luis@cacharreo.com" <?php if (isset($_SESSION['correo_input'])) { echo "value='".$_SESSION['correo_input']."'";
                unset($_SESSION['correo_input']);
                 } ?> required>
              </div>

              <hr>

              <div class="form-floating mb-3">
                <label for="contraseña_input">Contraseña</label>
                <input type="password" class="form-control" id="contraseña_input" name="contraseña_input" placeholder="Contraseña" <?php if (isset($_SESSION['contrasena_input'])) { echo "value='".$_SESSION['contrasena_input']."'"; 
                unset($_SESSION['contrasena_input']);
                } ?> required>
              </div>

              <div class="form-floating mb-3">
                <label for="confirmar_input">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="confirmar_input" name="confirmar_input" placeholder="Confirmar Contraseña" <?php if (isset($_SESSION['confirmar_input'])) { echo "value='".$_SESSION['confirmar_input']."'";
                unset($_SESSION['confirmar_input']);
                 } ?> required>
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
