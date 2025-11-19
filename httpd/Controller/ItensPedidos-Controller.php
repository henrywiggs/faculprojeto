<?php
require_once "../../Model/ItensPedidos-Model.php";
require_once "../../Service/ItensPedidos-Service.php";


class ItensPedidosController{
    private $conn;
    private $itensPedidos;

    public function __construct() {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->itensPedidos = new ItensPedidos();
	}


    public function registro($cod_pedido,$cod_produto,$qtd_produto){
        
        $this->itensPedidos->__set('cod_pedido',$cod_pedido);
        $this->itensPedidos->__set('cod_produto',$cod_produto);
        $this->itensPedidos->__set('qtd_produto',$qtd_produto);
        
        $objS = new ItensPedidosService($this->conn, $this->itensPedidos);
        $objS->registro();
        return $cod_pedido;
    }


    public function remover($cod_pedido){
        $this->itensPedidos->__set('cod_pedido', $cod_pedido);
        $objS = new ItensPedidosService($this->conn, $this->itensPedidos);
        return $objS->remover();
    }

    public function buscaCodigo($cod_pedido){
        $this->itensPedidos->__set('cod_pedido', $cod_pedido);
        $objS = new ItensPedidosService($this->conn, $this->itensPedidos);
        $tarefa = $objS->buscaCodigo();
        return $tarefa['0'];
    }

    public function buscaTodos(){
        $objS = new ItensPedidosService($this->conn, $this->itensPedidos);
        return $objS->buscaTodos();
    }

}