<!--Tomamos la sesión-->
<?php
$session = session();
$nombre = $session->get('nombre');
$perfil_id = $session->get('perfil_id');
?>
<!--Inicio de Barra de navegación-->
<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body"
data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo base_url('principal')?>">
    <!--logo de la empresa-->
    <img src="assets/img/logo.jpg" alt="logo" width="75" hight="75"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" 
    aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!--Navbar para ADMIN-->
    <?php if (session()->perfil_id == 1): ?>
      <div class="btn btn-secondary active btnUser btn-sm">
        <a href="">ADMIN: <?php echo session('nombre'); ?> </a>
      </div>
    <a class="navbar-brand" href="#"></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="agregar_producto"> Actualizar Catálogo </a>
        </li>
        <li class="nav-item">
          <!--FALTA href-->
          <a class="nav-link" href="ver_consulta"> Ver Consultas </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('logout');?>" tabindex="-1"
          aria-disabbled="true">Cerrar Sesión</a>
        </li>
      </ul>
    </div>

      <!--Navbar para clientes-->
      <?php elseif (session()->perfil_id == 2): ?>
      <div class="btn btn-info active btnUser btn-sm">
        <a href="">CLIENTE: <?php echo session('nombre'); ?> </a>
      </div>
      <a class="navbar-brand" href="#"></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="quienes_somos">Quienes Somos</a>
        </li>
        <li class="nav-item">
          <!--los href son las funciones en el Controlador Home-->
          <a class="nav-link" href="acerca_de">Acerca de</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="consultar_producto">Consultas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('logout');?>" tabindex="-1"
          aria-disabbled="true">Cerrar Sesión</a>
        </li>
      </ul>
    </div>

    <!--Navbar para clientes no logueados-->
    <?php else: ?>
    <a class="navbar-brand" href="#"></a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="quienes_somos">Quienes Somos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="acerca_de">Acerca de</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registro">Registro</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login">Login</a>
        </li>
      </ul>
    </div>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" 
        aria-label="Search">
        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
      </form>
      <?php endif; ?>
    </div>
  </div>
</nav>
<!--Fin de Barra de Navegación-->