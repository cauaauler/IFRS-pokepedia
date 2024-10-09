-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/10/2024 às 18:36
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
-- Banco de dados: `pokemons_dataset`
--
CREATE DATABASE IF NOT EXISTS `pokemons_dataset` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pokemons_dataset`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id_pessoa` int(11) NOT NULL,
  `email` varchar(350) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa_pokemon`
--

CREATE TABLE `pessoa_pokemon` (
  `id_pessoa` int(11) NOT NULL,
  `pokedex_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pokemon`
--

CREATE TABLE `pokemon` (
  `Attack` int(11) DEFAULT NULL,
  `Defense` int(11) DEFAULT NULL,
  `Name` varchar(512) DEFAULT NULL,
  `Pokedex_number` int(11) NOT NULL,
  `Type` int(11) DEFAULT NULL,
  `Is_legendary` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pokemon`
--

INSERT INTO `pokemon` (`Attack`, `Defense`, `Name`, `Pokedex_number`, `Type`, `Is_legendary`) VALUES
(49, 49, 'Bulbasaur', 1, 1, '0'),
(62, 63, 'Ivysaur', 2, 1, '0'),
(100, 123, 'Venusaur', 3, 1, '0'),
(52, 43, 'Charmander', 4, 2, '0'),
(64, 58, 'Charmeleon', 5, 2, '0'),
(104, 78, 'Charizard', 6, 2, '0'),
(48, 65, 'Squirtle', 7, 3, '0'),
(63, 80, 'Wartortle', 8, 3, '0'),
(103, 120, 'Blastoise', 9, 3, '0'),
(30, 35, 'Caterpie', 10, 4, '0'),
(20, 55, 'Metapod', 11, 4, '0'),
(45, 50, 'Butterfree', 12, 4, '0'),
(35, 30, 'Weedle', 13, 4, '0'),
(25, 50, 'Kakuna', 14, 4, '0'),
(150, 40, 'Beedrill', 15, 4, '0'),
(45, 40, 'Pidgey', 16, 5, '0'),
(60, 55, 'Pidgeotto', 17, 5, '0'),
(80, 80, 'Pidgeot', 18, 5, '0'),
(56, 35, 'Rattata', 19, 5, '0'),
(71, 70, 'Raticate', 20, 5, '0'),
(60, 30, 'Spearow', 21, 5, '0'),
(90, 65, 'Fearow', 22, 5, '0'),
(60, 44, 'Ekans', 23, 6, '0'),
(95, 69, 'Arbok', 24, 6, '0'),
(55, 40, 'Pikachu', 25, 7, '0'),
(85, 50, 'Raichu', 26, 7, '0'),
(75, 90, 'Sandshrew', 27, 8, '0'),
(100, 120, 'Sandslash', 28, 8, '0'),
(47, 52, 'Nidoran?', 29, 6, '0'),
(62, 67, 'Nidorina', 30, 6, '0'),
(92, 87, 'Nidoqueen', 31, 6, '0'),
(57, 40, 'Nidoran?', 32, 6, '0'),
(72, 57, 'Nidorino', 33, 6, '0'),
(102, 77, 'Nidoking', 34, 6, '0'),
(45, 48, 'Clefairy', 35, 9, '0'),
(70, 73, 'Clefable', 36, 9, '0'),
(41, 40, 'Vulpix', 37, 2, '0'),
(67, 75, 'Ninetales', 38, 2, '0'),
(45, 20, 'Jigglypuff', 39, 5, '0'),
(70, 45, 'Wigglytuff', 40, 5, '0'),
(45, 35, 'Zubat', 41, 6, '0'),
(80, 70, 'Golbat', 42, 6, '0'),
(50, 55, 'Oddish', 43, 1, '0'),
(65, 70, 'Gloom', 44, 1, '0'),
(80, 85, 'Vileplume', 45, 1, '0'),
(70, 55, 'Paras', 46, 4, '0'),
(95, 80, 'Parasect', 47, 4, '0'),
(55, 50, 'Venonat', 48, 4, '0'),
(65, 60, 'Venomoth', 49, 4, '0'),
(55, 30, 'Diglett', 50, 8, '0'),
(100, 60, 'Dugtrio', 51, 8, '0'),
(35, 35, 'Meowth', 52, 5, '0'),
(60, 60, 'Persian', 53, 5, '0'),
(52, 48, 'Psyduck', 54, 3, '0'),
(82, 78, 'Golduck', 55, 3, '0'),
(80, 35, 'Mankey', 56, 10, '0'),
(105, 60, 'Primeape', 57, 10, '0'),
(70, 45, 'Growlithe', 58, 2, '0'),
(110, 80, 'Arcanine', 59, 2, '0'),
(50, 40, 'Poliwag', 60, 3, '0'),
(65, 65, 'Poliwhirl', 61, 3, '0'),
(95, 95, 'Poliwrath', 62, 3, '0'),
(20, 15, 'Abra', 63, 11, '0'),
(35, 30, 'Kadabra', 64, 11, '0'),
(50, 65, 'Alakazam', 65, 11, '0'),
(80, 50, 'Machop', 66, 10, '0'),
(100, 70, 'Machoke', 67, 10, '0'),
(130, 80, 'Machamp', 68, 10, '0'),
(75, 35, 'Bellsprout', 69, 1, '0'),
(90, 50, 'Weepinbell', 70, 1, '0'),
(105, 65, 'Victreebel', 71, 1, '0'),
(40, 35, 'Tentacool', 72, 3, '0'),
(70, 65, 'Tentacruel', 73, 3, '0'),
(80, 100, 'Geodude', 74, 12, '0'),
(95, 115, 'Graveler', 75, 12, '0'),
(120, 130, 'Golem', 76, 12, '0'),
(85, 55, 'Ponyta', 77, 2, '0'),
(100, 70, 'Rapidash', 78, 2, '0'),
(65, 65, 'Slowpoke', 79, 3, '0'),
(75, 180, 'Slowbro', 80, 3, '0'),
(35, 70, 'Magnemite', 81, 7, '0'),
(60, 95, 'Magneton', 82, 7, '0'),
(90, 55, 'Farfetch\'D', 83, 5, '0'),
(85, 45, 'Doduo', 84, 5, '0'),
(110, 70, 'Dodrio', 85, 5, '0'),
(45, 55, 'Seel', 86, 3, '0'),
(70, 80, 'Dewgong', 87, 3, '0'),
(80, 50, 'Grimer', 88, 6, '0'),
(105, 75, 'Muk', 89, 6, '0'),
(65, 100, 'Shellder', 90, 3, '0'),
(95, 180, 'Cloyster', 91, 3, '0'),
(35, 30, 'Gastly', 92, 13, '0'),
(50, 45, 'Haunter', 93, 13, '0'),
(65, 80, 'Gengar', 94, 13, '0'),
(45, 160, 'Onix', 95, 12, '0'),
(48, 45, 'Drowzee', 96, 11, '0'),
(73, 70, 'Hypno', 97, 11, '0'),
(105, 90, 'Krabby', 98, 3, '0'),
(130, 115, 'Kingler', 99, 3, '0'),
(30, 50, 'Voltorb', 100, 7, '0'),
(50, 70, 'Electrode', 101, 7, '0'),
(40, 80, 'Exeggcute', 102, 1, '0'),
(105, 85, 'Exeggutor', 103, 1, '0'),
(50, 95, 'Cubone', 104, 8, '0'),
(80, 110, 'Marowak', 105, 8, '0'),
(120, 53, 'Hitmonlee', 106, 10, '0'),
(105, 79, 'Hitmonchan', 107, 10, '0'),
(55, 75, 'Lickitung', 108, 5, '0'),
(65, 95, 'Koffing', 109, 6, '0'),
(90, 120, 'Weezing', 110, 6, '0'),
(85, 95, 'Rhyhorn', 111, 8, '0'),
(130, 120, 'Rhydon', 112, 8, '0'),
(5, 5, 'Chansey', 113, 5, '0'),
(55, 115, 'Tangela', 114, 1, '0'),
(125, 100, 'Kangaskhan', 115, 5, '0'),
(40, 70, 'Horsea', 116, 3, '0'),
(65, 95, 'Seadra', 117, 3, '0'),
(67, 60, 'Goldeen', 118, 3, '0'),
(92, 65, 'Seaking', 119, 3, '0'),
(45, 55, 'Staryu', 120, 3, '0'),
(75, 85, 'Starmie', 121, 3, '0'),
(45, 65, 'Mr. Mime', 122, 11, '0'),
(110, 80, 'Scyther', 123, 4, '0'),
(50, 35, 'Jynx', 124, 14, '0'),
(83, 57, 'Electabuzz', 125, 7, '0'),
(95, 57, 'Magmar', 126, 2, '0'),
(155, 120, 'Pinsir', 127, 4, '0'),
(100, 95, 'Tauros', 128, 5, '0'),
(10, 55, 'Magikarp', 129, 3, '0'),
(155, 109, 'Gyarados', 130, 3, '0'),
(85, 80, 'Lapras', 131, 3, '0'),
(48, 48, 'Ditto', 132, 5, '0'),
(55, 50, 'Eevee', 133, 5, '0'),
(65, 60, 'Vaporeon', 134, 3, '0'),
(65, 60, 'Jolteon', 135, 7, '0'),
(130, 60, 'Flareon', 136, 2, '0'),
(60, 70, 'Porygon', 137, 5, '0'),
(40, 100, 'Omanyte', 138, 12, '0'),
(60, 125, 'Omastar', 139, 12, '0'),
(80, 90, 'Kabuto', 140, 12, '0'),
(115, 105, 'Kabutops', 141, 12, '0'),
(135, 85, 'Aerodactyl', 142, 12, '0'),
(110, 65, 'Snorlax', 143, 5, '0'),
(85, 100, 'Articuno', 144, 14, '1'),
(90, 85, 'Zapdos', 145, 7, '1'),
(100, 90, 'Moltres', 146, 2, '1'),
(64, 45, 'Dratini', 147, 15, '0'),
(84, 65, 'Dragonair', 148, 15, '0'),
(134, 95, 'Dragonite', 149, 15, '0'),
(150, 70, 'Mewtwo', 150, 11, '1'),
(100, 100, 'Mew', 151, 11, '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `text` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `type`
--

INSERT INTO `type` (`id_type`, `text`) VALUES
(1, 'Grass'),
(2, 'Fire'),
(3, 'Water'),
(4, 'Bug'),
(5, 'Normal'),
(6, 'Poison'),
(7, 'Electric'),
(8, 'Ground'),
(9, 'Fairy'),
(10, 'Fighting'),
(11, 'Psychic'),
(12, 'Rock'),
(13, 'Ghost'),
(14, 'Ice'),
(15, 'Dragon');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id_pessoa`);

--
-- Índices de tabela `pessoa_pokemon`
--
ALTER TABLE `pessoa_pokemon`
  ADD KEY `id_pessoa` (`id_pessoa`),
  ADD KEY `pokedex_number` (`pokedex_number`);

--
-- Índices de tabela `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`Pokedex_number`),
  ADD KEY `Type` (`Type`);

--
-- Índices de tabela `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `Pokedex_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT de tabela `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pessoa_pokemon`
--
ALTER TABLE `pessoa_pokemon`
  ADD CONSTRAINT `pessoa_pokemon_ibfk_1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`),
  ADD CONSTRAINT `pessoa_pokemon_ibfk_2` FOREIGN KEY (`pokedex_number`) REFERENCES `pokemon` (`Pokedex_number`);

--
-- Restrições para tabelas `pokemon`
--
ALTER TABLE `pokemon`
  ADD CONSTRAINT `pokemon_ibfk_1` FOREIGN KEY (`Type`) REFERENCES `type` (`id_type`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
