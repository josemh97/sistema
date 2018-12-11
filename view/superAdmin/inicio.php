<?php
if(!isset($_SESSION['usuario'])){
  header("Location: index.php");
}else{
 if($_SESSION['privilegio'] == "Administrador"){
  header("Location: index.php?c=Administrador");
} 
}
?>
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
    <li><a class="app-menu__item active" href="?c=sAdministrador"><i class="app-menu__icon fa fa-search"></i><span class="app-menu__label">Buscar Beneficiado</span></a></li>
    <li><a class="app-menu__item" href="?c=sAdministrador&a=FormAgregar"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Registrar Beneficiado</span></a></li>
    <li><a class="app-menu__item" href="?c=sAdministrador&a=FormAgregarAdmin"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Registrar Administrador</span></a></li>
  </ul>
</aside>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-user"></i> Beneficiados</h1>
      <p>Lista de los beneficiados registrados en el sistema</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Beneficiados</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-responsive table-bordered" id="sampleTable">
        <!--table-hover-->
        <thead>
          <tr>
            <th>Nombre(s)</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>RFC</th>
            <th>Departamento</th>
            <th>Tipo de Apoyo</th>
            <th>Fecha</th>
            <th>Persona a quien se entrego</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
          
        </thead>
        <tbody>
          <?php foreach($beneficiados as $beneficiado): ?>
            <tr>
              <td><?= $beneficiado->nombre; ?></td>
              <td><?= $beneficiado->paterno; ?></td>
              <td><?= $beneficiado->materno; ?></td>
              <td><?= $beneficiado->direccion; ?></td>
              <td><?= $beneficiado->telefono; ?></td>
              <td><?= $beneficiado->rfc; ?></td>
              <td><?= $beneficiado->nomdep; ?></td>
              <td><?= $beneficiado->nomapoy; ?></td>
              <td><?= $beneficiado->fechaentrega; ?></td>
              <td><?= $beneficiado->perentrega; ?></td>
              <td><a href="index.php?c=sAdministrador&a=FormAgregar&id=<?= $beneficiado->idBeneficiado; ?>" class="btn btn-block btn-info">
                <i class="fa fa-pencil" aria-hidden="true"></i>
              </a></td>
              <td><a href="index.php?c=sAdministrador&a=eliminar&id=<?= $beneficiado->idBeneficiado; ?>" class="btn btn-block btn-warning">
                <i class="fa fa-trash" aria-hidden="true"></i>
              </i></a></td>
            </tr>
          <?php  endforeach; ?>
        </tbody>
      </table>
      <div class="row d-print-none mt-2">
        <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();"><i class="fa fa-print"></i>Imprimir</a></div>
      </div>
    </div>
  </div>
</main>
