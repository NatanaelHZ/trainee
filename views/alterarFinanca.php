<?php
// Controller das finanças
include_once "../class/CategoriaDAO.php";

$Categoria = new CategoriaDAO();
$categorias = $Categoria->listar();

$codigo = (isset($_POST['codigo'])) ? $_POST['codigo'] : strval($financa->getCodigo());
$codigo_categoria = (isset($_POST['codigo_categoria'])) ? strval($_POST['codigo_categoria']) : strval($financa->getCodigoCategoria());
$data = (isset($_POST['data'])) ? $_POST['data'] : $financa->getData();
$valor = (isset($_POST['valor'])) ? $_POST['valor'] : $financa->getValor();
$descricao = (isset($_POST['descricao'])) ? $_POST['descricao'] : $financa->getDescricao();

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <h3 class="title-page"><i class="bi bi-plus"></i> Nova Finança</h3>

  <div class="separador"></div>

  <div class="col-md-7 col-lg-8">
    <form action="#" method="post">
      <div class="row g-3">

        <div class="col-md-4 col-sm-12">
          <label for="codigo_categoria" class="form-label">Categoria</label>
          <select name="codigo_categoria" class="form-select" id="codigo_categoria" required>
            <?php foreach ($categorias as $categoria) { ?>
              <option value="<?=$categoria->getCodigo()?>" <?=$codigo_categoria == strval($categoria->getCodigo()) ? 'selected' : '' ?>><?=$categoria->getNome()?></option>
            <?php } ?>
          </select>
          <div class="invalid-feedback">
            Selecione a categoria.
          </div>
        </div>

        <div class="col-md-4 col-sm-12">
          <label for="data" class="form-label">Data</label>
          <input name="data" type="date" class="form-control" id="data" required value="<?=$data?>">
          <div class="invalid-feedback">
            Preencha a data.
          </div>
        </div>

        <div class="col-md-4  col-sm-12">
          <label for="valor" class="form-label">Valor</label>
          <div class="input-group has-validation">
            <span class="input-group-text">R$</span>
            <input name="valor" type="text" class="form-control" id="valor" required value="<?=$valor?>">
            <div class="invalid-feedback">
              Preencha o valor.
            </div>
          </div>
        </div>

        <div class="col-sm-12">
          <label for="descricao" class="form-label">Descrição</label>
          <input name="descricao" type="text" class="form-control" id="descricao" required value="<?=$descricao?>">
          <div class="invalid-feedback">
            Preencha a descrição.
          </div>
        </div>

      </div>

      <div class="separador"></div>
      <hr class="my-4">
      
      <input type="hidden" name="alterar" value="Alterar">
      <input type="hidden" name="codigo" value="<?=$codigo?>">

      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="financas.php" class="btn btn-secundary"><i class="bi bi-x-lg text-dark"></i> Cancelar</a>
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
