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
}
