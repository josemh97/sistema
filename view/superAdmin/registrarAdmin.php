 <!-- Navbar-->
 <header class="app-header"><a class="app-header__logo" href="index.php">Apoyos</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li><a class="app-nav__item" href="?c=Inicio&a=Cerrar"><i class="fa fa-sign-out fa-lg"></i> Salir</a></li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div>
        <img class="d-block mx-auto pb-4" src="assets/img/logo2.png" width="40%" alt="" srcset="">
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item " href="?c=sAdministrador"><i class="app-menu__icon fa fa-search"></i><span class="app-menu__label">Buscar Beneficiado</span></a></li>
        <li><a class="app-menu__item" href="?c=sAdministrador&a=FormAgregar"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Registrar Beneficiado</span></a></li>
        <li><a class="app-menu__item active" href="?c=sAdministrador&a=FormAgregarAdmin"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Registrar Administrador</span></a></li>
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Registro</h1>
          <p>Registra administradores para el uso del sistema</p>
          <h5 id="mensajes" class="pt-2 text-success">
          <?php
          if(isset($_SESSION["mensajes"])){
            echo $_SESSION["mensajes"];
            unset($_SESSION["mensajes"]);
          } else {
            echo "";
          }
          ?></h5>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Registro</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
        <form method="POST" action="?c=sAdministrador&a=registrar" autocomplete="off">
          <div class="form-group">
            <label class="control-label">Nombre</label>
            <input
              class="form-control"
              type="text"
              placeholder="Ingrese el nombre del administrador"
              name="nombre"
            />
          </div>
          <div class="form-group">
            <label class="control-label">Usuario</label>
            <input
              class="form-control"
              type="text"
              placeholder="Ingrese el nombre de usuario"
              name="usuario"
            />
          </div>


          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="deparamentos">Departamento</label>
                <select id="deparamentos" class="form-control" name="departamento">
                  <?php foreach($departamentos as $departamento): ?>
                  <option value="<?= $departamento->nomdep; ?>"><?= $departamento->nomdep; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="privilegio">Privilegio</label>
                <select id="privilegio" class="form-control" name="privilegio">
                  <option selected value="Administrador">Administrador</option>
                  <option value="sAdministrador">Super administrador</option>
                </select>
              </div>
            </div>
          </div>

          

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Contraseña</label>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input
                      class="form-control"
                      type="password"
                      placeholder="Contraseña"
                      name="password"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Confirmar contraseña</label>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                    <input
                      class="form-control"
                      type="password"
                      placeholder="Confirmar contraseña"
                      name="confirmarPasswd"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>

          <p class="text-danger m-3"><?= (isset($errores) ? $errores : ""); ?></p>

          <input type="submit" class="btn btn-lg btn-success d-block mx-auto mt-3" value="Registrar">
        </form>
      </div>
      </div>
    </main>

    <script>
      var timePeriodInMs = 4000;
      setTimeout(function() { 
          document.getElementById("mensajes").style.visibility = "hidden"; 
      }, timePeriodInMs);
    </script>