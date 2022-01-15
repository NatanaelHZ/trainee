<?php

if (isset($_POST['logar'])) {
  $login = $_POST['login'];
  $senha = $_POST['senha'];

  if ($login == 'admin') { // login correto
    // a senha eh pizza123
    if (password_verify($senha, '$2y$10$Izh5K2nk22X/IlUlYiM3DOHtUUPORvGjKOIgGjm8/C8KPF5bNOLxy')){ // senha correta
      session_start();
      $_SESSION['usuario'] = "admin";
      $_SESSION['logado'] = true;
      $_SESSION['inicio'] = date("d/m/y H:i:s");
      header("Location: adm_sabor.php");
    } else {
      $erro = "Senha incorreta";
    }
  } else { // erro de login
    $erro = "Login inválido";
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Trainee Finanças</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="assets/css/signin.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="POST" action="#">
    <img class="mb-4" src="assets/img/logo.png" alt="Logo trainee Gamatec" height="58">
    <!--<h1 class="h3 mb-3 fw-normal">Login</h1> -->

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Usuário</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Senha</label>
    </div>

    <div class="separador"></div>

    <button class="w-100 btn btn-lg my-btn-primary" type="submit">Entrar
      <i class="bi bi-door-open"></i>
    </button>
    <p class="mt-5 mb-3 text-muted">&copy; Trainee Gamatec 2022</p>
  </form>
</main>


    
  </body>
</html>
