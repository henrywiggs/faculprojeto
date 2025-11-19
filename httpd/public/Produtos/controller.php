<?php
include_once("../../Config/conexao.php");
include_once("../../Controller/Produtos-Controller.php");

$tarefa = new ProdutosController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST)){
        $tarefa->registro($_POST['nom_produto'],$_POST['cod_fornecedor'],$_POST['end_foto'],$_POST['cod_unidade'],$_POST['vlr_unitario'],$_POST['cod_categoria']);

        print "<div class=\"alert alert-success text-center \" role=\"alert\">Cadastro realizado com sucesso!!</div>";
    
    }else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Unidade não pode ser cadastrado!!</div>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    
    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    if (isset($dados_array['id'])) {
        $tarefa->remover($dados_array['id']);
        print "<div class=\"alert alert-success text-center \" role=\"alert\">Remoção realizada com sucesso!!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">produto não encontrado!!</div>";
    }

}


if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    
    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    if (isset($dados_array['cod_produto'])) {
        $tarefa->atualiza($dados_array['cod_produto'],$dados_array['nom_produto'],$dados_array['cod_fornecedor'],$dados_array['end_foto'],$dados_array['cod_unidade'],$dados_array['vlr_unitario'],$dados_array['cod_categoria']);
        print "<div class=\"alert alert-success text-center \" role=\"alert\">Alteração realizada com sucesso!!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">produto não encontrado!!</div>";
    }

}


?>