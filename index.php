<?php

$erro = '';

if (isset($_POST['acao'])) {
  if ($_POST['acao'] == 'logar') {
    include_once("class/UsuarioDAO.php");

    $Usuario = new UsuarioDAO();

    $resposta = $Usuario->login($_POST['email'], $_POST['senha']);

    if (isset($resposta['status'])) {
      if ($resposta['status'] == 'sucesso') {
        $_SESSION['codigo'] = $resposta['codigo'];
        $_SESSION['nome'] = $resposta['nome'];
        $_SESSION['email'] = $resposta['email'];

        header("Location: views/dashboard.php");
      } else if ($resposta['status'] == 'erro') {
        header("Location: index.php?acao=erro");
      }
    }
    else { 
      header("Location: index.php?acao=falha");
    }
  }
} elseif (isset($_GET['acao'])) {
  if ($_GET['acao'] == 'erro')
    $erro = 'Usuário ou Senha inválido*';
  else if ($_GET['acao'] == 'falha')
    $erro = 'Falha: tente novamente mais tarde';
}

?>

<!doctype html>
<html lang="pt-br">
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

    <div class="form-floating">
      <input type="email" class="form-control" id="email" placeholder="nome@example.com" name="email">
      <label for="email">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha">
      <label for="senha">Senha</label>
    </div>

    <div class="separador"></div>
    
    <input type="hidden" name="acao" value="logar">

    <button class="w-100 btn btn-lg my-btn-primary" type="submit">Entrar
      <i class="bi bi-door-open"></i>
    </button>

    <div class="erro-login"><?=$erro?></div>

    <p class="mt-5 mb-3 text-muted">&copy; Trainee Gamatec 2022</p>
  </form>
</main>

  </body>
</html>
