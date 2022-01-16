<?php
require_once "Conexao.php";
require_once "Categoria.php";

class CategoriaDAO {
      
  private $conexao;

  public function __construct() {
    $this->conexao = Conexao::conecta();
  }

  public function listar() {
    try {
        $consulta = $this->conexao->prepare("SELECT * FROM categorias");
        $consulta->execute();

        $dados = $consulta->fetchAll(PDO::FETCH_CLASS, "Categoria");

        return $dados;
    }
    catch (PDOException $e) {
        echo "ERRO: ".$e->getMessage();
    }
  }

  public function listarEspecifico($tipo = 'D') {
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

  public function buscar($codigo) {
    try {
      $consulta = $this->conexao->prepare("SELECT * FROM categorias WHERE codigo=:codigo");
      $consulta->bindParam(":codigo", $codigo);
      $consulta->execute();

      $resultado = $consulta->fetchAll(PDO::FETCH_CLASS, "Categoria");
      
      if (count($resultado) == 1)
        return $resultado[0];
      else
        return false;    
    } catch(PDOException $e) {
      echo "ERRO: ".$e->getMessage();
    }
  }

  public function inserir(Categoria $categoria){
    try {
      $consulta = $this->conexao->prepare("
        insert into categorias values (
          NULL, 
          :nome, 
          :tipo)
      ");

      $consulta->bindValue(":nome", $categoria->getNome());
      $consulta->bindValue(":tipo", $categoria->getTipo());

      return $consulta->execute();                 
    } catch(PDOException $e) {
      echo "ERRO: ".$e->getMessage();
    }                
  }

  public function alterar(Categoria $categoria){
    try {
      $consulta = $this->conexao->prepare("
        update categorias set 
          nome=:nome, 
          tipo=:tipo
        where codigo=:codigo
        ");
      
      $consulta->bindValue(":nome", $categoria->getNome());
      $consulta->bindValue(":tipo", $categoria->getTipo());
      $consulta->bindValue(":codigo", $categoria->getCodigo());

      return $consulta->execute();                 
    } catch(PDOException $e) {
      echo "ERRO: ".$e->getMessage();
    } 
  }

  public function excluir($cod) {
    try {
      $consulta = $this->conexao->prepare("delete from categorias where codigo=:cod");
      $consulta->bindParam(":cod", $cod);

      return $consulta->execute();
    } catch (PDOException $e) {
      return "Erro ao deletar finança: " . $e->getMessage();
    }               
  }
}
