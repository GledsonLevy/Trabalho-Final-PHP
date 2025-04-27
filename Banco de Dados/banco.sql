-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/12/2024 às 18:55
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tfphp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acertos`
--

CREATE TABLE `acertos` (
  `usuario_cod` int(11) NOT NULL,
  `pontuacao_tema1` int(1) DEFAULT 0,
  `pontuacao_tema2` int(1) DEFAULT 0,
  `pontuacao_tema3` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `acertos`
--

INSERT INTO `acertos` (`usuario_cod`, `pontuacao_tema1`, `pontuacao_tema2`, `pontuacao_tema3`) VALUES
(1, 5, 5, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `cod` int(11) NOT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `pergunta` text DEFAULT NULL,
  `resposta_correta` text DEFAULT NULL,
  `dica` varchar(255) DEFAULT NULL,
  `opcao_1` text DEFAULT NULL,
  `opcao_2` text DEFAULT NULL,
  `opcao_3` text DEFAULT NULL,
  `usuario_cod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `perguntas`
--

INSERT INTO `perguntas` (`cod`, `tema`, `pergunta`, `resposta_correta`, `dica`, `opcao_1`, `opcao_2`, `opcao_3`, `usuario_cod`) VALUES
(1, 'Matemática Financeira', 'Se você emprestou R$ 100,00 e a taxa de juros é de 10% ao mês, quanto você vai pagar de juros após 1 mês?', 'R$ 220,00', 'Use a fórmula dos juros simples: J=P×i×t, onde J é o valor dos juros, P é o principal (valor emprestado), i é a taxa de juros e t é o tempo.', 'R$ 205,00', 'R$ 210,00', 'R$ 220,00', NULL),
(2, 'Matemática Financeira', 'Se você tem R$ 200,00 e a taxa de juros é de 5% ao mês, quanto você terá no total após um mês?', 'R$ 210,00', 'Use a fórmula M=P×(1+i), onde M é o montante final,P é o valor inicial e i é a taxa de juros.', 'R$ 205,00', 'R$ 210,00', 'R$ 220,00', NULL),
(3, 'Matemática Financeira', 'Se você emprestou R$ 100,00 a uma taxa de 10% ao mês, quanto você terá após 2 meses com juros compostos?', 'R$ 121,00', 'Para juros compostos, use a fórmula M=P×(1+i)×t, onde \r\n𝑀 é o montante final.\r\n\r\n', 'R$ 120,00', 'R$ 110,00', 'R$ 121,00', NULL),
(4, 'Matemática Financeira', 'Se um produto custa R$ 50,00 e você tem 20% de desconto, quanto você vai pagar?', 'R$ 40,00', 'O desconto é dado em percentual. Calcule o valor do desconto multiplicando o preço original pela porcentagem de desconto.\r\n', 'R$ 30,00', 'R$ 40,00', 'R$ 45,00', NULL),
(5, 'Matemática Financeira', 'Se você tem uma dívida de R$ 200,00 e precisa pagar em 4 parcelas iguais, quanto será cada parcela?', 'R$ 50,00', 'Para calcular parcelas iguais, basta dividir o valor total da dívida pelo número de parcelas.', 'R$ 50,00', 'R$ 60,00', 'R$ 40,00', NULL),
(6, 'Lógica', 'Se você tem 5 maçãs e dá 2 para um amigo, quantas maçãs você tem agora?', '3 maçãs', 'Você deve subtrair a quantidade dada de maçãs da quantidade inicial.\r\n', '3 maçãs', '4 maçãs', '2 maçãs', NULL),
(7, 'Lógica', 'Se você tem R$ 50,00 e compra um item que custa R$ 30,00, quanto dinheiro sobra?', 'R$ 20,00', 'A paciência consigo mesmo é o segredo do sucesso.\r\nReveja as opções para descobrir como ganhar mais tempo!', 'R$ 10,00', 'R$ 20,00', 'R$ 25,00', NULL),
(8, 'Lógica', 'Se você tem 10 minutos para chegar a um lugar e leva 5 minutos para chegar, você chega a tempo?', 'Sim, você chega a tempo.', 'Compare o tempo disponível com o tempo que você leva para chegar.\r\n', 'Não, você chega atrasado.', 'Não, você chega muito cedo.', 'Sim, você chega a tempo.', NULL),
(9, 'Lógica', 'Se você está com fome e tem um prato de comida na mesa, o que você deve fazer?', 'Comer o prato de comida.', 'A ação mais lógica é comer o prato de comida.\r\n', 'Ignorar o prato e esperar mais comida.', 'Comer o prato de comida.', 'Deixar o prato de comida e sair.', NULL),
(10, 'Lógica', 'Se está chovendo e você precisa sair, o que é mais lógico fazer?', 'Levar um guarda-chuva ou capa de chuva.', 'Para se proteger da chuva, seria prudente usar um guarda-chuva ou vestir-se adequadamente (como uma capa de chuva).\r\n', 'Não levar guarda-chuva e se molhar.', 'Levar um guarda-chuva ou capa de chuva.', 'Ficar em casa e não sair.', NULL),
(11, 'Programação', ' O que é uma variável em programação?', 'Um lugar onde você armazena dados que podem mudar.', 'Uma variável é um espaço na memória onde você armazena valores.', 'Um tipo de erro que acontece no código.', 'Um valor fixo que nunca pode ser alterado..', 'Um lugar onde você armazena dados que podem mudar.', NULL),
(12, 'Programação', ' O que faz a instrução \"if\" em programação?', 'Compara se dois valores são iguais e executa um código dependendo do resultado.', 'A instrução \"if\" é usada para tomar decisões, executando um bloco de código se uma condição for verdadeira. ', 'Compara se dois valores são iguais e executa um código dependendo do resultado.', 'Cria uma nova variável no programa.', 'Encerra o programa imediatamente.', NULL),
(13, 'Programação', ' O que faz um \"loop\" em programação?', 'Faz o programa repetir uma parte do código várias vezes.', 'Um loop permite executar um bloco de código repetidamente enquanto uma condição for verdadeira.\r\n', 'Altera o valor das variáveis de forma aleatória.', 'Faz o programa repetir uma parte do código várias vezes.', 'Encerra o programa após executar uma vez.', NULL),
(14, 'Programação', 'O que a instrução \"print\" faz em programação?', 'Mostra uma mensagem ou valor na tela.', 'A instrução \"print\" exibe uma mensagem ou valor na tela.\r\n', 'Cria uma nova variável de texto.', 'Mostra uma mensagem ou valor na tela.', 'Salva o código em um arquivo.', NULL),
(15, 'Programação', 'O que é um \"comentário\" em código?', 'Uma parte do código que o computador ignora, usada para explicar o que o código faz.', ' Comentários são trechos de texto dentro do código que não são executados pelo computador.', 'Uma linha de código que executa uma ação.', 'Uma parte do código que o computador ignora, usada para explicar o que o código faz.', 'Um tipo de erro que acontece no código.', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`cod`, `nome`, `senha`) VALUES
(1, 'gledson', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'gabriel', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(3, 'gustavo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(4, 'rrtrerr', '5b93e76d6ba4d8ff59a25afb279a871a5825d135');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `acertos`
--
ALTER TABLE `acertos`
  ADD PRIMARY KEY (`usuario_cod`);

--
-- Índices de tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_user_id` (`usuario_cod`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
