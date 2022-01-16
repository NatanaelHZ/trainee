<?php
require_once "Conexao.php";
require_once "Financa.php";

class FinancaDAO {
      
  private $conexao;

  public function __construct() {
    $this->conexao = Conexao::conecta();
  }

  public function listar() {
    try {
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
        $dados = $consulta->fetchAll(PDO::FETCH_CLASS, "Financa");

        return $dados;
    } catch(PDOException $e){
      echo "ERRO: ".$e->getMessage();
    }
  }

  public function buscar($codigo) {
    try {
      $consulta = $this->conexao->prepare("SELECT * FROM financas WHERE codigo=:codigo");
      $consulta->bindParam(":codigo", $codigo);
      $consulta->execute();

      $resultado = $consulta->fetchAll(PDO::FETCH_CLASS, "Financa");
      
      if (count($resultado) == 1)
        return $resultado[0];
      else
        return false;    
    } catch(PDOException $e) {
      echo "ERRO: ".$e->getMessage();
    }
  }

  public function inserir(Financa $financa){
    try {
      $consulta = $this->conexao->prepare("
        insert into financas values (
          NULL, 
          :descricao, 
          :data, 
          :valor, 
          :codigo_categoria,
          NULL)"
      );

      $consulta->bindValue(":codigo_categoria", $financa->getCodigoCategoria());
      $consulta->bindValue(":data", $financa->getData());
      $consulta->bindValue(":valor", $financa->getValor());
      $consulta->bindValue(":descricao", $financa->getDescricao());

      return $consulta->execute();                 
    } catch(PDOException $e) {
      echo "ERRO: ".$e->getMessage();
    }                
  }

  public function alterar(Financa $financa){
    try {
      $consulta = $this->conexao->prepare("
        update financas set 
          codigo_categoria=:codigo_categoria, 
          data=:data, 
          valor=:valor,
          descricao=:descricao 
        where codigo=:codigo
        ");
      
      $consulta->bindValue(":codigo_categoria", $financa->getCodigoCategoria());
      $consulta->bindValue(":data", $financa->getData());
      $consulta->bindValue(":valor", $financa->getValor());
      $consulta->bindValue(":descricao", $financa->getDescricao());
      $consulta->bindValue(":codigo", $financa->getCodigo());

      return $consulta->execute();                 
    } catch(PDOException $e) {
      echo "ERRO: ".$e->getMessage();
    } 
  }

  public function excluir($cod) {
    try {
      $consulta = $this->conexao->prepare("delete from financas where codigo=:cod");
      $consulta->bindParam(":cod", $cod);

      return $consulta->execute();
    } catch (PDOException $e) {
      return "Erro ao deletar finança: " . $e->getMessage();
    }               
  }

}
