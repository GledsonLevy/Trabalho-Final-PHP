<?php
session_start();
include("conexao.php");

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_cod'])) {
    header("Location: login.php");
    exit;
}

// Verificar se a pergunta foi passada via GET
if (!isset($_GET['cod'])) {
    header("Location: listar_perguntas.php");
    exit;
}

$cod = $_GET['cod'];

// Buscar a pergunta no banco de dados
$sql = "SELECT * FROM perguntas WHERE cod = :cod AND usuario_cod = :usuario_cod";
$consulta = $conexao->prepare($sql);
$consulta->bindValue(':cod', $cod);
$consulta->bindValue(':usuario_cod', $_SESSION['usuario_cod']);
$consulta->execute();
$pergunta = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$pergunta) {
    echo "Pergunta não encontrada.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coletando os dados do formulário
    $tema = "Especial";
    $pergunta_text = $_POST['pergunta'];
    $opcao_1 = $_POST['opcao_1'];
    $opcao_2 = $_POST['opcao_2'];
    $opcao_3 = $_POST['opcao_3'];
    $resposta_correta = $_POST['resposta_correta'];
    $dica = $_POST['dica'];

    // Preparando o SQL para atualizar a pergunta
    $sql = "UPDATE perguntas 
            SET pergunta = :pergunta, opcao_1 = :opcao_1, opcao_2 = :opcao_2, opcao_3 = :opcao_3, 
                resposta_correta = :resposta_correta, dica = :dica 
            WHERE cod = :cod AND usuario_cod = :usuario_cod";
    $consulta = $conexao->prepare($sql);

    // Bind dos parâmetros
    $consulta->bindValue(':pergunta', $pergunta_text);
    $consulta->bindValue(':opcao_1', $opcao_1);
    $consulta->bindValue(':opcao_2', $opcao_2);
    $consulta->bindValue(':opcao_3', $opcao_3);
    $consulta->bindValue(':resposta_correta', $resposta_correta);
    $consulta->bindValue(':dica', $dica);
    $consulta->bindValue(':cod', $cod);
    $consulta->bindValue(':usuario_cod', $_SESSION['usuario_cod']);

    // Executando a atualização
    if ($consulta->execute()) {
        header("Location: listar_perguntas.php");
        exit;
    } else {
        echo "<script>alert('Erro ao atualizar a pergunta.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
<link href="assets/img/Logo (2).png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pergunta</title>
    <link rel="stylesheet" href="assets/css/perguntas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-4">
        <div class="app">
        <h2>Editar Pergunta</h2>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="pergunta" class="form-label">Pergunta:</label>
                <input type="text" class="form-control" id="pergunta" name="pergunta" value="<?= htmlspecialchars($pergunta['pergunta']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="opcao_1" class="form-label">1ª opção:</label>
                <input type="text" class="form-control" id="opcao_1" name="opcao_1" value="<?= htmlspecialchars($pergunta['opcao_1']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="opcao_2" class="form-label">2ª opção:</label>
                <input type="text" class="form-control" id="opcao_2" name="opcao_2" value="<?= htmlspecialchars($pergunta['opcao_2']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="opcao_3" class="form-label">3ª opção:</label>
                <input type="text" class="form-control" id="opcao_3" name="opcao_3" value="<?= htmlspecialchars($pergunta['opcao_3']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="resposta_correta" class="form-label">Opção correta:</label>
                <input type="text" class="form-control" id="resposta_correta" name="resposta_correta" value="<?= htmlspecialchars($pergunta['resposta_correta']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="dica" class="form-label">Dica:</label>
                <input type="text" class="form-control" id="dica" name="dica" value="<?= htmlspecialchars($pergunta['dica']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Pergunta</button>
        </form>
        </div>
    </div>
</body>
</html>
