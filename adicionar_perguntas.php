<?php
// Iniciar a sessão para capturar o usuário logado
session_start();
include("conexao.php");

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_cod'])) {
    header("Location: login.php");
    exit; // Garantir que o código não continue após o redirecionamento
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coletando os dados do formulário
    $tema = "Especial";
    $pergunta = $_POST['pergunta'];
    $opcao_1 = $_POST['opcao_1'];
    $opcao_2 = $_POST['opcao_2'];
    $opcao_3 = $_POST['opcao_3'];
    $resposta_correta = $_POST['resposta_correta'];
    $dica = $_POST['dica'];

    // Pegando o ID do usuário logado
    $usuario_cod = $_SESSION['usuario_cod'];

    // Preparando o SQL para inserir a pergunta no banco de dados
    $sql = "INSERT INTO perguntas (tema, pergunta, resposta_correta, dica, opcao_1, opcao_2, opcao_3, usuario_cod) 
            VALUES (:tema, :pergunta, :resposta_correta, :dica, :opcao_1, :opcao_2, :opcao_3, :usuario_cod)";
    $consulta = $conexao->prepare($sql);

    // Bind dos parâmetros
    $consulta->bindValue(':tema', $tema);
    $consulta->bindValue(':pergunta', $pergunta);
    $consulta->bindValue(':resposta_correta', $resposta_correta);
    $consulta->bindValue(':dica', $dica);
    $consulta->bindValue(':opcao_1', $opcao_1);
    $consulta->bindValue(':opcao_2', $opcao_2);
    $consulta->bindValue(':opcao_3', $opcao_3);
    $consulta->bindValue(':usuario_cod', $usuario_cod);

    // Executando a inserção
    if ($consulta->execute()) {
        // Redireciona para o index.php após o sucesso
        header("Location: inicio.php");
        exit; // Garantir que o código não continue após o redirecionamento
    } else {
        echo "<script>alert('Erro ao adicionar a pergunta.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Pergunta</title>
    <link href="assets/img/Logo (2).png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <style>
        .fundo {
            background-image: url("assets/img/hero-bg.png");
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 100%;
            position: relative;
        }

        .card-fundo {
            background: rgba(255, 255, 255, 0.85);
            /* Fundo semi-transparente */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5); /* Sombra para destaque */
            width: 100%;
            max-width: 600px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border-radius: 1.4rem;
            /* Bordas arredondadas */
            padding: 2rem;
            /* Espaçamento interno */
        }

        .form-control {
            width: 100%;
            margin: auto;
            margin-bottom: 1rem;
            padding: 0.7rem;
            border-radius: 0.5rem;
            /* Bordas arredondadas nos campos */
            border: none;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            /* Leve sombra nos campos */
        }

        .form-control:focus {
            outline: none;
            border: 2px solid #1A6ABA;
            /* Destaque ao focar no campo */
            box-shadow: 0px 0px 10px rgba(0, 196, 204, 0.2);
        }

        .btn-outline-light {
            border-radius: 50px;
            padding: 0.6rem 1.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            border: 2px solid #1d74b7;
            color: #333;
        }

        .btn-outline-light:hover {
            background-color: #1d74b7;
            color: white;
        }

        h2 {
            font-weight: bold;
            letter-spacing: 0.1rem;
            color: #1d74b7;
        }

        label {
            font-size: 1rem;
            color: #333;
        }

        .container {
            max-height: 100vh;
            /* Garante que a altura da área de conteúdo não ultrapasse a tela */
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

    <script>
    </script>
</head>

<body>
    <form method="POST" action="adicionar_perguntas.php">
        <section class="vh-100 fundo">
            <div class="container h-40 p-4">
                <div class="back-to-index">
                    <!-- Botão para voltar ao index -->
                    <button type="button" onclick="window.location.href='inicio.php';">Voltar ao Início</button>
                </div>

                <div class="row d-flex justify-content-center align-items-center px-4 h-50">
                    <div class="col-12">
                        <div class="card p-1 card-fundo text-white">
                            <div class="card-body text-center">

                                <h2 class="fw-bold mt-2 mb-4 text-uppercase">ADICIONAR PERGUNTAS</h2>

                                <!-- Formulário para adicionar pergunta -->
                                <div data-mdb-input-init class="form-outline form-white mb-3">
                                    <label class="form-label" for="typeEmailX">Pergunta:</label>
                                    <input type="text" id="pergunta" name="pergunta" class="form-control" />
                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-3">
                                    <label class="form-label" for="typePasswordX">1ª opção:</label>
                                    <input type="text" id="opcao_1" name="opcao_1" class="form-control" />
                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-3">
                                    <label class="form-label" for="typePasswordX">2ª opção:</label>
                                    <input type="text" id="opcao_2" name="opcao_2" class="form-control" />
                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-3">
                                    <label class="form-label" for="typePasswordX">3ª opção:</label>
                                    <input type="text" id="opcao_3" name="opcao_3" class="form-control" />
                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-3">
                                    <label class="form-label" for="typePasswordX">Opção correta:</label>
                                    <input type="text" id="resposta_correta" name="resposta_correta"
                                        class="form-control" />
                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-3">
                                    <label class="form-label" for="typePasswordX">Dica:</label>
                                    <input type="text" id="dica" name="dica" class="form-control" />
                                </div>

                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light px-4"
                                    type="submit" value="Enviar">Enviar</button>

                                <!-- Botão para ir para a página de listar perguntas -->
                                <a href="listar_perguntas.php" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-outline-light px-4">Ver Perguntas</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</html>