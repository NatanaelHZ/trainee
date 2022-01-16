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
    $this->data = $data;
  }

  public function getValor() {
    return $this->valor;
  }

  public function setValor($valor) {
    $this->valor = $valor;
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
    $this->nome_categoria = $nome_categoria;
  }

  public function getTipoCategoria() {
    return $this->tipo_categoria;
  }

  public function setTipoCategoria($tipo_categoria) {
    $this->tipo_categoria = $tipo_categoria;
  }

  public function getDataFormatada() {
    $data = date_create($this->getData());

    return date_format($data, 'd/m/Y');
  }

  public function validar() {
    return array();
  }
}
