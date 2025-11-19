<?php
class Produtos{

    private $cod_produto;
    private $nom_produto;
    private $cod_fornecedor;
    private $end_foto;
    private $cod_unidade;
    private $vlr_unitario;
    private $cod_categoria;

        
    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
            $this->$atributo = $valor;
            return $this;
    }

}