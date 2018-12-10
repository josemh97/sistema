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
        <li><a class="app-menu__item active" href="?c=sAdministrador&a=FormAgregar"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Registrar Beneficiado</span></a></li>
        <li><a class="app-menu__item" href="?c=sAdministrador&a=FormAgregarAdmin"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Registrar Administrador</span></a></li>
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user"></i> Registrar</h1>
          <p>Registro de datos de nuevo beneficiario</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Beneficiados</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
        <div class="col-md-12">
      <form method="POST" action="?c=sAdministrador&a=guardar" autocomplete="off">
        <div class="form-group">
          <input
            type="hidden"
            name="id"
            value="<?= $p->getId(); ?>"
          />
          <label class="control-label">Nombre</label>
          <input
            class="form-control"
            type="text"
           
            name="nombre"
            value="<?= $p->getNombre(); ?>"
          />
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Apellido Paterno</label>
              <div class="form-group">
                <div class="input-group">
                  
                  <input
                  class="form-control"
                  type="text"
            
                  name="apPaterno"
                  value="<?= $p->getApPaterno(); ?>"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Apellido Materno</label>
              <div class="form-group">
                <div class="input-group">
                 
                  <input
                  class="form-control"
                  type="text"
                    
                  name="apMaterno"
                  value="<?= $p->getApMaterno(); ?>"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>

         
        <div class="form-group">
          <label class="control-label">Dirección</label>
          <div class="input-group">
          <div class="input-group-prepend">
                  <span class="input-group-text">
                  <i class="fa fa-address-card" aria-hidden="true"></i>
                  </span>
                  </div>
             <input
                class="form-control"
                type="text"
                    
                name="direccion"
                value="<?= $p->getDireccion(); ?>"
              />
            </div>
            </div>


  <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Teléfono</label>
              <div class="form-group">
                <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  </span>
                  </div>   
                  <input
                  class="form-control"
                  type="number"
            
                  name="telefono"
                  value="<?= $p->getTelefono(); ?>"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">RFC</label>
              <div class="form-group">
                <div class="input-group">
                 
                  <input
                  class="form-control"
                  type="text"
            
                  name="rfc"
                  value="<?= $p->getRFC(); ?>"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="deparamentos">Departamento</label>
                <select id="deparamentos" class="form-control" name="departamento">
                  <?php $i = 0; ?>
                  <?php foreach($departamentos as $departamento): ?>
                  <?php $i += 1;?>
                  <option value="<?= $departamento->idDepartamento; ?>" <?= ($p->getDepartamento() == $i) ? "selected" : "" ?>><?= $departamento->nomdep; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="privilegio">Tipo de apoyo</label>
                <select id="privilegio" class="form-control" name="tipoApoyo">
                  <?php $e = 0; ?>
                  <?php foreach($apoyos as $apoyo): ?>
                  <?php $e += 1;?>
                  <option value="<?= $apoyo->idTipoApoyo; ?>" <?= ($p->getTipoApoyo() == $e) ? "selected" : "" ?>><?= $apoyo->nomapoy; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
        </div>
  
  <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Fecha</label>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                  <span class="input-group-text">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                  </span>
                  </div> 
                  <input
                  class="form-control"
                  type="date"
                  placeholder="día/mes/año"
                  name="fecha"
                  value="<?= $p->getFecha(); ?>"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Persona que recibio el apoyo</label>
              <div class="form-group">
                <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  </span>
                  </div> 
                  <input
                  class="form-control"
            type="text"
            
            name="perRecibe"
            value="<?= $p->getPerRecibe(); ?>"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>

        <p class="text-danger m-3"><?= (isset($errores) ? $errores : ""); ?></p>

        <input type="submit" class="btn btn-lg btn-success d-block mx-auto mt-3" value="<?= $titulo; ?>">
      </form>
      </div>
      </div>
    </main>