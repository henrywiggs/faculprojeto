<?php
include_once("../../Config/conexao.php");
include_once("../../Controller/Pedidos-Controller.php");
include_once("../../Controller/ItensPedidos-Controller.php");


$tarefa = new PedidosController();
$ip = new ItensPedidosController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST)){
        $ultimoId = $tarefa->registro($_POST['codigoCliente']);

        print "<div class=\"alert alert-success text-center \" role=\"alert\">Cadastro realizado com sucesso!!</div>";
    
    }else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">pedido não pode ser cadastrado!!</div>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $quantidades = $_POST['qtd_produto'];
    if (!empty($quantidades)) {
        foreach ($quantidades as $codProduto => $qtd) {
            if ($qtd > 0) {
                    $ip->registro(
                    $ultimoId, 
                    $codProduto,         
                    $qtd                  
                );
            }
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    
    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    if (isset($dados_array['id'])) {
        $tarefa->remover($dados_array['id']);
        print "<div class=\"alert alert-success text-center \" role=\"alert\">Remoção realizada com sucesso!!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">pedido não encontrado!!</div>";
    }

}



?>