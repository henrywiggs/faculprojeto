<?php 

class PedidosService{
    private $conn; //Conexao
    private $pedidos; //Modelo
    private $table = "pedido"; //Tabela nome...

    public function __construct($conn, Pedidos $pedidos){
        $this->conn = $conn;
        $this->pedidos = $pedidos;
    }


    public function registro(){
        $query = "
            INSERT INTO $this->table
            (codigoCliente, data_pedido)
            VALUES
            (?,now())
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $this->pedidos->__get('codigoCliente'));
       
        $stmt->execute();

        $ultimoId = $this->conn->lastInsertId();
        $restemp = $stmt->fetchAll(PDO::FETCH_OBJ);
        $stmt = null;
        return $ultimoId;
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

     public function buscaValoresPedidos()
    { 
        $query = "
			SELECT 
    pe.cod_pedido,
    pe.data_pedido,
    c.nomeCliente,
    SUM(ip.qtd_produto * p.vlr_unitario) AS valor_pedido
FROM pedido pe
JOIN clientes c ON c.codigoCliente = pe.codigoCliente
JOIN itens_pedido ip ON ip.cod_pedido = pe.cod_pedido
JOIN produto p ON p.cod_produto = ip.cod_produto
WHERE pe.data_pedido >= DATE(NOW()) - INTERVAL 7 DAY
GROUP BY 
    pe.cod_pedido,
    pe.data_pedido,
    c.nomeCliente;;";

        $stmt = $this->conn->prepare($query);
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