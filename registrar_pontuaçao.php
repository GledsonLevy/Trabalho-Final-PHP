<?php
session_start();
include("conexao.php");

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_cod'])) {
    echo json_encode(['message' => 'Usuário não está logado.']);
    exit;
}

// Recupera os dados enviados via POST
$data = json_decode(file_get_contents("php://input"), true);
$usuario_cod = $_SESSION['usuario_cod'];
$tema = $data['tema'];
$pontuacao = $data['pontuacao'];

// Determina a coluna que precisa ser atualizada com base no tema
$coluna = '';

switch ($tema) {
    case 'Matemática Financeira':
        $coluna = 'pontuacao_tema1';
        break;
    case 'Programação':
        $coluna = 'pontuacao_tema2';
        break;
    case 'Lógica':
        $coluna = 'pontuacao_tema3';
        break;
    default:
        echo json_encode(['message' => 'Você terminou seu Quiz!!']);
        exit;
        
}

// Verifica se o usuário já tem um registro para o tema específico
$consulta = $conexao->prepare("SELECT * FROM acertos WHERE usuario_cod = :usuario_cod");
$consulta->bindValue(':usuario_cod', $usuario_cod);
$consulta->execute();
$resultado = $consulta->fetch(PDO::FETCH_ASSOC);

if ($resultado) {
    // Atualiza a pontuação do tema correspondente
    $updateQuery = "UPDATE acertos SET $coluna = :pontuacao WHERE usuario_cod = :usuario_cod";
    $updateStmt = $conexao->prepare($updateQuery);
    $updateStmt->bindValue(':pontuacao', $pontuacao);
    $updateStmt->bindValue(':usuario_cod', $usuario_cod);
    $updateStmt->execute();

    echo json_encode(['message' => 'Pontuação atualizada com sucesso!']);
} else {
    // Caso o usuário não tenha registro, insere um novo
    $insertQuery = "INSERT INTO acertos (usuario_cod, $coluna) VALUES (:usuario_cod, :pontuacao)";
    $insertStmt = $conexao->prepare($insertQuery);
    $insertStmt->bindValue(':usuario_cod', $usuario_cod);
    $insertStmt->bindValue(':pontuacao', $pontuacao);
    $insertStmt->execute();

    echo json_encode(['message' => 'Pontuação registrada com sucesso!']);
}
?>
