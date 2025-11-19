<?php
class Categorias{

    private $cod_categoria;
    private $nom_categoria;

        
    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
            $this->$atributo = $valor;
            return $this;
    }

}