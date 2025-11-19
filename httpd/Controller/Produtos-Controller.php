<?php
require_once "../../Model/Produtos-Model.php";
require_once "../../Service/Produtos-Service.php";


class ProdutosController{
    private $conn;
    private $produtos;

    public function __construct() {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->produtos = new Produtos();
    }


    public function registro($nom_produto, $cod_fornecedor, $end_foto, $cod_unidade, $vlr_unitario, $cod_categoria){
        
        $this->produtos->__set('nom_produto', $nom_produto)
             ->__set('cod_fornecedor', $cod_fornecedor)
             ->__set('end_foto', $end_foto)
             ->__set('cod_unidade', $cod_unidade)
             ->__set('vlr_unitario', $vlr_unitario)
             ->__set('cod_categoria', $cod_categoria);
        
        $objS = new ProdutosService($this->conn, $this->produtos);
        return $objS->registro();
    }

    public function atualiza($cod_produto, $nom_produto, $cod_fornecedor, $end_foto, $cod_unidade, $vlr_unitario, $cod_categoria){
        

        $this->produtos->__set('cod_produto', $cod_produto)
             ->__set('nom_produto', $nom_produto)
             ->__set('cod_fornecedor', $cod_fornecedor)
             ->__set('end_foto', $end_foto)
             ->__set('cod_unidade', $cod_unidade)
             ->__set('vlr_unitario', $vlr_unitario)
             ->__set('cod_categoria', $cod_categoria);
            
        
        $objS = new ProdutosService($this->conn, $this->produtos);
        return $objS->atualiza();
    }

    public function remover($cod_produto){
        $this->produtos->__set('cod_produto', $cod_produto);
        $objS = new ProdutosService($this->conn, $this->produtos);
        return $objS->remover();
    }

    public function buscaCodigo($cod_produto){
        $this->produtos->__set('cod_produto', $cod_produto);
        $objS = new ProdutosService($this->conn, $this->produtos);
        $tarefa = $objS->buscaCodigo();
        return $tarefa['0'];
    }

    public function buscaTodos(){
        $objS = new ProdutosService($this->conn, $this->produtos);
        return $objS->buscaTodos();
    }

}