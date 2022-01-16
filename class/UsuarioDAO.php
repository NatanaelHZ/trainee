<?php
require_once "Conexao.php";
require_once "Usuario.php";

class UsuarioDAO {
      
  private $conexao;

  public function __construct(){
    $this->conexao = Conexao::conecta();
  }

  public function login($email, $senha) {
    try {
      $query = $this->conexao->prepare("select * from usuarios where email=:email");
      $query->bindParam(":email", $email);
      $query->execute();

      $registro = $query->fetch(PDO::FETCH_ASSOC); //retornamos como array associativo
      
      if ($query->rowCount() == 1 && password_verify($senha, $registro['senha'])) 
        $registro['status'] = 'sucesso';
      else
        $registro['status'] = 'erro'; 
        
      return $registro;
    }
    catch(PDOException $e){
      echo "Erro ao fazer login: ". $e->getMessage();
    }
  }

  public function buscar($codigo) {
    try {
      $consulta = $this->conexao->prepare("
        SELECT 
          codigo,
          nome,
          email
        FROM usuarios WHERE codigo=:codigo
      ");
      $consulta->bindParam(":codigo", $codigo);
      $consulta->execute();

      $resultado = $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");
      
      if (count($resultado) == 1)
        return $resultado[0];
      else
        return false;    
    } catch(PDOException $e) {
      echo "ERRO: ".$e->getMessage();
    }
  }

  public function alterar(Usuario $usuario){
    try {
      $consulta = $this->conexao->prepare("
        update usuarios set 
          nome=:nome, 
          senha=:senha, 
          email=:email
        where codigo=:codigo
      ");
      
      $consulta->bindValue(":nome", $usuario->getNome());
      $consulta->bindValue(":senha", $usuario->getSenha());
      $consulta->bindValue(":email", $usuario->getEmail());
      $consulta->bindValue(":codigo", $usuario->getCodigo());

      return $consulta->execute();                 
    } catch(PDOException $e) {
      echo "ERRO: ".$e->getMessage();
    } 
  }

}
