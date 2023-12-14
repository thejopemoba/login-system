<?php

include_once("connection.php");

// inserção dos dados fornecidos no cadastro lá na bd.
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nome = $_POST["nome"];
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $dataNascimento = $_POST["data-nascimento"];
        $cep = $_POST["cep"];
        $rua = $_POST["rua"];
        $bairro = $_POST["bairro"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["uf"];

        $sql = "INSERT INTO usuarios (
            nome, 
            usuario, 
            senha, 
            data_de_nascimento, 
            cep, 
            rua, 
            bairro, 
            cidade, 
            estado, 
            data_de_cadastro) VALUES (

            '{$nome}',
            '{$usuario}', 
            '{$senha}', 
            '{$dataNascimento}', 
            '{$cep}', 
            '{$rua}',
            '{$bairro}', 
            '{$cidade}', 
            '{$estado}', 
            NOW())";

        $resultado = $conn->query($sql);
        break;
}

?>