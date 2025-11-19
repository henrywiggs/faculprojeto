<?php 

class UnidadesService{
    private $conn; //Conexao
    private $unidades; //Modelo
    private $table = "unidade"; //Tabela nome...

    public function __construct($conn, Unidades $unidades){
        $this->conn = $conn;
        $this->unidades = $unidades;
    }


    public function registro(){
        $query = "
            INSERT INTO $this->table
            (nom_unidade)
            VALUES
            (?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->unidades->__get('nom_unidade'));
       
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function atualiza(){
        $query = "
            UPDATE $this->table SET
                nom_unidade = ?
            WHERE
                cod_unidade = ?;
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->unidades->__get('nom_unidade'));
        $stmt->bindValue(2, $this->unidades->__get('cod_unidade'));
  
        $stmt->execute();

        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }

    public function remover(){
        $query = "
            DELETE FROM $this->table 
            WHERE
                cod_unidade = ?;";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->unidades->__get('cod_unidade'));
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
                cod_unidade= ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->unidades->__get('cod_unidade'));
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