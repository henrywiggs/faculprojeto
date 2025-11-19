<?php
include_once("../../Config/conexao.php");
include_once("../../Controller/Unidades-Controller.php");

$tarefa = new UnidadesController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST)){
        $tarefa->registro($_POST['nom_unidade']);

        print "<div class=\"alert alert-success text-center \" role=\"alert\">Cadastro realizado com sucesso!!</div>";
    
    }else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">unidade não pode ser cadastrado!!</div>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    
    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    if (isset($dados_array['id'])) {
        $tarefa->remover($dados_array['id']);
        print "<div class=\"alert alert-success text-center \" role=\"alert\">Remoção realizada com sucesso!!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">unidade não encontrado!!</div>";
    }

}


if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    
    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    if (isset($dados_array['cod_unidade'])) {
        $tarefa->atualiza($dados_array['cod_unidade'],$dados_array['nom_unidade']);
        print "<div class=\"alert alert-success text-center \" role=\"alert\">Alteração realizada com sucesso!!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">unidade não encontrado!!</div>";
    }

}


?>