<?php
// Controller das finanças

$codigo = (isset($_POST['codigo'])) ? $_POST['codigo'] : strval($usuario->getCodigo());
$nome  = (isset($_POST['nome'])) ? $_POST['nome'] : $usuario->getNome();
$email = (isset($_POST['email'])) ? strval($_POST['email']) : strval($usuario->getEmail());
$senha = (isset($_POST['senha'])) ? strval($_POST['senha']) : '';

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <h3 class="title-page"><i class="bi bi-pencil"></i> Alterar Usuário</h3>

  <div class="separador"></div>

  <div class="col-md-7 col-lg-8">
    <form action="#" method="post">
      <div class="row g-3">

        <div class="col-md-12 col-sm-12">
          <label for="nome" class="form-label">Nome</label>
          <input name="nome" type="text" class="form-control" id="nome" required value="<?=$nome?>">
          <div class="invalid-feedback">
            Preencha a nome.
          </div>
        </div>

        <div class="col-md-12 col-sm-12">
          <label for="email" class="form-label">Email</label>
          <input name="email" type="email" class="form-control" id="email" required value="<?=$email?>">
          <div class="invalid-feedback">
            Preencha a email.
          </div>
        </div>

        <div class="col-md-12 col-sm-12">
          <label for="senha" class="form-label">Senha</label>
          <input name="senha" type="password" class="form-control" id="senha" required value="<?=$senha?>">
          <div class="invalid-feedback">
            Preencha a senha.
          </div>
        </div>

      </div>

      <div class="separador"></div>
      <hr class="my-4">
      
      <input type="hidden" name="alterar" value="Alterar">
      <input type="hidden" name="codigo" value="<?=$codigo?>">

      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="categorias.php" class="btn btn-secundary"><i class="bi bi-x-lg text-dark"></i> Cancelar</a>
        <button type="submit" class="btn my-btn-save"><i class="bi bi-check-lg text-light"></i> Salvar</button>
      </div>        

      <div class="separador"></div>
    </form>
  </div>

<?php
if (isset($erros) && count($erros) != 0) {
  echo "<ul>";
  foreach ($erros as $e)
      echo "<li>$e</li>";
  echo "</ul>";
}
?>

</main>
