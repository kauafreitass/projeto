-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/05/2025 às 04:17
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
-- Banco de dados: `projeto-vida`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_google` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `mbti_type` varchar(4) DEFAULT NULL,
  `mbti_description` text DEFAULT NULL,
  `mbti_scores` text DEFAULT NULL,
  `intelligences` text DEFAULT NULL,
  `about_me` text DEFAULT NULL,
  `memories` text DEFAULT NULL,
  `strengths` text DEFAULT NULL,
  `weaknesses` text DEFAULT NULL,
  `values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`values`)),
  `aptitudes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`aptitudes`)),
  `relationships` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`relationships`)),
  `daily_life` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`daily_life`)),
  `school_life` text DEFAULT NULL,
  `self_view` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`self_view`)),
  `others_view` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`others_view`)),
  `self_esteem` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`self_esteem`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `id_google`, `gender`, `birthdate`, `picture`, `created_at`, `updated_at`, `mbti_type`, `mbti_description`, `mbti_scores`, `intelligences`, `about_me`, `memories`, `strengths`, `weaknesses`, `values`, `aptitudes`, `relationships`, `daily_life`, `school_life`, `self_view`, `others_view`, `self_esteem`) VALUES
(1, 'Kaua Freitas', 'kauafreitas.sesisenai@gmail.com', NULL, '107728098088795132441', 'Masculino', NULL, 'images/profile/uploads/profile_6835049057312.png', '2025-05-14 00:05:26', '2025-05-27 00:17:20', 'ESTJ', 'Executivos são administradores excelentes, inigualáveis na gestão de coisas — ou pessoas.', '{\"E\":7,\"I\":1,\"S\":0,\"N\":0,\"T\":0,\"F\":0,\"J\":0,\"P\":0}', '{\"Lingu\\u00edstica\":1,\"L\\u00f3gico-Matem\\u00e1tica\":1,\"Espacial\":1,\"Corporal-Cinest\\u00e9sica\":1,\"Musical\":1,\"Interpessoal\":1,\"Intrapessoal\":1,\"Naturalista\":1}', 'teste12323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Kauã Freitas', 'teste@gmail.com', '$2y$10$IraOmD6tq.eCC0ALSXcBMOSXa0X4bJ9nF8rfBcSG8Lq71nfNpRr5S', NULL, 'Masculino', '2025-05-12', 'images/profile/uploads/profile_68351cfb1229d.png', '2025-05-14 01:42:01', '2025-05-27 02:08:19', 'ESTJ', 'Executivos são administradores excelentes, inigualáveis na gestão de coisas — ou pessoas.', '{\"E\":6,\"I\":2,\"S\":0,\"N\":0,\"T\":0,\"F\":0,\"J\":0,\"P\":0}', '{\"Lingu\\u00edstica\":0,\"L\\u00f3gico-Matem\\u00e1tica\":1,\"Espacial\":1,\"Corporal-Cinest\\u00e9sica\":1,\"Musical\":0,\"Interpessoal\":1,\"Intrapessoal\":1,\"Naturalista\":0}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`),
  ADD UNIQUE KEY `unique_google_id` (`id_google`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
