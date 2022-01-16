<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Usuário">

    <title>Finanças · Trainee</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../assets/css/dashboard.css" rel="stylesheet">

    <link href="../assets/css/style.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <img class="simbolo-logo" src="../assets/img/simbolo.png" alt="Logo trainee Gamatec" height="28">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-2" href="#">Trainee Gamatec</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Pesquisar" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sair <i class="bi bi-door-closed"></i></a> 
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="financas.php">
              <span data-feather="dollar-sign"></span>
              Finanças
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="categorias.php">
              <span data-feather="tag"></span>
              Categorias
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="users"></span>
              Minha conta
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="settings"></span>
              Configurações
            </a>
          </li>
        </ul>

      </div>
    </nav>

<?php
// Controller das finanças
include_once "../class/Usuario.php";
include_once "../class/UsuarioDAO.php";

session_start();

if (!isset($_SESSION['codigo'])) header("Location: ../index.php");

if (!isset($_POST['alterar'])) { //ao carregar formulario
  $obj = new UsuarioDAO();

  $usuario = $obj->buscar($_SESSION['codigo']);

  if (is_object($usuario)) 
    include "alterarUsuario.php";
  else
    header("Location: usuario.php");
} else { 
  $atual = new Usuario();
  $atual->setCodigo($_POST['codigo']);
  $atual->setNome($_POST['nome']);
  $atual->setEmail($_POST['email']);
  $atual->setSenha($_POST['senha']);

  $erros = $atual->validar();

  if (count($erros) != 0) {
    include "alterarUsuario.php";
  }
  else{
    $bd = new UsuarioDAO();

    if ($bd->alterar($atual))
      header("Location: usuario.php");
  }
}

?>
  </div>
</div>


    <script src="../assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../assets/js/dashboard.js"></script>
  </body>
</html>
