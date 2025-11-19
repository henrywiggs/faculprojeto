<?php
class Pedidos{

    private $cod_pedido;
    private $codCliente;
    //private $lista_produtos;

        
    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
            $this->$atributo = $valor;
            return $this;
    }

}