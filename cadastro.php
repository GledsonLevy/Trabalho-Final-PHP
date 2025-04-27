<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebendo os dados do formulário
    $nome = $_POST['nome'];
    $senha = sha1($_POST['senha']);
    // Preparando a query de inserção com parâmetros
    $sql = ("INSERT INTO usuario (nome, senha) VALUES (:nome, :senha)");

    // Preparando a declaração SQL
    $stmt = $conexao->prepare($sql);

    // Atribuindo valores aos parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':senha', $senha);

    // Executando a query
    $stmt->execute();
    header("location: logar.php?msg=cadastradoComSucesso");
}

?>