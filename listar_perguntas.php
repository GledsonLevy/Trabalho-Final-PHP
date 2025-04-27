<?php
session_start();
include("conexao.php");

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_cod'])) {
    header("Location: login.php");
    exit;
}

// Buscar as perguntas do banco de dados
$sql = "SELECT * FROM perguntas WHERE usuario_cod = :usuario_cod";
$consulta = $conexao->prepare($sql);
$consulta->bindValue(':usuario_cod', $_SESSION['usuario_cod']);
$consulta->execute();
$perguntas = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<link href="assets/img/Logo (2).png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Perguntas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

</head>
<style>
    .fundo {
        background-color: rgba(255, 255, 255, 0.85);
        background-image: url("assets/img/hero-bg.png");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        margin: 0;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container {
        background: rgba(255, 255, 255, 0.85);;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); /* Sombra para destaque */
        color: #333;
    }

    .table {
        background: #f9f9f9;
        border-radius: 8px;
        overflow: hidden;
    }

    .table th {
        background-color: #1d74b7;
        color: #fff;
        text-align: center;
    }

    .table td, .table th {
        vertical-align: middle;
        text-align: center;
    }

    .btn-primary {
        background-color: #1d74b7;
        border-color: #0341ad;
    }

    .btn-primary:hover {
        background-color: #124265;
        border-color: #1d74b7;
    }

    .btn-warning {
        color: #fff;
        background-color: #f0ad4e;
        border-color: #eea236;
    }

    .btn-danger {
        color: #fff;
        background-color: #d9534f;
        border-color: #d43f3a;
    }
    .back-to-index {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            /* Garante que o botão fique sempre acima dos outros elementos */
        }

        .back-to-index button {
            padding: 10px 20px;
            font-size: 16px;
            background: #1d74b7;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .back-to-index button:hover {
            background: #0341ad;
        }
</style>
<body>
    <section class="fundo vh-100">
    <div class="back-to-index">
                    <!-- Botão para voltar ao index -->
                    <button type="button" onclick="window.location.href='inicio.php';">Voltar ao Início</button>
                </div>
        <div class="container">
            <h2 class="text-center mb-4">Minhas Perguntas</h2>
            
            <!-- Botão para voltar à página de adicionar perguntas -->
            <div class="text-end">
                <a href="adicionar_perguntas.php" class="btn btn-primary mb-3">Adicionar Nova Pergunta</a>
            </div>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Pergunta</th>
                        <th scope="col">Opções</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($perguntas as $pergunta): ?>
                    <tr>
                        <td><?= htmlspecialchars($pergunta['pergunta']) ?></td>
                        <td>
                            <ul class="list-unstyled mb-0">
                                <li><?= htmlspecialchars($pergunta['opcao_1']) ?></li>
                                <li><?= htmlspecialchars($pergunta['opcao_2']) ?></li>
                                <li><?= htmlspecialchars($pergunta['opcao_3']) ?></li>
                            </ul>
                        </td>
                        <td>
                            <a href="editar_perguntas.php?cod=<?= $pergunta['cod'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="apagar_perguntas.php?cod=<?= $pergunta['cod'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta pergunta?');">Excluir</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>

