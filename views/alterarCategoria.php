<?php
// Controller das finanças

$codigo = (isset($_POST['codigo'])) ? $_POST['codigo'] : strval($categoria->getCodigo());
$tipo = (isset($_POST['tipo'])) ? strval($_POST['tipo']) : strval($categoria->getTipo());
$nome = (isset($_POST['nome'])) ? $_POST['nome'] : $categoria->getNome();

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <h3 class="title-page"><i class="bi bi-pencil"></i> Alterar Categoria</h3>

  <div class="separador"></div>

  <div class="col-md-7 col-lg-8">
    <form action="#" method="post">
      <div class="row g-3">

      <div class="col-md-6 col-sm-12">
          <label for="tipo" class="form-label">Tipo</label>
          <select name="tipo" class="form-select" id="tipo" required>
            <option value="D" <?=$tipo == 'D' ? 'selected' : '' ?>>Despesa</option>
            <option value="R" <?=$tipo == 'R' ? 'selected' : '' ?>>Receita</option>
          </select>
          <div class="invalid-feedback">
            Selecione o tipo.
          </div>
        </div>

        <div class="col-md-6 col-sm-12">
          <label for="nome" class="form-label">Data</label>
          <input name="nome" type="text" class="form-control" id="nome" required value="<?=$nome?>">
          <div class="invalid-feedback">
            Preencha a nome.
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
