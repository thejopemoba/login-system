<?php
// definindo nome a elementos importantes pra conexão
    define('HOST', 'localhost');
    define('USER', 'root');
    define("PASS", '');
    define ("BASE", 'base-usuarios');

// conexão com o banco
$conn = new MySQLi(HOST,USER,PASS,BASE);
    
// teste de conexão com o banco
if($conn->error) {
    die("Falha ao conectar ao banco" . $conn->error);
}

?>