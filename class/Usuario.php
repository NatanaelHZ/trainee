<?php

class Usuario {

  private $codigo;
  private $nome;
  private $email;
  private $senha;

  public function getCodigo() {
    return $this->codigo;
  }

  public function setCodigo($cod) {
    $this->codigo = $cod;
  }

  public function getNome() {
    return $this->nome;
  }

  public function setNome($nome) {
    $this->nome = filter_var($nome, FILTER_SANITIZE_STRING);
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = filter_var($email, FILTER_SANITIZE_STRING);
  }

  public function getSenha() {
    return $this->senha;
  }

  public function setSenha($senha) {
    $this->senha = password_hash(filter_var($senha, FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
  }
}
