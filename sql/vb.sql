-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2023 a las 07:03:17
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `valuation` varchar(10) NOT NULL,
  `id_c` int(11) NOT NULL,
  `id_rec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resource`
--

CREATE TABLE `resource` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `src` varchar(300) NOT NULL,
  `img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resource`
--

INSERT INTO `resource` (`id`, `name`, `author`, `type`, `category`, `description`, `src`, `img`) VALUES
(12, 'El Horror de Dunwich', 'Lovecraft, Howard Phillips', 'Libro', 'Literatura', '\"El Horror de Dunwich\" es una obra emblemática de Lovecraft que explora temas de horror cósmico, la insignificancia de la humanidad frente a fuerzas incomprensibles y la decadencia de la línea familiar de los Whateley. La narrativa de Lovecraft se caracteriza por su estilo literario distintivo y su capacidad para crear una atmósfera de miedo y misterio, lo que lo convierte en un autor influyente en el género de la literatura de terror.', '../src/files/01. El Horror de Dunwich autor Lovecraft, Howard Phillips.pdf', '../src/files/img/El Horror de Dunwich.jpg'),
(13, 'El Misterio del Cuarto Amarillo', 'Gaston Leroux', 'Libro', 'Literatura', 'La trama de la novela se centra en un intento de asesinato en un cuarto amarillo cerrado con llave. Mathilde Stangerson, una joven mujer, es atacada en su cuarto amarillo, pero nadie más pudo haber entrado o salido del cuarto en el momento del ataque, ya que todas las puertas estaban cerradas por dentro y las ventanas estaban aseguradas desde el interior. El periodista y detective amateur Joseph Rouletabille toma el caso y se embarca en la resolución del misterio.', '../src/files/02. El misterio del cuarto amarillo autor Gaston Leroux.pdf', '../src/files/img/El Misterio del Cuarto Amarillo.jpg'),
(14, 'La Edad de la Inocencia', 'Edith Wharton', 'Libro', 'Literatura', 'La trama de la novela se sitúa en la alta sociedad de la ciudad de Nueva York durante la década de 1870. La historia sigue a Newland Archer, un joven abogado de la alta sociedad que se encuentra atrapado entre su deber y su deseo. Está comprometido para casarse con May Welland, una mujer respetable de su misma clase social. Sin embargo, todo cambia cuando llega a Nueva York la prima de May, Ellen Olenska, quien ha regresado de Europa después de un matrimonio fracasado. Ellen es vista como un espíritu libre y una figura enigmática en la sociedad conservadora de la época.', '../src/files/02. La edad de la inocencia autor Edith Wharton.pdf', '../src/files/img/La-edad-de-la-inocencia.jpg'),
(15, 'El gato negro', 'Edgar Allan Poe', 'Libro', 'Literatura', 'La trama del cuento se centra en un narrador sin nombre que relata su descenso a la locura y la violencia. El protagonista comienza como un amante de los animales, pero su personalidad se ve transformada cuando adopta a un gato negro al que llama Plutón. Con el tiempo, el narrador se convierte en un alcohólico violento y comete actos terribles, incluyendo la mutilación y el asesinato de Plutón.', '../src/files/2 El gato negro autor Edgar Allan Poe.pdf', '../src/files/img/El gato negro.jpg'),
(16, 'Cuentos de Barro', 'Rubén Darío', 'Libro', 'Literatura', 'En estos cuentos, el autor retrata la vida de los campesinos y las clases trabajadoras en Andalucía, explorando temas como la pobreza, la tradición, la superstición y las luchas cotidianas de la gente común.', '../src/files/cuentos-de-barro-salarrue.pdf', '../src/files/img/cuentos de barro.jpg'),
(17, 'Luz Negra', 'Carlos Fonseca', 'Libro', 'null', '\"Museo animal\" es una novela publicada en 2014 y ha recibido elogios por su estilo innovador y su prosa poética. La trama sigue a un personaje principal que está atrapado en una búsqueda obsesiva por descubrir la historia detrás de un museo de historia natural abandonado. A medida que explora el museo, se sumerge en un mundo lleno de objetos y criaturas que lo desafían a reflexionar sobre la vida, la muerte, la memoria y la identidad.', '../src/files/2011091182LuzNegra.pdf', '../src/files/img/luz negra.jpg'),
(18, 'Física Cuántica', 'Miguel Ortin', 'Revista', 'Ciencia', 'Física Cuántica es una completa guía que valiéndose del empleo de un lenguaje didáctico y sencillo plantea con gran detalle el conjunto de elementos que definen a esta disciplina que es parte de la física.', '../src/files/02. Física Cuántica autor Miguel Ortuño Ortín y Miguel Albaladejo Serrano.pdf', '../src/files/img/Fisica cuantica.png'),
(19, 'La Riqueza de las Naciones', 'Adam Smith', 'Tesis', 'Economía', 'Una investigación sobre la naturaleza y causas de la riqueza de las naciones, o sencillamente La riqueza de las naciones, es la obra más célebre de Adam Smith. Publicado en 1776, es considerado el primer libro moderno de economí', '../src/files/1 La riqueza de las Adam Smith.pdf', '../src/files/img/La_riqueza_de_las_naciones-Adam_Smith-lg.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shelf`
--

CREATE TABLE `shelf` (
  `id` int(11) NOT NULL,
  `id_r` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `shelf`
--

INSERT INTO `shelf` (`id`, `id_r`) VALUES
(65, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  `rol` char(1) NOT NULL DEFAULT '0',
  `dateReg` date NOT NULL DEFAULT '2023-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `lastName`, `email`, `password`, `img`, `rol`, `dateReg`) VALUES
(1, 'alejandro', 'alvarenga', 'ale@gmail.com', '1234', '../src/user/8fe3dab7-69d3-455e-868a-e8b6fccf2b1a.jpg', '0', '2023-08-21'),
(2, '', '', 'admin@gmail.com', '1234', '', '1', '2023-01-01'),
(3, 'martin', 'Lopez', 'martin@gmail.com', '1234', '../src/user/user-man-2.png', '0', '2023-08-27'),
(4, 'test', 'test', 'test@gmail.com', '1234', '../src/user/user-man-1.png', '0', '2023-09-03'),
(5, 'ssd', 'ssd', 'ssd@gmail.com', '1234', '../src/user/user-man-2.png', '0', '2023-09-03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_c` (`id_c`),
  ADD KEY `id_rec` (`id_rec`);

--
-- Indices de la tabla `resource`
--
ALTER TABLE `resource`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_r` (`id_r`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `resource`
--
ALTER TABLE `resource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `shelf`
--
ALTER TABLE `shelf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_c`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_rec`) REFERENCES `resource` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `shelf`
--
ALTER TABLE `shelf`
  ADD CONSTRAINT `shelf_ibfk_1` FOREIGN KEY (`id_r`) REFERENCES `resource` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
