-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 16/12/2024 às 20:17
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `daventi_final`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `favorito`
--

DROP TABLE IF EXISTS `favorito`;
CREATE TABLE IF NOT EXISTS `favorito` (
  `id_favorito` int NOT NULL AUTO_INCREMENT,
  `data_favorito` date NOT NULL,
  `user_id_favorito` int NOT NULL,
  `obra_id_favorito` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id_favorito`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `favorito`
--

INSERT INTO `favorito` (`id_favorito`, `data_favorito`, `user_id_favorito`, `obra_id_favorito`, `status`) VALUES
(1, '2024-11-14', 7, 1, 0),
(2, '2024-11-14', 7, 2, 0),
(3, '2024-11-18', 9, 1, 0),
(4, '2024-11-18', 9, 2, 0),
(5, '2024-11-18', 2, 2, 0),
(6, '2024-11-18', 2, 3, 0),
(7, '2024-11-19', 2, 4, 0),
(8, '2024-11-19', 10, 1, 0),
(9, '2024-11-19', 10, 3, 0),
(10, '2024-11-19', 12, 1, 0),
(11, '2024-11-28', 13, 1, 0),
(12, '2024-11-28', 13, 8, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `obra`
--

DROP TABLE IF EXISTS `obra`;
CREATE TABLE IF NOT EXISTS `obra` (
  `id_obra` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(400) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `imagem` varchar(300) NOT NULL,
  `favoritos` int NOT NULL,
  `visualizacoes` int NOT NULL,
  `status` int NOT NULL,
  `posicao` varchar(25) NOT NULL,
  PRIMARY KEY (`id_obra`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `obra`
--

INSERT INTO `obra` (`id_obra`, `descricao`, `titulo`, `tipo`, `imagem`, `favoritos`, `visualizacoes`, `status`, `posicao`) VALUES
(1, 'Este design promocional para Instagram usa uma estética de anime para divulgar serviços, com cores padronizadas e personagens estilizados. A obra busca atrair seguidores e aumentar o engajamento.', 'Divulgação Instagram', 'Poster', './arquivos/6748528cdffe7.jfif', 3, 9, 1, 'vertical'),
(2, 'Esta obra mistura elementos clássicos e modernos ao exibir uma estátua de anjo emergindo de um monitor antigo, com o título \"Epiphany\" em destaque. O fundo em tons de roxo e rosa cria um efeito surreal e nostálgico, sugerindo uma fusão entre o espiritual e o digital.', 'Epiphany', 'Poster', './arquivos/6735593867c75.jpg', 4, 4, 1, 'vertical'),
(3, '  A obra retrata um jovem com expressão introspectiva, segurando pincéis e uma paleta, em um estilo de ilustração inspirado em anime. Com a palavra \"ESTETA\" em destaque, a imagem transmite a apreciação pela arte e pela natureza, destacando a sensibilidade do personagem.', 'Esteta', 'Postagem', './arquivos/6735596e1636a.jpg', 2, 2, 1, 'vertical'),
(4, 'A obra \"Ikigai\" usa elementos visuais minimalistas com o fundo em tons claros, detalhes de flores de cerejeira e a palavra \"ikigai\" em destaque em vermelho. Ela trasmite uma mensagem de busca pelo propósito de vida, enfatizada pela citação motivacional no canto superior direito.', 'Ikigai', 'Postagem', './arquivos/67355abe0c72e.jpg', 1, 1, 1, 'vertical'),
(5, '  Uma obra que explora o conceito iyashikei, trazendo uma atmosfera de tranquilidade e cura, enquanto Venti, de Genshin Impact, flutua suavemente ao fundo, transmitindo uma sensação de liberdade e serenidade. A arte combina a leveza do vento com o poder restaurador da natureza.', 'Iyashikei', 'Postagem', './arquivos/67355c45d1a4f.png', 0, 0, 1, 'vertical'),
(6, '  A obra retrata uma cena de pedido entregue com eficiência e precisão, enquanto uma personagem de anime militar, imponente e focada, observa ao fundo, representando a disciplina e o compromisso com a missão. O contraste entre a suavidade do gesto e a força da figura militar confere à cena uma sensação de dever cumprido.', 'Pedido entregue', 'Postagem', './arquivos/67355c8ad4ff1.jpg', 0, 0, 1, 'vertical'),
(7, 'A obra apresenta dois personagens de Genshin Impact, capturados em um momento de contemplação, com a frase I wish you was special, you are so fuckin special flutuando entre eles. A combinação da profundidade emocional da citação com a expressão dos personagens reflete a complexidade de sentimentos intensos e contraditórios, ampliando a sensação de admiração e frustração.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Special', 'Poster', './arquivos/67355d4819e25.jpg', 0, 0, 1, 'vertical'),
(8, 'Um wallpaper de Yuta com temática vaporwave combina a estética do personagem com cores neon, gradientes e elementos retrô, criando uma atmosfera futurista e surreal. Detalhes como palmeiras e estátuas clássicas adicionam um toque psicodélico e nostálgico.', 'Yuta vaporwave', 'Wallpaper', './arquivos/673560a172a3d.jpg', 1, 2, 1, 'horizontal'),
(9, '  A obra de Venti, com asas angelicais, é apresentada como uma capa de revista, destacando sua postura majestosa e encantadora. O design moderno, com elementos etéreos e cores suaves, transmite uma sensação de liberdade e mistério, atraindo olhares curiosos para o conteúdo.', 'Venti anjo', 'Postagem', './arquivos/67356105abaf8.jpg', 0, 0, 1, 'vertical'),
(10, '  A obra mostra Venti na praia, rodeado pelos slimes de vento, com uma expressão tranquila e divertida. A cena captura a leveza do personagem, enquanto os slimes flutuam ao seu redor, criando uma atmosfera descontraída e alegre, com o mar e o céu azul ao fundo.', 'Venti de férias', 'Postagem', './arquivos/6735612a08c4f.jpg', 0, 0, 1, 'vertical'),
(12, '  gato teste', 'teste', 'Poster', './arquivos/673c863871543.jfif', 0, 0, 1, 'vertical'),
(11, '  acb', 'abc', 'Poster', './arquivos/673b1ffdeb5b7.jfif', 0, 1, 0, 'vertical'),
(13, '  123', '123', 'Wallpaper', './arquivos/674852d5e0bc4.jpg', 0, 0, 1, 'horizontal');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `imagem_perfil` varchar(200) NOT NULL,
  `status` int NOT NULL,
  `data_cadastro` date NOT NULL,
  `data_desativacao` date NOT NULL,
  `flag_adm` int NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_user`, `nome`, `email`, `senha`, `imagem_perfil`, `status`, `data_cadastro`, `data_desativacao`, `flag_adm`) VALUES
