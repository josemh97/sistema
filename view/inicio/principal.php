    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <img  class="d-block mx-auto" src="assets/img/logo2.png" width="50%" alt="" srcset="">
      </div>
      <div class="login-box">
        <form class="login-form" method="POST" action="?c=Inicio&a=inicio">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Ingresar</h3>
          <div class="form-group">
            <label class="control-label">Usuario</label>
            <input class="form-control" type="text" placeholder="Nombre de usuario" name="usuario" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">Contraseña</label>
            <input class="form-control" type="password" placeholder="Contraseña" name="password">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Entrar</button>
          </div>
          <p class="mt-3 text-danger"><?= (isset($error)) ? $error : ""; ?></p>
        </form>
      </div>
    </section>