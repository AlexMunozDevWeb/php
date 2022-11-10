<?php
  use Doctrine\ORM\EntityManager;
  use Doctrine\ORM\Mapping as ORM;

  class Productos{
    private $CodPro;
    private $Nombre;
    private $Descripcion;
    private $Peso;
    private $Stock;
    private $Categoria;

    public function getCodPro(){
      return $this->CodPro;
    }

    public function getNombre(){
      return $this->Nombre;
    }
    public function setNombre( $nombre ){
      $this->Nombre = $nombre;
    }

    public function getDescripcion(){
      return $this->Descripcion;
    }
    public function setDescripcion( $descripcion ){
      $this->Descripcion = $descripcion;
    }

    public function getPeso(){
      return $this->Peso;
    }
    public function setPeso( $peso ){
      $this->Peso = $peso;
    }

    public function getStock(){
      return $this->Stock;
    }
    public function setStock( $stock ){
      $this->Stock = $stock;
    }

    public function getCategoria(){
      return $this->Categoria;
    }
    public function setCategoria( $categoria ){
      $this->Categoria = $categoria;
    }

  }
?>