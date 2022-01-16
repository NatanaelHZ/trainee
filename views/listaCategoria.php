<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <h2 class="title-page">Categorias</h2>

  <div class="fixed-bottom">
    <div class="adicionar-registro">
      <a href="categorias.php?acao=cadastra" class="btn btn-circle mr-3 d-flex justify-content-center align-items-center"><i class="bi bi-plus-lg"></i></a>
    </div>
  </div>

  <?php
  if (count($lista) == 0) {
    echo "<p>Nenhum registro</p>";
  } else {
  ?>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Tipo</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($lista as $item) {
        ?>
        <tr class="align-middle">
          <td><span style="color: <?= ($item->getTipo() == 'D' ? '#F24949' : '#0BD953') ?>" data-feather="<?= ($item->getTipo() == 'D' ? 'arrow-down' : 'arrow-up') ?>"></span></td>
          <td><?=$item->getNome()?></td>
          <td><?=$item->getTipo() == 'D' ? 'Despesa' : 'Receita' ?></td>
          <td>
            <a href="categorias.php?acao=altera&codigo=<?=$item->getCodigo()?>" class="btn btn-outline-success btn-sm justify-content-center align-items-center"><i class="bi bi-pencil-fill"></i></a>
            <a href="categorias.php?acao=exclui&codigo=<?=$item->getCodigo()?>" class="btn btn-outline-danger btn-sm justify-content-center align-items-center"><i class="bi bi-trash-fill"></i></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <?php } ?>

</main>
