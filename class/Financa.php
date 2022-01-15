<?php

class Financa {

  private $codigo;
  private $descricao;
  private $data;
  private $valor;
  private $codigo_categoria;
  private $nome_categoria;
  private $tipo_categoria;

  public function getCodigo() {
    return $this->codigo;
  }

  public function setCodigo($cod) {
    $this->codigo = $cod;
  }

  public function getDescricao() {
    return $this->descricao;
  }

  public function setDescricao($descricao) {
    $this->descricao = filter_var($descricao, FILTER_SANITIZE_STRING);
  }

  public function getData() {
    return $this->data;
  }

  public function setData($data) {
    $this->data = filter_var($data, FILTER_SANITIZE_STRING);
  }

  public function getValor() {
    return $this->valor;
  }

  public function setValor($valor) {
    $this->valor = password_hash(filter_var($valor, FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
  }

  
  public function getCodigoCategoria() {
    return $this->codigo_categoria;
  }

  public function setCodigoCategoria($cod) {
    $this->codigo_categoria = $cod;
  }

  public function getNomeCategoria() {
    return $this->nome_categoria;
  }

  public function setNomeCategoria($nome_categoria) {
    $this->nome_categoria = filter_var($nome_categoria, FILTER_SANITIZE_STRING);
  }

  public function getTipoCategoria() {
    return $this->tipo_categoria;
  }

  public function setTipoCategoria($tipo_categoria) {
    $this->tipo_categoria = filter_var($tipo_categoria, FILTER_SANITIZE_STRING);
  }

  public function getDataFormatada() {
    $data = date_create($this->getData());

    return date_format($data, 'd/m/Y');
  }
}
