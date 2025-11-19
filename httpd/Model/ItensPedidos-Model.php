<?php
class ItensPedidos{

    private $cod_pedido;
    private $cod_produto;
    private $qtd_produto;

        
    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
            $this->$atributo = $valor;
            return $this;
    }

}