<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste - Visual E-Commerce</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<script src="js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- aqui criei a nav bar, bem simples pelo parametros do bootstrap mesmo -->
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="?page=logar">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=novo">Cadastre-se</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

<div class="container">
        <div class="row">
            <div class="col mt-5">
                <?php
                    // switch para navegação pela barra nav do index
                    include_once("connection.php");
                    switch (@$_REQUEST["page"]) {
                        case "novo":
                            include("cadastro.php");
                            break;
                        case "logar";
                            include("login.php");
                            break; 
                        case "salvar";
                            include("salvar-cadastro.php");    
                        default;
                            print "<h3> Bem-vindo ao teste! </h3>";                
                    }
                ?>
            </div>
        </div>
    </div>