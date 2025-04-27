<?php
include("cadastro.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link href="assets/img/Logo (2).png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <title>Cadastro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<style>
    body {
        background-image: url("assets/img/hero-bg.png");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
    }

    .card {
        background: rgba(255, 255, 255, 0.85);
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5); /* Sombra para destaque */
        width: 100%;
        max-width: 400px;
        /* Tamanho fixo para o card */
        height: auto;
    }

    .btn-outline-dark {
        background-color: #1d74b7;
        color: white;
        border-color: #124265;
    }

    .btn-outline-dark:hover {
        background-color: #124265;
        border-color: #1d74b7;
    }

    a.text-black-50 {
        color: #1d74b7 !important;
    }

    a.text-black-50:hover {
        text-decoration: underline;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }
</style>

<body>
    <form action="cadastro.php" method="post">
        <div class="card">
            <div class="card-body text-center">
                <h2 class="fw-bold mb-4 text-uppercase">Cadastro</h2>
                <?php require_once("msgs.php") ?>

                <div class="mb-3">
                    <label class="form-label" for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome"
                        required>
                </div>

                <div class="mb-4">
                    <label class="form-label" for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha"
                        required>
                </div>

                <button class="btn btn-outline-dark btn-lg w-100 mb-3" type="submit" name="cadastro">Criar
                    Conta</button>

                <p class="mb-0">Já possui uma conta? <a href="logar.php" class="text-black-50 fw-bold">Faça login
                        aqui</a></p>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $(".alert").fadeOut();
            }, 3000);
        });
    </script>
</body>

</html>