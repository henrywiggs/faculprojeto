<?php
require_once "../../Model/Categorias-Model.php";
require_once "../../Service/Categoria-Service.php";


class CategoriasController{
    private $conn;
    private $categorias;

    public function __construct() {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->categorias = new categorias();
	}


    public function registro($nom_categoria){
        
        $this->categorias->__set('nom_categoria',$nom_categoria);
        
        $objS = new categoriasService($this->conn, $this->categorias);
        return $objS->registro();
    }

    public function atualiza($cod_categoria,$nom_categoria){
        

        $this->categorias->__set('cod_categoria', $cod_categoria)
            ->__set('nom_categoria', $nom_categoria);
            
        
        $objS = new categoriasService($this->conn, $this->categorias);
        return $objS->atualiza();
    }

    public function remover($cod_categoria){
        $this->categorias->__set('cod_categoria', $cod_categoria);
        $objS = new categoriasService($this->conn, $this->categorias);
        return $objS->remover();
    }

    public function buscaCodigo($cod_categoria){
        $this->categorias->__set('cod_categoria', $cod_categoria);
        $objS = new categoriasService($this->conn, $this->categorias);
        $tarefa = $objS->buscaCodigo();
        return $tarefa['0'];
    }

    public function buscaTodos(){
        $objS = new categoriasService($this->conn, $this->categorias);
        return $objS->buscaTodos();
    }

}