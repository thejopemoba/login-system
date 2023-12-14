<?php

include_once('connection.php');

//verifição se existe a variável email e a variável senha
if (isset($_POST['usuario']) || isset($_POST['senha'])) {

    //verifição se os campos do login estão em branco
    if (strlen($_POST['usuario']) == 0) {
        echo "<script>
            alert('Preencha com seu e-mail.');
            </script>";

    } else if (strlen($_POST['senha']) == 0) {
        echo "<script>
            alert('Preencha com sua senha.');
            </script>";
    } else {

        // segurança contra injeção sql
        $usuario = $conn->real_escape_string($_POST['usuario']);
        $senha = $conn->real_escape_string($_POST['senha']);
        
        //verificação do usuario e senha com uma query sql
        $sql_codigo = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' LIMIT 1";
        $sql_query = $conn->query($sql_codigo) or die("Execução do código SQL falhou " . $conn->error);

        // número de linhas retornadas da query
        $resultado = $sql_query->num_rows;

        // verificação se existe uma linha ou mais
        if($resultado > 0) {
            
            $idUsuario = $sql_query->fetch_assoc();

            // início de sessão
            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['login'] = $idUsuario['id'];
            $_SESSION['nome'] = $idUsuario['nome'];

            //redirecionamento para a pagina restrita ao usuario
            header("Location: page-restrita.php");

        } else {
            echo "<script>
            alert('Falha no login. E-mail ou senha incorretos, tente novamente.');
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste - Visual E-Commerce</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<h3>Login</h3><br>
<form action="login.php" method="post">
    <div class="mb-3">
        <label>Usuário</label>
        <input type="text" name="usuario" class="form-control">
    </div>

    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Entrar</button>
</form>
</body>