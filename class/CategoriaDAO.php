<?php
require_once "Conexao.php";
require_once "Categoria.php";

class CategoriaDAO {
      
  private $conexao;

  public function __construct() {
    $this->conexao = Conexao::conecta();
  }

  public function listar($tipo = 'D') {
    try {
        $consulta = $this->conexao->prepare("SELECT * FROM categorias WHERE tipo=:tipo");
        $consulta->bindParam(":tipo", $tipo);
        $consulta->execute();

        $dados = $consulta->fetchAll(PDO::FETCH_CLASS, "Categoria");

        return $dados;
    }
    catch (PDOException $e) {
        echo "ERRO: ".$e->getMessage();
    }
  }
}
