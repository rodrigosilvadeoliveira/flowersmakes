<?php

$dbHost = 'Localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'cadastro';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

if ($conexao->connect_error) {
  die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}


?>