<?php
require_once "../../Model/Pedidos-Model.php";
require_once "../../Service/Pedidos-Service.php";


class PedidosController{
    private $conn;
    private $pedidos;

    public function __construct() {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->pedidos = new Pedidos();
	}


    public function registro($codigoCliente){
        
        $this->pedidos->__set('codigoCliente',$codigoCliente);
        
        $objS = new PedidosService($this->conn, $this->pedidos);
        $ultimoId = $objS->registro();
        return $ultimoId;
    }


    public function remover($cod_pedido){
        $this->pedidos->__set('cod_pedido', $cod_pedido);
        $objS = new PedidosService($this->conn, $this->pedidos);
        return $objS->remover();
    }

    public function buscaValoresPedidos(){
        $objS = new PedidosService($this->conn, $this->pedidos);
        $tarefa = $objS->buscaValoresPedidos();
        return $tarefa;
    }

    public function buscaCodigo($cod_pedido){
        $this->pedidos->__set('cod_pedido', $cod_pedido);
        $objS = new PedidoService($this->conn, $this->pedidos);
        $tarefa = $objS->buscaCodigo();
        return $tarefa['0'];
    }

    public function buscaTodos(){
        $objS = new PedidosService($this->conn, $this->pedidos);
        return $objS->buscaTodos();
    }

}