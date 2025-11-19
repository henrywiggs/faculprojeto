<?php
require_once "../../Model/Unidades-Model.php";
require_once "../../Service/Unidades-Service.php";


class UnidadesController{
    private $conn;
    private $unidades;

    public function __construct() {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->unidades = new Unidades();
	}


    public function registro($nom_unidade){
        
        $this->unidades->__set('nom_unidade',$nom_unidade);
        
        $objS = new UnidadesService($this->conn, $this->unidades);
        return $objS->registro();
    }

    public function atualiza($cod_unidade,$nom_unidade){
        

        $this->unidades->__set('cod_unidade', $cod_unidade)
            ->__set('nom_unidade', $nom_unidade);
            
        
        $objS = new UnidadesService($this->conn, $this->unidades);
        return $objS->atualiza();
    }

    public function remover($cod_unidade){
        $this->unidades->__set('cod_unidade', $cod_unidade);
        $objS = new UnidadesService($this->conn, $this->unidades);
        return $objS->remover();
    }

    public function buscaCodigo($cod_unidade){
        $this->unidades->__set('cod_unidade', $cod_unidade);
        $objS = new UnidadesService($this->conn, $this->unidades);
        $tarefa = $objS->buscaCodigo();
        return $tarefa['0'];
    }

    public function buscaTodos(){
        $objS = new UnidadesService($this->conn, $this->unidades);
        return $objS->buscaTodos();
    }

}