<?php
require_once "Conexao.php";
require_once "Financa.php";

class FinancaDAO {
      
  private $conexao;

  public function __construct() {
    $this->conexao = Conexao::conecta();
  }

  public function listar(){
    try{
        $consulta = $this->conexao->prepare("
          SELECT 
            F.codigo,
            F.descricao,
            F.data,
            F.valor,
            F.codigo_categoria,
            CF.nome as nome_categoria,
            CF.tipo as tipo_categoria
          FROM financas F
          JOIN categorias CF ON CF.codigo=F.codigo_categoria 
          ORDER BY data desc
        ");

        $consulta->execute();
        $array = $consulta->fetchAll(PDO::FETCH_CLASS, "Financa");

        return $array;
    }
    catch(PDOException $e){
        echo "ERRO: ".$e->getMessage();
    }
}
}
