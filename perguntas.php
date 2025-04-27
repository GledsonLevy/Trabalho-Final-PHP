<?php
session_start();
include("conexao.php");

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_cod'])) {
    header("Location: login.php");
    exit; // Garante que o script não continue após o redirecionamento
}

// Recupera o tema da URL
$tema = $_GET['msg'];

// Recupera o código do usuário logado
$usuario_cod = $_SESSION['usuario_cod'];

// Modificando a consulta SQL para pegar perguntas padrão e do usuário logado
// 1. Perguntas padrão (não associadas a nenhum usuário) => usuario_cod IS NULL
// 2. Perguntas do usuário logado => usuario_cod = :usuario_cod
$consulta = $conexao->prepare(
    "SELECT * FROM perguntas 
     WHERE tema = :tema AND (usuario_cod IS NULL OR usuario_cod = :usuario_cod)"
);
$consulta->bindValue(':tema', $tema);
$consulta->bindValue(':usuario_cod', $usuario_cod);
$consulta->execute();
$perguntas = $consulta->fetchAll(PDO::FETCH_ASSOC);

$perguntasArray = [];
$respostasCorretas = [];
$dicas = []; // Adiciona um array para armazenar as dicas

// Armazenando as perguntas, respostas corretas e dicas
foreach ($perguntas as $pergunta) {
    $perguntasArray[$pergunta['pergunta']] = [
        $pergunta['opcao_1'],
        $pergunta['opcao_2'],
        $pergunta['opcao_3']
    ];
    $respostasCorretas[] = $pergunta['resposta_correta'];
    $dicas[$pergunta['pergunta']] = $pergunta['dica']; // Armazenando a dica
}

// Armazenando as variáveis na sessão
$_SESSION['perguntas'] = $perguntasArray;
$_SESSION['respostasCorretas'] = $respostasCorretas;
$_SESSION['pontuacao'] = 0;
$_SESSION['dicas'] = $dicas; // Armazenando as dicas na sessão
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link href="assets/img/Logo (2).png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz - <?php echo $tema; ?></title>
    <link rel="stylesheet" href="../site/assets/css/perguntas.css">

    <script>
        var perguntas = <?php echo json_encode($_SESSION['perguntas']); ?>;
var respostasCorretas = <?php echo json_encode($_SESSION['respostasCorretas']); ?>;
var dicas = <?php echo json_encode($_SESSION['dicas']); ?>;
var questionIndex = 0;
var pontuacao = 0;
var answeredCorrectly = []; // Array para controlar as respostas corretas
var respostasUsuario = []; // Array para armazenar as respostas dos usuários

function loadQuestion() {
    var question = Object.keys(perguntas)[questionIndex];
    var options = perguntas[question];

    document.getElementById("question").innerText = question;
    var respostaDiv = document.getElementById("resposta");
    respostaDiv.innerHTML = "";

    options.forEach((option, index) => {
        var btn = document.createElement("button");
        btn.className = "btn";
        btn.innerText = option;

        // Se a pergunta já foi respondida corretamente, desabilita os botões
        if (answeredCorrectly[questionIndex]) {
            btn.disabled = true; // Desabilita os botões se a pergunta foi respondida corretamente
            // Marca a resposta correta
            if (respostasUsuario[questionIndex] === option) {
                btn.style.backgroundColor = "#B2F9B3"; // Resposta do usuário
            } else if (option === respostasCorretas[questionIndex]) {
                btn.style.backgroundColor = "#B2F9B3"; // Resposta correta
            }
        } else {
            btn.onclick = function() {
                selectAnswer(option, btn);
            };
        }

        respostaDiv.appendChild(btn);
    });

    document.getElementById("next-btn").style.display = 'block';
    document.getElementById("next-btn").disabled = false;
    document.getElementById("message").style.display = 'none';

    if (questionIndex === Object.keys(perguntas).length - 1) {
        document.getElementById("next-btn").innerText = "Finalizar";
    } else {
        document.getElementById("next-btn").innerText = "Próxima";
    }

    if (questionIndex > 0) {
        document.getElementById("prev-btn").style.display = 'block';
    } else {
        document.getElementById("prev-btn").style.display = 'none';
    }
}

function selectAnswer(selectedAnswer, btn) {
    var correctAnswer = respostasCorretas[questionIndex];
    if (selectedAnswer === correctAnswer) {
        btn.style.backgroundColor = "#B2F9B3";
        pontuacao++;
        answeredCorrectly[questionIndex] = true; // Marca que a pergunta foi respondida corretamente
        respostasUsuario[questionIndex] = selectedAnswer; // Armazena a resposta correta
        document.getElementById("message").style.display = 'none';
    } else {
        btn.style.backgroundColor = "#FAF08E";
        document.getElementById("message").innerText = dicas[Object.keys(perguntas)[questionIndex]];
        document.getElementById("message").style.display = 'block';
    }

    // Permite que o usuário tente novamente se errou
    if (selectedAnswer !== correctAnswer) {
        var buttons = document.querySelectorAll('.btn');
        buttons.forEach(function(button) {
            button.disabled = false; // Habilita os botões para tentar novamente
        });
    } else {
        // Desabilita todos os botões após a pessoa responder corretamente
        var buttons = document.querySelectorAll('.btn');
        buttons.forEach(function(button) {
            button.disabled = true;
        });
    }
}

function nextQuestion() {
    if (questionIndex < Object.keys(perguntas).length - 1) {
        questionIndex++;
        loadQuestion();
    } else {
        // Última pergunta: Envia a pontuação ao servidor
        fetch('registrar_pontuaçao.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    tema: '<?php echo $tema; ?>',
                    pontuacao: pontuacao
                })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message); // Mensagem do servidor
                window.location.href = "inicio.php"; // Redireciona após finalizar
            })
            .catch(error => {
                alert("Erro ao registrar pontuação.");
            });
    }
}

function prevQuestion() {
    if (questionIndex > 0) {
        questionIndex--;
        loadQuestion();
    }
}

function goBackToIndex() {
    window.location.href = 'inicio.php';
}

window.onload = function() {
    loadQuestion();
};

    </script>
</head>

<body>
    <div class="back-to-index">
        <button onclick="goBackToIndex()">Voltar ao Início</button>
    </div>

    <div class="app">
        <h1>Quiz</h1>
        <div class="quiz">
            <h2 id="question">Pergunta carregando...</h2>
            <div id="resposta"></div>
            <div id="message"
                style="color: #333; background: rgba (255, 255, 255, 0.85); padding: 10px; border-radius: 5px; margin-top: 10px; display: none;">
            </div>
            <div class="quiz-navigation">
                <button id="prev-btn" onclick="prevQuestion()">Voltar</button>
                <button id="next-btn" onclick="nextQuestion()">Próxima</button>
            </div>
        </div>
    </div>
</body>

</html>