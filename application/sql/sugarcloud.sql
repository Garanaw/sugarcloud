-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-08-2017 a las 11:54:35
-- Versión del servidor: 5.5.54-0+deb8u1
-- Versión de PHP: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sugar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wi_groups`
--

CREATE TABLE IF NOT EXISTS `wi_groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `wi_groups`
--

INSERT INTO `wi_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'doctors', 'Able to see all the Patients health records'),
(4, 'patients', 'Able to see and add their own health records');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wi_insulin_list`
--

CREATE TABLE IF NOT EXISTS `wi_insulin_list` (
`id` tinyint(3) unsigned NOT NULL,
  `name` varchar(25) NOT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `type` enum('rapid-acting','short-acting','intermediate-acting','long-acting','pre-mixed') NOT NULL DEFAULT 'rapid-acting',
  `onset` varchar(20) DEFAULT NULL,
  `peak` varchar(20) DEFAULT NULL,
  `duration` varchar(20) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `wi_insulin_list`
--

INSERT INTO `wi_insulin_list` (`id`, `name`, `brand`, `type`, `onset`, `peak`, `duration`, `description`) VALUES
(1, 'Humulin R', 'ELI LILLY', 'rapid-acting', '30 min', '2 - 3 hours', '8 hours', NULL),
(2, 'Humulin L', 'ELI LILLY', 'intermediate-acting', '2 hours', NULL, '18 - 24 hours', NULL),
(3, 'Humulin U', 'ELI LILLY', 'long-acting', '4 - 8 hours', '10 - 30 hours', '36 hours', NULL),
(4, 'Humulin 70/30', 'ELI LILLY', 'pre-mixed', '10 - 20 min', '2 hours', '24 hours', NULL),
(5, 'Novolog', 'Novolog', 'rapid-acting', '15 min', '1 hour', '2 - 4 hours', NULL),
(6, 'Novolog Mix 70/30', 'Novolog', 'pre-mixed', '10 - 20 min', '2 hours', '24 hours', NULL),
(7, 'Humalog Mix 75/25', 'ELI LILLY', 'pre-mixed', '10 - 20 min', '2 hours', '24 hours', NULL),
(8, 'ReliON Novolin 70/30', 'Novo Nordisk', 'pre-mixed', '10 - 20 min', '2 hours', '24 hours', NULL),
(9, 'Apidra', 'Solostar', 'rapid-acting', '15 min', '1 hour', '2 - 4 hours', NULL),
(10, 'Humulin N', 'ELI LILLY', 'intermediate-acting', '2 - 4 hours', '4 - 12 hours', '12 - 18 hours', NULL),
(11, 'Humalog', 'ELI LILLY', 'rapid-acting', '15 min', '1 hour', '2 - 4 hours', NULL),
(12, 'Humalog Mix 50/50', 'ELI LILLY', 'pre-mixed', '10 - 20 min', '2 hours', '24 hours', NULL),
(13, 'Lantus', 'Solostar', 'long-acting', '1 - 2 hours', '6 hours', '18 - 26 hours', NULL),
(14, 'Levemir', 'Novo Nordisk', 'long-acting', '1 - 3 hours', '8 - 10 hours', '18 - 26 hours', NULL),
(15, 'Novolin N', 'Novo Nordisk', 'intermediate-acting', '2 - 4 hours', '4 - 12 hours', '12 - 18 hours', NULL),
(16, 'Novolin R', 'Novo Nordisk', 'rapid-acting', '30 min', '2 - 3 hours', '8 hours', NULL),
(17, 'Novolin 70/30', 'Novo Nordisk', 'pre-mixed', '10 - 20 min', '2 hours', '24 hours', NULL),
(18, 'Afrezza', 'MannKind Corporation', 'rapid-acting', '15 min', '1 hour', '2 - 4 hours', NULL),
(19, 'Tresiba', 'Novo Nordisk', 'long-acting', NULL, NULL, '24 hours', NULL),
(20, 'Toujeo', 'Solostar', 'long-acting', NULL, NULL, '24 hours', NULL),
(21, 'Basaglar', 'ELI LILLY', 'long-acting', NULL, NULL, '24 hours', NULL),
(22, 'Ryzodeg 70/30', 'Novo Nordisk', 'pre-mixed', '10 - 20 min', '1 hour', '24', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wi_login_attempts`
--

CREATE TABLE IF NOT EXISTS `wi_login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wi_sugar_levels`
--

CREATE TABLE IF NOT EXISTS `wi_sugar_levels` (
`id` int(10) unsigned NOT NULL,
  `id_user` int(11) unsigned NOT NULL,
  `messure` enum('mg/dl','mmol/l') DEFAULT 'mmol/l',
  `value` float(6,3) unsigned DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `insulin1` varchar(25) DEFAULT NULL,
  `insulin1_units` int(2) unsigned DEFAULT NULL,
  `insulin2` varchar(25) DEFAULT NULL,
  `insulin2_units` int(2) unsigned DEFAULT NULL,
  `comment` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wi_users`
--

CREATE TABLE IF NOT EXISTS `wi_users` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `wi_users`
--

INSERT INTO `wi_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1492735559, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wi_users_groups`
--

CREATE TABLE IF NOT EXISTS `wi_users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `wi_users_groups`
--

INSERT INTO `wi_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wi_users_meds`
--

CREATE TABLE IF NOT EXISTS `wi_users_meds` (
`id` int(5) NOT NULL,
  `id_user` int(11) unsigned NOT NULL,
  `id_med` tinyint(3) unsigned NOT NULL,
  `current` tinyint(1) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `wi_users_meds`
--

INSERT INTO `wi_users_meds` (`id`, `id_user`, `id_med`, `current`) VALUES
(1, 1, 11, 1),
(2, 1, 14, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wi_users_meta`
--

CREATE TABLE IF NOT EXISTS `wi_users_meta` (
`id` tinyint(5) unsigned NOT NULL,
  `user_id` tinyint(5) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(250) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `wi_users_meta`
--

INSERT INTO `wi_users_meta` (`id`, `user_id`, `name`, `value`) VALUES
(1, 1, 'diabetes_type', 'type-1'),
(2, 1, 'country', 'ES'),
(3, 1, 'fast-acting insulin', 'Humalog'),
(4, 1, 'short-acting insulin', 'Levemir'),
(5, 1, 'debut', '14-06-1996'),
(6, 1, 'messure', 'Mmol/l'),
(7, 1, 'low', '4.6'),
(8, 1, 'high', '7.8'),
(9, 1, 'gender', 'male'),
(10, 1, 'bio', 'I am the site''s creator'),
(11, 1, 'language', 'ES'),
(12, 1, 'birthdate', '1989-03-25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `wi_groups`
--
ALTER TABLE `wi_groups`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `wi_insulin_list`
--
ALTER TABLE `wi_insulin_list`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `wi_login_attempts`
--
ALTER TABLE `wi_login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `wi_sugar_levels`
--
ALTER TABLE `wi_sugar_levels`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `wi_users`
--
ALTER TABLE `wi_users`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `wi_users_groups`
--
ALTER TABLE `wi_users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indices de la tabla `wi_users_meds`
--
ALTER TABLE `wi_users_meds`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `wi_users_meta`
--
ALTER TABLE `wi_users_meta`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `wi_groups`
--
ALTER TABLE `wi_groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `wi_insulin_list`
--
ALTER TABLE `wi_insulin_list`
MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `wi_login_attempts`
--
ALTER TABLE `wi_login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `wi_sugar_levels`
--
ALTER TABLE `wi_sugar_levels`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `wi_users`
--
ALTER TABLE `wi_users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `wi_users_groups`
--
ALTER TABLE `wi_users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `wi_users_meds`
--
ALTER TABLE `wi_users_meds`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `wi_users_meta`
--
ALTER TABLE `wi_users_meta`
MODIFY `id` tinyint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
