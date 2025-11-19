<?php
class Unidades{

    private $cod_unidade;
    private $nom_unidade;

        
    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
            $this->$atributo = $valor;
            return $this;
    }

}