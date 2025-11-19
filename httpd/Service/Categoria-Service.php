<?php 

class CategoriasService{
    private $conn; //Conexao
    private $categorias; //Modelo
    private $table = "categoria"; //Tabela nome...

    public function __construct($conn, Categorias $categorias){
        $this->conn = $conn;
        $this->categorias = $categorias;
    }


    public function registro(){
        $query = "
            INSERT INTO $this->table
            (nom_categoria)
            VALUES
            (?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->categorias->__get('nom_categoria'));
       
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function atualiza(){
        $query = "
            UPDATE $this->table SET
                nom_categoria = ?
            WHERE
                cod_categoria = ?;
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->categorias->__get('nom_categoria'));
        $stmt->bindValue(2, $this->categorias->__get('cod_categoria'));
  
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function remover(){
        $query = "
            DELETE FROM $this->table 
            WHERE
                cod_categoria = ?;";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->categorias->__get('cod_categoria'));
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
                cod_categoria= ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->categorias->__get('cod_categoria'));
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