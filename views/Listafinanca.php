<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <h2 class="title-page">Finanças</h2>

  <div class="fixed-bottom">
    <div class="adicionar-registro">
      <a href="financas.php?acao=cadastra" class="btn btn-circle mr-3 d-flex justify-content-center align-items-center"><i class="bi bi-plus-lg"></i></a>
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
          <th scope="col">Descrição</th>
          <th scope="col">Categoria</th>
          <th scope="col">Data</th>
          <th scope="col">Valor</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($lista as $item) {
        ?>
        <tr>
          <td><span style="color: <?= ($item->getTipoCategoria() == 'D' ? '#F24949' : '#0BD953') ?>" data-feather="<?= ($item->getTipoCategoria() == 'D' ? 'arrow-down' : 'arrow-up') ?>"></span></td>
          <td><?=$item->getDescricao()?></td>
          <td><?=$item->getNomeCategoria()?></td>
          <td><?=$item->getDataFormatada()?></td>
          <td>R$ <?=number_format($item->getValor(), 2, ',', '.')?></td>
          <td>R$ <?=$item->getCodigoCategoria()?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <?php } ?>

</main>
