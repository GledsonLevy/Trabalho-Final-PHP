<?php 

include("conexao.php");

$conquistasMat = array("Iniciante em Gestão Financeira",
                       "Especialista em Decisões Financeiras",
                       "Mestre das Finanças Estratégicas"
                      );

$conquistasProg = array("Codificador Promissor",
                       "Desenvolvedor de Alto Nível",
                       "Mestre dos Algoritmos"
                      );

$conquistasLog = array("Lógico em Ascensão",
                        "Desafiante da Mente Ágil",
                        "Mestre do Raciocínio Lógico"
                    );

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_cod'])) {
    header("Location: login.php");
    exit;
}


// Buscar as perguntas do banco de dados
$sql = "SELECT * FROM acertos WHERE usuario_cod = :usuario_cod";
$consulta = $conexao->prepare(  $sql);
$consulta->bindValue(':usuario_cod', $_SESSION['usuario_cod']);
$consulta->execute();
$conquistas = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$conquistas) {
    $conquistas = [
        "pontuacao_tema1" => 0,
        "pontuacao_tema2" => 0,
        "pontuacao_tema3" => 0,
    ];
}

?>