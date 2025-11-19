<?php 

class ItensPedidosService{
    private $conn; //Conexao
    private $itensPedidos; //Modelo
    private $table = "itens_pedido"; //Tabela nome...

    public function __construct($conn, itensPedidos $itensPedidos){
        $this->conn = $conn;
        $this->itensPedidos = $itensPedidos;
    }


    public function registro(){
        $query = "
            INSERT INTO $this->table
            (cod_pedido,cod_produto,qtd_produto)
            VALUES
            (?,?,?)
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->itensPedidos->__get('cod_pedido'));
        $stmt->bindValue(2, $this->itensPedidos->__get('cod_produto'));
        $stmt->bindValue(3, $this->itensPedidos->__get('qtd_produto'));
       
        $stmt->execute();


        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $restemp;
    }


    public function remover(){
        $query = "
            DELETE FROM $this->table 
            WHERE
                cod_pedido = ?;";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->pedidos->__get('cod_pedido'));
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
                cod_pedido = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->pedidos->__get('cod_pedido'));
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