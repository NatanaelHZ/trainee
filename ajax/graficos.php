<?php

$conexao = new PDO("mysql:host=localhost; dbname=trainee", "trainee", "trainee");
$resultado = [];

$consulta = $conexao->prepare("
  select date_format(data, '%M %Y') as mes_ano, sum(valor) saldo, date_format(data, '%M') as mes
  from financas
  where date_format(data, '%Y')=date('Y')
  group by year(data), month(data)
  order by year(data), month(data);
");

$consulta->execute();

while ($dados = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $resultado[$dados['mes']] = $dados;
}
$dados = json_encode($resultado);
print_r($dados);

?>
