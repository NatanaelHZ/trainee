<?php

class Categoria {

  private $codigo;
  private $nome;
  private $tipo;

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

  public function getTipo() {
    return $this->tipo;
  }

  public function setTipo($tipo) {
    $this->tipo = $tipo;
  }

}
