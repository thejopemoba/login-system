<?php

// início de sessão
if (!isset($_SESSION)) {
    session_start();
}

// verificação se o usuário tem um session aberta, caso não, não poderá entrar
if(!isset($_SESSION['login'])) {
    die("<script>
    alert('Só usuários autorizados podem acessar essa página.');
    </script>");
}

?>