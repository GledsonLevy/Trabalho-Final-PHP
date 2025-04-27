<?php
session_start();
include("conexao.php");

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_cod'])) {
    header("Location: login.php");
    exit;
}

// Verificar se o ID da pergunta foi passado
if (!isset($_GET['cod'])) {
    echo "COD da pergunta não informado!";
    exit;
}

$cod = $_GET['cod'];

// Verificar se a pergunta existe e pertence ao usuário logado
$sql = "SELECT * FROM perguntas WHERE cod = :cod AND usuario_cod = :usuario_cod";
$consulta = $conexao->prepare($sql);
$consulta->bindValue(':cod', $cod);
$consulta->bindValue(':usuario_cod', $_SESSION['usuario_cod']);
$consulta->execute();
$pergunta = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$pergunta) {
    echo "Pergunta não encontrada ou não pertence a você.";
    exit;
}

// Preparar e executar a exclusão
$sql = "DELETE FROM perguntas WHERE cod = :cod AND usuario_cod = :usuario_cod";
$consulta = $conexao->prepare($sql);
$consulta->bindValue(':cod', $cod);
$consulta->bindValue(':usuario_cod', $_SESSION['usuario_cod']);
$consulta->execute();

if ($consulta->rowCount() > 0) {
    // Redirecionar de volta para a página de listagem de perguntas
    header("Location: listar_perguntas.php");
    exit;
} else {
    echo "Erro ao excluir a pergunta!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="assets/img/Logo (2).png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar perguntas</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> 
</head>
<body>
    
</body>
</html>
