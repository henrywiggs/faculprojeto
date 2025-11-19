<?php
class Fornecedores{

    private $cod_fornecedor;
    private $nom_fornecedor;
    private $num_cnpj;
    private $num_fax;
    private $num_telefonefixo;
    private $num_telefonecelular;
    private $nom_site;
    private $nom_logradouro;
    private $num_endereco;
    private $nom_complemento;
    private $nom_bairro;
    private $nom_cidade;
    private $uf_estado;
    private $num_cep; 
        
    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
            $this->$atributo = $valor;
            return $this;
    }

}