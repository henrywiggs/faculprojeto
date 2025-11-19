<?php 

class FornecedoresService{
    private $conn;
    private $fornecedores;
    private $table = "fornecedores";

    public function __construct($conn, Fornecedores $fornecedores){
        $this->conn = $conn;
        $this->fornecedores = $fornecedores;
    }


    public function registro(){
        $query = "
            INSERT INTO $this->table
            (cod_fornecedor, nom_fornecedor, num_cnpj, num_fax, num_telefonefixo, num_telefonecelular, nom_site, nom_logradouro, num_endereco, nom_complemento, nom_bairro, nom_cidade, uf_estado, num_cep) 
            VALUES
            (?,?,?,?,?,?,?,?,?,?,?,?,?,?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->fornecedores->__get('cod_fornecedor'));
        $stmt->bindValue(2, $this->fornecedores->__get('nom_fornecedor'));
        $stmt->bindValue(3, $this->fornecedores->__get('num_cnpj'));
        $stmt->bindValue(4, $this->fornecedores->__get('num_fax'));
        $stmt->bindValue(5, $this->fornecedores->__get('num_telefonefixo'));
        $stmt->bindValue(6, $this->fornecedores->__get('num_telefonecelular'));
        $stmt->bindValue(7, $this->fornecedores->__get('nom_site'));
        $stmt->bindValue(8, $this->fornecedores->__get('nom_logradouro'));
        $stmt->bindValue(9, $this->fornecedores->__get('num_endereco'));
        $stmt->bindValue(10, $this->fornecedores->__get('nom_complemento'));
        $stmt->bindValue(11, $this->fornecedores->__get('nom_bairro'));
        $stmt->bindValue(12, $this->fornecedores->__get('nom_cidade'));
        $stmt->bindValue(13, $this->fornecedores->__get('uf_estado'));
        $stmt->bindValue(14, $this->fornecedores->__get('num_cep'));
        $stmt->execute();
        
        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
        
    }

    public function atualiza(){
        $query = "
            UPDATE $this->table SET
                nom_fornecedor = ?, 
                num_cnpj = ?, 
                num_fax = ?, 
                num_telefonefixo = ?, 
                num_telefonecelular = ?, 
                nom_site = ?, 
                nom_logradouro = ?, 
                num_endereco = ?, 
                nom_complemento = ?, 
                nom_bairro = ?, 
                nom_cidade = ?, 
                uf_estado = ?, 
                num_cep = ?
            WHERE
                cod_fornecedor = ?;
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->fornecedores->__get('nom_fornecedor'));
        $stmt->bindValue(2, $this->fornecedores->__get('num_cnpj'));
        $stmt->bindValue(3, $this->fornecedores->__get('num_fax'));
        $stmt->bindValue(4, $this->fornecedores->__get('num_telefonefixo'));
        $stmt->bindValue(5, $this->fornecedores->__get('num_telefonecelular'));
        $stmt->bindValue(6, $this->fornecedores->__get('nom_site'));
        $stmt->bindValue(7, $this->fornecedores->__get('nom_logradouro'));
        $stmt->bindValue(8, $this->fornecedores->__get('num_endereco'));
        $stmt->bindValue(9, $this->fornecedores->__get('nom_complemento'));
        $stmt->bindValue(10, $this->fornecedores->__get('nom_bairro'));
        $stmt->bindValue(11, $this->fornecedores->__get('nom_cidade'));
        $stmt->bindValue(12, $this->fornecedores->__get('uf_estado'));
        $stmt->bindValue(13, $this->fornecedores->__get('num_cep'));
        $stmt->bindValue(14, $this->fornecedores->__get('cod_fornecedor'));
        
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function remover(){
        $query = "
            DELETE FROM $this->table 
            WHERE
                cod_fornecedor = ?;";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->fornecedores->__get('cod_fornecedor'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function buscaCodigo()
    { 
        $query = "
            SELECT
                *
            FROM
                $this->table
            WHERE
                cod_fornecedor= ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->fornecedores->__get('cod_fornecedor'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function buscaTodos()
    { 
        $query = "
            SELECT
                *
            FROM
                $this->table";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }
}