<?php
require_once "../../Model/Fornecedores-Model.php";
require_once "../../Service/Fornecedores-Service.php";

class FornecedoresController{
    private $conn;
    private $fornecedores;

    public function __construct() {
        $this->conn = new Conexao();
        $this->conn = $this->conn->getinstance();
        $this->fornecedores = new Fornecedores();
    }

    public function registro($cod_fornecedor, $nom_fornecedor, $num_cnpj, $num_fax, $num_telefonefixo,
        $num_telefonecelular, $nom_site, $nom_logradouro, $num_endereco, $nom_complemento, $nom_bairro, $nom_cidade, $uf_estado, $num_cep){
        
        $this->fornecedores->__set('cod_fornecedor', $cod_fornecedor)
            ->__set('nom_fornecedor', $nom_fornecedor)
            ->__set('num_cnpj', $num_cnpj)
            ->__set('num_fax', $num_fax)
            ->__set('num_telefonefixo', $num_telefonefixo)
            ->__set('num_telefonecelular', $num_telefonecelular)
            ->__set('nom_site', $nom_site)
            ->__set('nom_logradouro', $nom_logradouro)
            ->__set('num_endereco', $num_endereco)
            ->__set('nom_complemento', $nom_complemento)
            ->__set('nom_bairro', $nom_bairro)
            ->__set('nom_cidade', $nom_cidade)
            ->__set('uf_estado', $uf_estado)
            ->__set('num_cep', $num_cep);
        
        $objS = new FornecedoresService($this->conn, $this->fornecedores);
        return $objS->registro();
    }

    public function atualiza($cod_fornecedor, $nom_fornecedor, $num_cnpj, $num_fax, $num_telefonefixo, $num_telefonecelular, $nom_site, 
    $nom_logradouro, $num_endereco, $nom_complemento, $nom_bairro, $nom_cidade, $uf_estado, $num_cep){
        
        $this->fornecedores->__set('cod_fornecedor', $cod_fornecedor)
            ->__set('nom_fornecedor', $nom_fornecedor)
            ->__set('num_cnpj', $num_cnpj)
            ->__set('num_fax', $num_fax)
            ->__set('num_telefonefixo', $num_telefonefixo)
            ->__set('num_telefonecelular', $num_telefonecelular)
            ->__set('nom_site', $nom_site)
            ->__set('nom_logradouro', $nom_logradouro)
            ->__set('num_endereco', $num_endereco)
            ->__set('nom_complemento', $nom_complemento)
            ->__set('nom_bairro', $nom_bairro)
            ->__set('nom_cidade', $nom_cidade)
            ->__set('uf_estado', $uf_estado) // Mantido o nome correto: $uf_estado
            ->__set('num_cep', $num_cep);
        
        $objS = new FornecedoresService($this->conn, $this->fornecedores);
        return $objS->atualiza();
    }

    public function buscaCodigo($cod_fornecedor){
        $this->fornecedores->__set('cod_fornecedor', $cod_fornecedor);
        $objS = new FornecedoresService($this->conn, $this->fornecedores);
        $tarefa = $objS->buscaCodigo();
        return $tarefa['0'];
    }

    public function buscaTodos(){
        $objS = new FornecedoresService($this->conn, $this->fornecedores);
        return $objS->buscaTodos();
    }

    public function remover($cod_fornecedor){
        $this->fornecedores->__set('cod_fornecedor', $cod_fornecedor);
        $objS = new FornecedoresService($this->conn, $this->fornecedores);
        return $objS->remover();
    }
}