(1, 'adm', 'matheusg1354@gmail.com', 'onepiece720', '', 1, '2024-11-05', '0000-00-00', 1),
(2, 'Cobaia', '123@123', '123', './arquivos/672bd980bf6f1.png', 1, '2024-11-05', '0000-00-00', 0),
(3, '1232', '1232@1232', '1232', './arquivos/6733fb7e7ee45.jpg', 1, '2024-11-13', '0000-00-00', 0),
(4, 'abc', '12@12', '12', '', 1, '2024-11-14', '0000-00-00', 0),
(5, '213', '21@21', '21', '', 1, '2024-11-14', '0000-00-00', 0),
(6, '512', '512@512', '512', '', 1, '2024-11-14', '0000-00-00', 0),
(7, 'matheus', 'ts@ts', 'ts', './arquivos/6735d9897a7a5.png', 0, '2024-11-14', '0000-00-00', 0),
(8, '123', '132@132', '132', '', 1, '2024-11-14', '0000-00-00', 0),
(9, 'abc', 'abc@abc', 'abc', './arquivos/673b1f4a22328.jpg', 0, '2024-11-18', '0000-00-00', 0),
(10, 'abc123', 'abc2@abc2', 'abc', './arquivos/673c82f722791.jpg', 1, '2024-11-19', '0000-00-00', 0),
(11, 'Abc', 'abc@abc.com', '123', '', 1, '2024-11-19', '0000-00-00', 0),
(12, 'Ana', 'abc@gmail.com', '123', './arquivos/673c85423685e.jpg', 0, '2024-11-19', '0000-00-00', 0),
(13, 'teste13', 'teste13@teste', '123', './arquivos/6748522b65568.jpg', 0, '2024-11-28', '0000-00-00', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
