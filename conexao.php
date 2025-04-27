<?php

$username = 'root';
$password = '';

try {
    // Conectando ao banco de dados usando PDO
    $conexao = new PDO("mysql:host=localhost;dbname=tfphp2", $username, $password);
    
    // Definindo o modo de erro do PDO para exceções
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Tratamento de erro na conexão
    echo ("Erro de conexão: ") . $e->getMessage();
}

