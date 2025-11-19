<?php 

class ProdutosService{
    private $conn;
    private $produtos;
    private $table = "produto";

    public function __construct($conn, Produtos $produtos){
        $this->conn = $conn;
        $this->produtos = $produtos;
    }

    public function registro(){
        $query = "
            INSERT INTO $this->table
            (nom_produto, cod_fornecedor, end_foto, cod_unidade, vlr_unitario, cod_categoria)
            VALUES
            (?, ?, ?, ?, ?, ?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->produtos->__get('nom_produto'));
        $stmt->bindValue(2, $this->produtos->__get('cod_fornecedor'));
        $stmt->bindValue(3, $this->produtos->__get('end_foto'));
        $stmt->bindValue(4, $this->produtos->__get('cod_unidade'));
        $stmt->bindValue(5, $this->produtos->__get('vlr_unitario'));
        $stmt->bindValue(6, $this->produtos->__get('cod_categoria'));
       
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function atualiza(){
        $query = "
            UPDATE $this->table SET
                nom_produto = ?, 
                cod_fornecedor = ?, 
                end_foto = ?, 
                cod_unidade = ?, 
                vlr_unitario = ?, 
                cod_categoria = ?
            WHERE
                cod_produto = ?;
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->produtos->__get('nom_produto'));
        $stmt->bindValue(2, $this->produtos->__get('cod_fornecedor'));
        $stmt->bindValue(3, $this->produtos->__get('end_foto'));
        $stmt->bindValue(4, $this->produtos->__get('cod_unidade'));
        $stmt->bindValue(5, $this->produtos->__get('vlr_unitario'));
        $stmt->bindValue(6, $this->produtos->__get('cod_categoria'));
        $stmt->bindValue(7, $this->produtos->__get('cod_produto'));
    
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function remover(){
        $query = "
            DELETE FROM $this->table 
            WHERE
                cod_produto = ?;";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->produtos->__get('cod_produto'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function buscaCodigo(){ 
        $query = "
            SELECT 
    p.*,
    f.nom_fornecedor,
    u.nom_unidade,
    c.nom_categoria
        FROM produto p
        LEFT JOIN fornecedores f ON f.cod_fornecedor = p.cod_fornecedor
        LEFT JOIN unidade u ON u.cod_unidade = p.cod_unidade
            LEFT JOIN categoria c ON c.cod_categoria = p.cod_categoria
        WHERE p.cod_produto = ?;";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->produtos->__get('cod_produto'));
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function buscaTodos(){ 
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