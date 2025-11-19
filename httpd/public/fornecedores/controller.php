<?php
include_once("../../Config/conexao.php");
include_once("../../Controller/Fornecedores-Controller.php");

$tarefa = new FornecedoresController();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST)){
        $tarefa->registro(null,$_POST['nom_fornecedor'], $_POST['num_cnpj'],$_POST['num_fax'], $_POST['num_telefonefixo'], $_POST['num_telefonecelular'],
         $_POST['nom_site'], $_POST['nom_logradouro'], $_POST['num_endereco'],$_POST['nom_complemento'] ,$_POST['nom_bairro'], $_POST['nom_cidade'],
          $_POST['uf_estado'], $_POST['num_cep']);

        print "<div class=\"alert alert-success text-center \" role=\"alert\">Cadastro realizado com sucesso!!</div>";
    
    }else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Fornecedor não pode ser cadastrado!!</div>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    
    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    if (isset($dados_array['id'])) {
        $tarefa->remover($dados_array['id']);
        print "<div class=\"alert alert-success text-center \" role=\"alert\">Remoção realizada com sucesso!!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Fornecedor não encontrado!!</div>";
    }

}


if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    
    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    if (isset($dados_array['cod_fornecedor'])) {
        $tarefa->atualiza($dados_array['cod_fornecedor'],$dados_array['nom_fornecedor'], $dados_array['num_cnpj'],$dados_array['num_fax'], $dados_array['num_telefonefixo'], $dados_array['num_telefonecelular'],
         $dados_array['nom_site'], $dados_array['nom_logradouro'], $dados_array['num_endereco'],$dados_array['nom_complemento'] ,$dados_array['nom_bairro'], $dados_array['nom_cidade'],
          $dados_array['uf_estado'], $dados_array['num_cep']);
        print "<div class=\"alert alert-success text-center \" role=\"alert\">Ateração realizada com sucesso!!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Fornecedor não encontrado!!</div>";
    }

}


?>