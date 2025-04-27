<?php
session_start(); // Inicia a sessão
include("conexao.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        // Preparando a query para verificar o nome
        $sql = ("SELECT * FROM usuario WHERE nome = :nome");
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(':nome', $nome);
        $consulta->execute();

        // Verificando se o usuário existe
        if ($consulta->rowCount() > 0) {
            $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

            // Verificando a senha
            if ( sha1($senha) ==  $usuario['senha']) {
                // Login bem-sucedido, armazena os dados na sessão
                $_SESSION['usuario_cod'] = $usuario['cod'];
                $_SESSION['nome'] = $usuario['nome'];
                // Redirecionar para outra página se necessário
                header('Location: inicio.php');
                exit();
            } else {
                header('location:logar.php?msg=loginOuSenhaIncorretos');
            }
        } else {
            header('location:logar.php?msg=loginOuSenhaIncorretos');
        }
    }
