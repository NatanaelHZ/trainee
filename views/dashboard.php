<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dashboard">

    <title>Dashboard · Trainee</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    

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
            <a class="nav-link active" aria-current="page" href="#">
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
            <a class="nav-link" href="usuario.php">
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

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Compartilhar</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            Mês
          </button>
        </div>
      </div>

      <div class="d-flex justify-content-center align-items-center">
        <div id="load_page" class="spinner-border" style="width: 4rem; height: 4rem; margin-top: 10%;" role="status"></div>   
      </div>

      <canvas class="my-4 w-100" id="myChart" width="900" height="240"></canvas>

      <div class="row">

        <div class="col-md-3 col-sm-12">
          <div class="card mb-3" style="max-width: 18rem; border-color: #0BD953;">
            <div class="card-body" style="color: #0BD953;">
              <h5 class="card-text"><i class="bi bi-arrow-up"></i>Receitas</h5>
              <h2 class="card-title">R$ 2200,00</h2>
              <p class="card-text">Mês Atual</p>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-12">
          <div class="card mb-3" style="max-width: 18rem; border-color: #E74C3C;">
            <div class="card-body" style="color: #E74C3C;">
              <h5 class="card-text"><i class="bi bi-arrow-down"></i>Depesas</h5>
              <h2 class="card-title">R$ 1200,00</h2>
              <p class="card-text">Mês Atual</p>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-12">
          <div class="card mb-3" style="max-width: 18rem; border-color: #481CA6;">
            <div class="card-body" style="color: #481CA6;">
              <h5 class="card-text"><i class="bi bi-wallet2"></i> Saldo</h5>
              <h2 class="card-title">R$ 1000,00</h2>
              <p class="card-text">Mês Atual</p>
            </div>
          </div>
        </div>
        
        <div class="col-md-3 col-sm-12">
          <div class="card border-secondary mb-3" style="max-width: 18rem;">
            <div class="card-body text-secondary">
              <h5 class="card-text"><i class="bi bi-piggy-bank"></i> Saldo Ano</h5>
              <h2 class="card-title">R$ 1200,00</h2>
              <p class="card-text">Ano Atual</p>
            </div>
          </div>
        </div>

      </div>


    </main>
  </div>
</div>


    <script src="../assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/graficos.js"></script>
  </body>
</html>
