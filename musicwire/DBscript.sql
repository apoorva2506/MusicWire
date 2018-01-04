-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 13, 2017 at 01:11 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `MusicWire`
--
CREATE DATABASE IF NOT EXISTS `MusicWire` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `MusicWire`;

-- --------------------------------------------------------

--
-- Table structure for table `Album`
--

CREATE TABLE `Album` (
  `albumId` varchar(45) NOT NULL,
  `albumTitle` varchar(45) DEFAULTAlbum NULL,
  `albumDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Album`
--

INSERT INTO `Album` (`albumId`, `albumTitle`, `albumDate`) VALUES
('03ntx95u0wotf68NnE3aGw', 'Witness', '0006-09-17 00:00:00'),
('09fggMHib4YkOtwQNXEBII', 'Legend of the Fall', '2017-12-05 00:00:00'),
('0AcfF3TmyOFCA49plEIN9x', 'The Flying Lotus', '2010-06-17 00:00:00'),
('0K4pIOOsfJ9lK8OjrZfXzd', '25', '0000-00-00 00:00:00'),
('1lXY618HWkwYKJWBRYR4MK', 'More Life', '0000-00-00 00:00:00'),
('1YauqJNlI3nVYKgIGnUdCU', 'Live In The Studio - Sigma Studios 1972', '0009-07-17 00:00:00'),
('28ZKQMoNBB0etKXZ97G2SN', 'Beauty Behind The Madness', '0000-00-00 00:00:00'),
('3eGHhpICuytpKNL1CBluOU', 'Live in San Diego (with Special Guest JJ Cale', '0000-00-00 00:00:00'),
('3T4tUhGYeRNVUGevb0wThu', 'í‡ (Deluxe)', '0003-03-17 00:00:00'),
('3zak0kNLcOY5vFcB3Ipskp', 'Heartbreak on a Full Moon', '0000-00-00 00:00:00'),
('4PgleR09JVnm3zY1fW3XBA', '24K Magic', '0000-00-00 00:00:00'),
('51IXZdiHwdw9etY3oCKXPa', 'Bhala Pauchi', '0000-00-00 00:00:00'),
('5a3LqvNt2nv1B4aRKXmgOV', 'Revolution Radio', '2010-07-16 00:00:00'),
('5m43SVd4aJhA7M88UwzU8a', 'King Daddy', '0001-01-13 00:00:00'),
('5SIv8bswuGB6inCuWbWCa2', 'Tell Me You Love Me', '0000-00-00 00:00:00'),
('5xG9gJcs9ut3qDWezHUlsX', 'Younger Now', '0000-00-00 00:00:00'),
('6Fr2rQkZ383FcMqFyT7yPr', 'Purpose (Deluxe)', '0000-00-00 00:00:00'),
('7DoFFUz6BAVBwUFaMCTTcL', 'A.K.A. (Deluxe)', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Artist`
--

CREATE TABLE `Artist` (
  `aid` varchar(45) NOT NULL,
  `aname` varchar(45) NOT NULL,
  `adesc` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Artist`
--

INSERT INTO `Artist` (`aid`, `aname`, `adesc`) VALUES
('0du5cEVh5yTK9QJze8zA0C', 'Bruno Mars', 'dance pop pop pop rap post-teen pop '),
('1mYsTxnqsietFxj1OgoGbG', 'A.R. Rahman', 'desi desi hip hop filmi indian pop '),
('1uNFoZAHBGtllmzznpCI3s', 'Justin Bieber', 'canadian pop dance pop pop pop christmas post-teen pop '),
('1Xyo4u8uXC1ZmMpatF05PJ', 'The Weeknd', 'canadian pop pop rap '),
('2DlGxzQSjYe5N6G9nkYghR', 'Jennifer Lopez', 'dance pop hip pop pop pop rap post-teen pop r&b urban contemporary '),
('3TVXtAsR1Inumwj472S9r4', 'Drake', 'canadian pop hip hop pop rap rap '),
('4dpARuHxo51G3z768sgnrY', 'Adele', 'dance pop pop post-teen pop '),
('4K6blSRoklNdpw4mzLxwfn', 'Kumar Sanu', 'desi desi hip hop filmi indian folk indian pop '),
('4VMYDCV2IEDYJArk749S6m', 'Daddy Yankee', 'latin latin hip hop reggaeton tropical '),
('5YGY8feqx7naU7z4HrwZM6', 'Miley Cyrus', 'dance pop pop pop christmas post-teen pop '),
('6eUKZXaKkcviH0Ku9w2n3V', 'Ed Sheeran', 'pop '),
('6jJ0s89eD6GaHleKKya26X', 'Katy Perry', 'dance pop pop pop christmas post-teen pop '),
('6PAt558ZEZl0DmdXlnjMgD', 'Eric Clapton', 'album rock blues-rock classic rock electric blues folk rock hard rock mellow gold rock roots rock singer-songwriter soft rock '),
('6S2OmqARrzebs0tKUEyXyp', 'Demi Lovato', 'dance pop pop pop christmas post-teen pop '),
('6zFYqv1mOsgBRQbae3JJ9e', 'Billy Joel', 'adult standards album rock classic rock folk rock mellow gold neo mellow piano rock pop rock rock singer-songwriter soft rock '),
('7bXgB6jMjp9ATFy66eO08Z', 'Chris Brown', 'dance pop pop pop christmas pop rap r&b rap soul christmas '),
('7oPftvlwr6VrsViSDV7fJY', 'Green Day', 'alternative rock modern rock permanent wave pop punk pop rock punk rock ');

-- --------------------------------------------------------

--
-- Table structure for table `Follows`
--

CREATE TABLE `Follows` (
  `uId1` int(11) NOT NULL,
  `uId2` int(11) NOT NULL,
  `followTS` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Follows`
--

INSERT INTO `Follows` (`uId1`, `uId2`, `followTS`) VALUES
(7, 8, '2017-12-12 19:28:24'),
(7, 9, '2017-12-12 20:21:22'),
(8, 7, '2017-12-12 19:26:39'),
(9, 7, '2017-12-12 20:17:54'),
(9, 8, '2017-12-12 20:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `Likes`
--

CREATE TABLE `Likes` (
  `uId` int(11) NOT NULL,
  `aId` varchar(45) NOT NULL,
  `likeTS` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Likes`
--

INSERT INTO `Likes` (`uId`, `aId`, `likeTS`) VALUES
(7, '1uNFoZAHBGtllmzznpCI3s', '2017-12-12 22:27:58'),
(7, '1Xyo4u8uXC1ZmMpatF05PJ', '2017-12-12 19:39:52'),
(9, '1uNFoZAHBGtllmzznpCI3s', '2017-12-12 20:20:01'),
(9, '1Xyo4u8uXC1ZmMpatF05PJ', '2017-12-12 20:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `Playlist`
--

CREATE TABLE `Playlist` (
  `pId` int(11) NOT NULL,
  `pTitle` varchar(45) NOT NULL,
  `pDate` datetime NOT NULL,
  `uId` int(11) NOT NULL,
  `pLabel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Playlist`
--

INSERT INTO `Playlist` (`pId`, `pTitle`, `pDate`, `uId`, `pLabel`) VALUES
(10, 'My favs', '2017-12-12 19:08:35', 7, 'public'),
(11, 'Mayank\'s playlist', '2017-12-12 19:27:50', 8, 'private'),
(12, 'maya\'s open playlist', '2017-12-12 19:32:23', 8, 'public'),
(13, 'Batman\'s Playlist', '2017-12-12 20:12:19', 9, 'public'),
(14, 'My favs', '2017-12-12 20:16:17', 9, 'public');

-- --------------------------------------------------------

--
-- Table structure for table `Playlist_Track`
--

CREATE TABLE `Playlist_Track` (
  `pId` int(11) NOT NULL,
  `tId` varchar(45) NOT NULL,
  `playlistTS` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Playlist_Track`
--

INSERT INTO `Playlist_Track` (`pId`, `tId`, `playlistTS`) VALUES
(11, '09CtPGIpYB4BrO8qb1RGsF', '2017-12-12 19:27:52'),
(13, '09FhDfmrSDN162X1yFfapI', '2017-12-12 20:12:21'),
(13, '0QLXkoV7vX86QEibgLe6zQ', '2017-12-12 20:14:22'),
(10, '2BPX0vWwwuXjJuXV1UcD5b', '2017-12-12 19:16:54'),
(13, '3IU6xbfNZosvTdRrGs8b2u', '2017-12-12 20:13:11'),
(10, '4B0JvthVoAAuygILe3n4Bs', '2017-12-12 19:22:40'),
(14, '4B0JvthVoAAuygILe3n4Bs', '2017-12-12 20:16:21'),
(10, '4ttUYy7HMYQ0nhfllLJNPR', '2017-12-12 21:44:26'),
(12, '5SqSckut3FcoQKmGkMWgp1', '2017-12-12 19:32:25'),
(10, '6b8Be6ljOzmkOmFslEb23P', '2017-12-12 21:30:54'),
(10, '6RsWqX8zABZLhZydXxEFOm', '2017-12-12 19:39:03'),
(10, '7t5m6zRwIEBxmPt8lNoPPi', '2017-12-12 19:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `Plays`
--

CREATE TABLE `Plays` (
  `trackId` varchar(45) NOT NULL,
  `uId` int(11) NOT NULL,
  `playsTS` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Plays`
--

INSERT INTO `Plays` (`trackId`, `uId`, `playsTS`) VALUES
('09CtPGIpYB4BrO8qb1RGsF', 7, '2017-12-12 18:53:51'),
('09CtPGIpYB4BrO8qb1RGsF', 7, '2017-12-12 18:55:04'),
('09FhDfmrSDN162X1yFfapI', 7, '2017-12-12 20:48:19'),
('09FhDfmrSDN162X1yFfapI', 7, '2017-12-12 20:59:23'),
('09FhDfmrSDN162X1yFfapI', 7, '2017-12-12 21:35:48'),
('09FhDfmrSDN162X1yFfapI', 7, '2017-12-12 21:36:43'),
('0QLXkoV7vX86QEibgLe6zQ', 7, '2017-12-12 19:04:30'),
('0QLXkoV7vX86QEibgLe6zQ', 7, '2017-12-12 19:12:56'),
('0QLXkoV7vX86QEibgLe6zQ', 7, '2017-12-12 19:18:32'),
('0QLXkoV7vX86QEibgLe6zQ', 7, '2017-12-12 21:35:32'),
('0QLXkoV7vX86QEibgLe6zQ', 7, '2017-12-12 21:35:42'),
('0QLXkoV7vX86QEibgLe6zQ', 7, '2017-12-12 22:22:43'),
('0QLXkoV7vX86QEibgLe6zQ', 7, '2017-12-12 22:25:34'),
('15tZCtYNEcpiEPIiMOfE7W', 7, '2017-12-12 19:08:05'),
('15tZCtYNEcpiEPIiMOfE7W', 7, '2017-12-12 21:36:51'),
('25khomWgBVamSdKw7hzm3l', 7, '2017-12-12 21:38:18'),
('25khomWgBVamSdKw7hzm3l', 7, '2017-12-12 21:38:30'),
('25khomWgBVamSdKw7hzm3l', 7, '2017-12-12 21:38:51'),
('25khomWgBVamSdKw7hzm3l', 7, '2017-12-12 21:42:44'),
('25khomWgBVamSdKw7hzm3l', 7, '2017-12-12 22:33:43'),
('270nmdCrJaFwO9y9sFso9R', 7, '2017-12-12 21:40:05'),
('2BPX0vWwwuXjJuXV1UcD5b', 7, '2017-12-12 19:14:15'),
('2BPX0vWwwuXjJuXV1UcD5b', 7, '2017-12-12 19:18:53'),
('2BPX0vWwwuXjJuXV1UcD5b', 7, '2017-12-12 19:19:09'),
('2BPX0vWwwuXjJuXV1UcD5b', 7, '2017-12-12 19:19:33'),
('2BPX0vWwwuXjJuXV1UcD5b', 7, '2017-12-12 21:35:35'),
('38Ncs9ZEzJzd1ypUjNPsb5', 7, '2017-12-12 21:40:13'),
('3WVSJi9rCGPX2UQ0vhsECZ', 7, '2017-12-12 19:08:54'),
('3WVSJi9rCGPX2UQ0vhsECZ', 7, '2017-12-12 21:34:39'),
('43RG7aUiRDmfc8q2vQfiFc', 7, '2017-12-12 21:40:10'),
('4ttUYy7HMYQ0nhfllLJNPR', 7, '2017-12-12 19:14:00'),
('4ttUYy7HMYQ0nhfllLJNPR', 7, '2017-12-12 21:35:29'),
('4ttUYy7HMYQ0nhfllLJNPR', 7, '2017-12-12 21:43:28'),
('4ttUYy7HMYQ0nhfllLJNPR', 7, '2017-12-12 21:44:15'),
('4ttUYy7HMYQ0nhfllLJNPR', 7, '2017-12-12 22:25:12'),
('5Htb1uFQ1KrkFXlefS8oGj', 7, '2017-12-12 21:40:17'),
('66UVpCZ5aH3VV3Ic3PBUrP', 7, '2017-12-12 21:34:33'),
('66UVpCZ5aH3VV3Ic3PBUrP', 7, '2017-12-12 21:37:07'),
('6b8Be6ljOzmkOmFslEb23P', 7, '2017-12-12 21:28:43'),
('6b8Be6ljOzmkOmFslEb23P', 7, '2017-12-12 21:34:35'),
('6b8Be6ljOzmkOmFslEb23P', 7, '2017-12-12 21:37:03'),
('6PCUP3dWmTjcTtXY02oFdT', 7, '2017-12-12 21:38:21'),
('6RsWqX8zABZLhZydXxEFOm', 7, '2017-12-12 19:39:10'),
('6RsWqX8zABZLhZydXxEFOm', 7, '2017-12-12 21:36:57'),
('6zyXWcXGiyl3HHTR5s9bw2', 7, '2017-12-12 21:40:21'),
('6zyXWcXGiyl3HHTR5s9bw2', 7, '2017-12-12 21:42:34'),
('7t5m6zRwIEBxmPt8lNoPPi', 7, '2017-12-12 19:39:31'),
('7t5m6zRwIEBxmPt8lNoPPi', 7, '2017-12-12 19:39:50'),
('7t5m6zRwIEBxmPt8lNoPPi', 7, '2017-12-12 21:38:05'),
('09CtPGIpYB4BrO8qb1RGsF', 8, '2017-12-12 19:27:34'),
('09FhDfmrSDN162X1yFfapI', 9, '2017-12-12 20:12:09'),
('09FhDfmrSDN162X1yFfapI', 9, '2017-12-12 20:12:26'),
('0QLXkoV7vX86QEibgLe6zQ', 9, '2017-12-12 20:14:09'),
('66UVpCZ5aH3VV3Ic3PBUrP', 9, '2017-12-12 20:14:47'),
('6RsWqX8zABZLhZydXxEFOm', 9, '2017-12-12 20:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `Rating`
--

CREATE TABLE `Rating` (
  `uId` int(11) NOT NULL,
  `trackId` varchar(45) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `ratingTS` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Rating`
--

INSERT INTO `Rating` (`uId`, `trackId`, `rating`, `ratingTS`) VALUES
(7, '09CtPGIpYB4BrO8qb1RGsF', 4, '2017-12-12 18:54:00'),
(7, '0QLXkoV7vX86QEibgLe6zQ', 4, '2017-12-12 22:23:05'),
(7, '15tZCtYNEcpiEPIiMOfE7W', 4, '2017-12-12 19:08:22'),
(7, '25khomWgBVamSdKw7hzm3l', 5, '2017-12-12 21:38:54'),
(7, '2BPX0vWwwuXjJuXV1UcD5b', 5, '2017-12-12 19:18:56'),
(7, '4ttUYy7HMYQ0nhfllLJNPR', 1, '2017-12-12 21:44:19'),
(7, '6b8Be6ljOzmkOmFslEb23P', 2, '2017-12-12 21:30:45'),
(7, '6RsWqX8zABZLhZydXxEFOm', 5, '2017-12-12 19:39:12'),
(7, '7t5m6zRwIEBxmPt8lNoPPi', 5, '2017-12-12 19:39:33'),
(9, '0QLXkoV7vX86QEibgLe6zQ', 4, '2017-12-12 20:14:12'),
(9, '66UVpCZ5aH3VV3Ic3PBUrP', 3, '2017-12-12 20:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `Track`
--

CREATE TABLE `Track` (
  `tid` varchar(45) NOT NULL,
  `aid` varchar(45) DEFAULT NULL,
  `ttitle` varchar(45) DEFAULT NULL,
  `tduration` int(11) DEFAULT NULL,
  `albumId` varchar(45) NOT NULL,
  `tlink` varchar(125) NOT NULL,
  `tracknumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Track`
--

INSERT INTO `Track` (`tid`, `aid`, `ttitle`, `tduration`, `albumId`, `tlink`, `tracknumber`) VALUES
('05KOgYg8PGeJyyWBPi5ja8', '3TVXtAsR1Inumwj472S9r4', 'Free Smoke', 218673, '1lXY618HWkwYKJWBRYR4MK', 'https://www.youtube.com/embed/7Hx5-dxhDpQ', 1),
('09CtPGIpYB4BrO8qb1RGsF', '1uNFoZAHBGtllmzznpCI3s', 'Sorry', 200786, '6Fr2rQkZ383FcMqFyT7yPr', 'https://www.youtube.com/embed/fRh_vgS2dFE', 4),
('09FhDfmrSDN162X1yFfapI', '1Xyo4u8uXC1ZmMpatF05PJ', 'False Alarm', 220306, '09fggMHib4YkOtwQNXEBII', 'https://www.youtube.com/embed/CW5oGRx9CLM', 2),
('0AOQWNhWxNY1GXfsylN56X', '4K6blSRoklNdpw4mzLxwfn', 'Sunara Sabari', 333320, '51IXZdiHwdw9etY3oCKXPa', 'https://www.youtube.com/embed/nuL1uHUtSQA', 5),
('0KKkJNfGyhkQ5aFogxQAPU', '0du5cEVh5yTK9QJze8zA0C', 'That\'s What I Like', 206693, '4PgleR09JVnm3zY1fW3XBA', 'https://www.youtube.com/embed/PMivT7MJ41M', 4),
('0kN8xEmgMW9mh7UmDYHlJP', '0du5cEVh5yTK9QJze8zA0C', 'Versace On The Floor', 261240, '4PgleR09JVnm3zY1fW3XBA', 'https://www.youtube.com/embed/-FyjEnoIgTM', 5),
('0mBKv9DkYfQHjdMcw2jdyI', '0du5cEVh5yTK9QJze8zA0C', 'Chunky', 186973, '4PgleR09JVnm3zY1fW3XBA', 'https://www.youtube.com/embed/oacaq_1TkMU', 2),
('0PAlrNkCRRHv7hShF5s7Rr', '7oPftvlwr6VrsViSDV7fJY', 'Boulevard of broken dreams', 302333, '5a3LqvNt2nv1B4aRKXmgOV', 'https://www.youtube.com/embed/Soa3gO7tL-c', 5),
('0QLXkoV7vX86QEibgLe6zQ', '4dpARuHxo51G3z768sgnrY', 'I Miss You', 348626, '0K4pIOOsfJ9lK8OjrZfXzd', 'https://www.youtube.com/embed/jDBO9x5YwDU', 3),
('0SNIAtRCPVVLoGEPcuHSIc', '1uNFoZAHBGtllmzznpCI3s', 'What do you mean', 199946, '6Fr2rQkZ383FcMqFyT7yPr', 'https://www.youtube.com/embed/DK_0jXPuIr0', 2),
('0tgVpDi06FyKpA1z0VMD4v', '6eUKZXaKkcviH0Ku9w2n3V', 'Perfect', 263400, '3T4tUhGYeRNVUGevb0wThu', 'https://www.youtube.com/embed/2Vv-BfVoq4g', 5),
('13e6f8t7RKXuxZ0JdaaJRG', '3TVXtAsR1Inumwj472S9r4', 'Hotline Bling', 107673, '1lXY618HWkwYKJWBRYR4MK', 'https://www.youtube.com/embed/uxpDa-c-4Mc', 4),
('15tZCtYNEcpiEPIiMOfE7W', '4K6blSRoklNdpw4mzLxwfn', 'Kisi Roz Tumse', 44880, '51IXZdiHwdw9etY3oCKXPa', 'https://www.youtube.com/embed/7VioIQgm_80', 4),
('19Vd1ZI8lWmYrl0upZlOK9', '2DlGxzQSjYe5N6G9nkYghR', 'Dance on the floor', 228666, '7DoFFUz6BAVBwUFaMCTTcL', 'https://www.youtube.com/embed/t4H_Zoh7G5A', 1),
('1g8znKyO3F1ykMHCGfkKjq', '4VMYDCV2IEDYJArk749S6m', 'D?_nde Es El Party', 214066, '5m43SVd4aJhA7M88UwzU8a', 'https://www.youtube.com/embed/rAwXrmeFMK4', 5),
('1I6pKIyaBp4OebTGLJpCCC', '0du5cEVh5yTK9QJze8zA0C', 'Perm', 210053, '4PgleR09JVnm3zY1fW3XBA', '', 3),
('1NPUy3NihHRZDkcOQLuLaV', '1mYsTxnqsietFxj1OgoGbG', 'Pukaar', 100226, '0AcfF3TmyOFCA49plEIN9x', '', 3),
('1oe9xO03mgCcEW19IXOKgO', '7bXgB6jMjp9ATFy66eO08Z', 'Lost & Found', 241777, '3zak0kNLcOY5vFcB3Ipskp', '', 1),
('21wSdaKzATRjxNnzcFKnxd', '1mYsTxnqsietFxj1OgoGbG', 'Masoom', 75560, '0AcfF3TmyOFCA49plEIN9x', '', 2),
('25khomWgBVamSdKw7hzm3l', '1Xyo4u8uXC1ZmMpatF05PJ', 'The Hills', 242253, '28ZKQMoNBB0etKXZ97G2SN', 'https://www.youtube.com/embed/yzTuBuRdAyA', 2),
('270nmdCrJaFwO9y9sFso9R', '6S2OmqARrzebs0tKUEyXyp', 'Sorry not sorry', 189933, '5SIv8bswuGB6inCuWbWCa2', 'https://www.youtube.com/embed/-MsvER1dpjM', 5),
('278Ao6KQDxWGGszv24uvhI', '7oPftvlwr6VrsViSDV7fJY', 'Bang Bang', 205440, '5a3LqvNt2nv1B4aRKXmgOV', '', 2),
('2BPX0vWwwuXjJuXV1UcD5b', '6PAt558ZEZl0DmdXlnjMgD', 'Key to the Highway - Live in San Diego', 252093, '3eGHhpICuytpKNL1CBluOU', 'https://www.youtube.com/embed/UVe4znlrke0', 2),
('2dxd1q3rCRyt3OoPl2yBzg', '4VMYDCV2IEDYJArk749S6m', 'Nada Ha Cambiao_?', 190000, '5m43SVd4aJhA7M88UwzU8a', 'https://www.youtube.com/embed/RkN_QGQPhYk', 1),
('2kVHAQKVtczchKctctzbtK', '6jJ0s89eD6GaHleKKya26X', 'Swish Swish', 242510, '03ntx95u0wotf68NnE3aGw', '', 4),
('2OV1oB6LQWNw7kTOHU7Bua', '7oPftvlwr6VrsViSDV7fJY', 'Say Goodbye', 219346, '5a3LqvNt2nv1B4aRKXmgOV', '', 4),
('2SnNaoNhMjC1WRMTWD8qTX', '1uNFoZAHBGtllmzznpCI3s', 'Mark My Words', 134346, '6Fr2rQkZ383FcMqFyT7yPr', '', 1),
('2UYXTSZkSxWJYGpcd64SRO', '4VMYDCV2IEDYJArk749S6m', 'La Nueva Y La Ex', 197053, '5m43SVd4aJhA7M88UwzU8a', '', 4),
('38Ncs9ZEzJzd1ypUjNPsb5', '6S2OmqARrzebs0tKUEyXyp', 'Sexy Dirty Love', 213173, '5SIv8bswuGB6inCuWbWCa2', 'https://www.youtube.com/embed/7v6aCEPsSK0', 3),
('39vly7Z4VLImfggnEDEUzf', '5YGY8feqx7naU7z4HrwZM6', 'I Would Die For You', 173866, '5xG9gJcs9ut3qDWezHUlsX', '', 2),
('3IU6xbfNZosvTdRrGs8b2u', '1Xyo4u8uXC1ZmMpatF05PJ', 'Reminder', 218880, '09fggMHib4YkOtwQNXEBII', 'https://www.youtube.com/embed/JZjAg6fK-BQ', 3),
('3J5BXUvBp02g6JUhMg3nYG', '4K6blSRoklNdpw4mzLxwfn', 'Mana Katha Aaji Tate', 308186, '51IXZdiHwdw9etY3oCKXPa', '', 2),
('3ojTJaonfkL96iIWa47SU3', '7bXgB6jMjp9ATFy66eO08Z', 'Questions', 129477, '3zak0kNLcOY5vFcB3Ipskp', 'https://www.youtube.com/embed/mH76VvWkNwA', 4),
('3oqYMRKQcwyNmFn1VD2ukD', '7oPftvlwr6VrsViSDV7fJY', 'Revolution Radio', 180853, '5a3LqvNt2nv1B4aRKXmgOV', 'https://www.youtube.com/embed/B4zc-f0TIZ4', 3),
('3uf8qNeFWMkRduqYYPmyDI', '6zFYqv1mOsgBRQbae3JJ9e', 'Travelin\' Prayer (Live 1972 FM Broadcast)', 230649, '1YauqJNlI3nVYKgIGnUdCU', '', 3),
('3vpfGQOgTTVaF4FhHes1GK', '1mYsTxnqsietFxj1OgoGbG', 'Bechain', 112293, '0AcfF3TmyOFCA49plEIN9x', '', 4),
('3WVSJi9rCGPX2UQ0vhsECZ', '4K6blSRoklNdpw4mzLxwfn', 'Mana Ku Tora', 319800, '51IXZdiHwdw9etY3oCKXPa', '', 3),
('3yS1KGdl2VA5bMBhqoOVLc', '7bXgB6jMjp9ATFy66eO08Z', 'Juicy Booty', 273279, '3zak0kNLcOY5vFcB3Ipskp', '', 3),
('42GmPVxS8UhMgCYksatOjx', '4K6blSRoklNdpw4mzLxwfn', 'Kou Gaan Jhia', 290120, '51IXZdiHwdw9etY3oCKXPa', '', 1),
('43RG7aUiRDmfc8q2vQfiFc', '6S2OmqARrzebs0tKUEyXyp', 'Tell Me You Love Me', 203760, '5SIv8bswuGB6inCuWbWCa2', 'https://www.youtube.com/embed/SM1w9PEQOE8', 1),
('4B0JvthVoAAuygILe3n4Bs', '1uNFoZAHBGtllmzznpCI3s', 'baby', 205680, '6Fr2rQkZ383FcMqFyT7yPr', 'https://www.youtube.com/embed/kffacxfA7G4', 3),
('4BHzQ9C00ceJxfG16AlNWb', '4dpARuHxo51G3z768sgnrY', 'Send My Love (To Your New Lover)', 223080, '0K4pIOOsfJ9lK8OjrZfXzd', '', 2),
('4lcFmr3KkpCgsa4zamPGzw', '2DlGxzQSjYe5N6G9nkYghR', 'First Love', 215786, '7DoFFUz6BAVBwUFaMCTTcL', '', 2),
('4sPmO7WMQUAf45kwMOtONw', '4dpARuHxo51G3z768sgnrY', 'Hello', 295493, '0K4pIOOsfJ9lK8OjrZfXzd', 'https://www.youtube.com/embed/YQHsXMglC9A', 1),
('4ttUYy7HMYQ0nhfllLJNPR', '5YGY8feqx7naU7z4HrwZM6', 'Miss You So Much', 293746, '5xG9gJcs9ut3qDWezHUlsX', 'https://www.youtube.com/embed/sJJAmrZz6QY', 1),
('4UGWMzkmEPpYoS9myk8lAG', '7oPftvlwr6VrsViSDV7fJY', 'Somewhere Now', 249360, '5a3LqvNt2nv1B4aRKXmgOV', '', 1),
('50kpGaPAhYJ3sGmk6vplg0', '1uNFoZAHBGtllmzznpCI3s', 'Love Yourself', 233720, '6Fr2rQkZ383FcMqFyT7yPr', '', 5),
('51ChrwmUPDJvedPQnIU8Ls', '6eUKZXaKkcviH0Ku9w2n3V', 'Dive', 238440, '3T4tUhGYeRNVUGevb0wThu', 'https://www.youtube.com/embed/Wv2rLZmbPMA', 3),
('5aZbpEZg1ml49uJ4tDwqMp', '1mYsTxnqsietFxj1OgoGbG', 'Tiranga', 259304, '0AcfF3TmyOFCA49plEIN9x', '', 1),
('5CSb35j35TTfMzkD1ySxWq', '6PAt558ZEZl0DmdXlnjMgD', 'Tell the Truth - Live in San Diego', 383253, '3eGHhpICuytpKNL1CBluOU', '', 1),
('5Htb1uFQ1KrkFXlefS8oGj', '6S2OmqARrzebs0tKUEyXyp', 'Confident', 236986, '5SIv8bswuGB6inCuWbWCa2', 'https://www.youtube.com/embed/cwLRQn61oUY', 2),
('5jhF4d9nxIm1P58WQCCa5h', '6jJ0s89eD6GaHleKKya26X', 'Roulette', 198689, '03ntx95u0wotf68NnE3aGw', '', 3),
('5kyd6oKvKmj6mWCaAaHoN4', '7bXgB6jMjp9ATFy66eO08Z', 'Privacy', 220963, '3zak0kNLcOY5vFcB3Ipskp', '', 2),
('5m3JK8xXGGAWGnHf2CYUDa', '4VMYDCV2IEDYJArk749S6m', 'Calent?_n', 183226, '5m43SVd4aJhA7M88UwzU8a', '', 3),
('5mCPDVBb16L4XQwDdbRUpz', '3TVXtAsR1Inumwj472S9r4', 'Headlines', 298940, '1lXY618HWkwYKJWBRYR4MK', 'https://www.youtube.com/embed/cimoNqiulUE', 3),
('5q9stUg2W38X9PyzgIOdhH', '6jJ0s89eD6GaHleKKya26X', 'Dթj?_ Vu', 197848, '03ntx95u0wotf68NnE3aGw', '', 5),
('5SqSckut3FcoQKmGkMWgp1', '1Xyo4u8uXC1ZmMpatF05PJ', 'Often', 249040, '28ZKQMoNBB0etKXZ97G2SN', 'https://www.youtube.com/embed/JPIhUaONiLU', 1),
('5ThJ3Q0IItsQkQCDJuIzxe', '2DlGxzQSjYe5N6G9nkYghR', 'Acting Like That', 197400, '7DoFFUz6BAVBwUFaMCTTcL', '', 5),
('5VrM5wZdPwFC0MIFVuKeFL', '2DlGxzQSjYe5N6G9nkYghR', 'Never Satisfied', 193986, '7DoFFUz6BAVBwUFaMCTTcL', '', 3),
('5Wzo7GPOURHVXml7rYncBB', '6zFYqv1mOsgBRQbae3JJ9e', 'Jackson Browne Intro (Live 1972 FM Broadcast)', 26868, '1YauqJNlI3nVYKgIGnUdCU', '', 1),
('66UVpCZ5aH3VV3Ic3PBUrP', '1Xyo4u8uXC1ZmMpatF05PJ', 'Shameless', 253506, '28ZKQMoNBB0etKXZ97G2SN', 'https://www.youtube.com/embed/o617-9PzNqI', 5),
('6b8Be6ljOzmkOmFslEb23P', '0du5cEVh5yTK9QJze8zA0C', '24K Magic', 225983, '4PgleR09JVnm3zY1fW3XBA', 'https://www.youtube.com/embed/UqyT8IEBkvY', 1),
('6bSLDFKAqEIItAGrdoygwY', '7bXgB6jMjp9ATFy66eO08Z', 'Heartbreak on a Full Moon', 246523, '3zak0kNLcOY5vFcB3Ipskp', '', 5),
('6CfrYuD3YRDYdYvH9jNtXY', '3TVXtAsR1Inumwj472S9r4', 'No Long Talk', 149568, '1lXY618HWkwYKJWBRYR4MK', '', 2),
('6FjmAUxcYtV1HaKuFBT3X8', '4VMYDCV2IEDYJArk749S6m', 'Mil Problemas', 154546, '5m43SVd4aJhA7M88UwzU8a', '', 2),
('6kP57bEoT8R9ytlGUfUTmB', '1Xyo4u8uXC1ZmMpatF05PJ', 'Secrets', 265600, '09fggMHib4YkOtwQNXEBII', 'https://www.youtube.com/embed/eXDU9um19HM', 4),
('6kxHlFttVh3M7YbpKXK3qu', '6zFYqv1mOsgBRQbae3JJ9e', 'Falling Of The Rain (Live 1972 FM Broadcast)', 154032, '1YauqJNlI3nVYKgIGnUdCU', '', 2),
('6PCUP3dWmTjcTtXY02oFdT', '6eUKZXaKkcviH0Ku9w2n3V', 'Castle on the Hill', 261153, '3T4tUhGYeRNVUGevb0wThu', 'https://www.youtube.com/embed/K0ibBPhiaG0', 2),
('6RsWqX8zABZLhZydXxEFOm', '1Xyo4u8uXC1ZmMpatF05PJ', 'Can\'t Feel My Face', 213520, '28ZKQMoNBB0etKXZ97G2SN', 'https://www.youtube.com/embed/KEI4qSrkPAs', 4),
('6x6cpNDnIpqtaNcXIcGkUs', '5YGY8feqx7naU7z4HrwZM6', 'Bad Mood', 179120, '5xG9gJcs9ut3qDWezHUlsX', '', 4),
('6zyXWcXGiyl3HHTR5s9bw2', '6S2OmqARrzebs0tKUEyXyp', 'You Don\'t Do It For Me Anymore', 197720, '5SIv8bswuGB6inCuWbWCa2', 'https://www.youtube.com/embed/rszdyM1Sxg4', 4),
('742YV8T9ZyczCNdrTIAhaw', '5YGY8feqx7naU7z4HrwZM6', 'Thinkin\'', 245053, '5xG9gJcs9ut3qDWezHUlsX', '', 3),
('7BcZItyEDroT7pPY6UecB3', '2DlGxzQSjYe5N6G9nkYghR', 'I Luh Ya Papi', 207133, '7DoFFUz6BAVBwUFaMCTTcL', '', 4),
('7GgQi7JTG4b6J4iEF4RTjF', '4dpARuHxo51G3z768sgnrY', 'Remedy', 245426, '0K4pIOOsfJ9lK8OjrZfXzd', '', 5),
('7IWkJwX9C0J7tHurTD7ViL', '4dpARuHxo51G3z768sgnrY', 'When We Were Young', 290906, '0K4pIOOsfJ9lK8OjrZfXzd', '', 4),
('7iz4bsfPOrK9wzhXkgUfya', '6jJ0s89eD6GaHleKKya26X', 'Witness', 250511, '03ntx95u0wotf68NnE3aGw', '', 1),
('7llPsildzxzgt6odtSaScQ', '5YGY8feqx7naU7z4HrwZM6', 'Love Someone', 199493, '5xG9gJcs9ut3qDWezHUlsX', '', 5),
('7nY0TjOsD1BZehkZgLiOxO', '6jJ0s89eD6GaHleKKya26X', 'Hey Hey Hey', 214955, '03ntx95u0wotf68NnE3aGw', 'https://www.youtube.com/embed/2q4_vMwrvSI', 2),
('7oolFzHipTMg2nL7shhdz2', '6eUKZXaKkcviH0Ku9w2n3V', 'Eraser', 227426, '3T4tUhGYeRNVUGevb0wThu', 'https://www.youtube.com/embed/OjGrcJ4lZCc', 1),
('7qiZfU4dY1lWllzX7mPBI3', '6eUKZXaKkcviH0Ku9w2n3V', 'Shape of You', 233712, '3T4tUhGYeRNVUGevb0wThu', 'https://www.youtube.com/embed/JGwWNGJdvx8', 4),
('7t5m6zRwIEBxmPt8lNoPPi', '1Xyo4u8uXC1ZmMpatF05PJ', 'Starboy', 348853, '28ZKQMoNBB0etKXZ97G2SN', 'https://www.youtube.com/embed/34Na4j8AVgA', 3),
('7y6c07pgjZvtHI9kuMVqk1', '3TVXtAsR1Inumwj472S9r4', 'Get It Together', 250337, '1lXY618HWkwYKJWBRYR4MK', '', 5),
('Ayv6465LBywy7tOx78bc', '1Xyo4u8uXC1ZmMpatF05PJ', 'Party Monster', 249213, '09fggMHib4YkOtwQNXEBII', 'https://www.youtube.com/embed/diW6jXhLE0E', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `uemailid` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `uemailid`, `password`, `firstName`, `lastName`) VALUES
(7, 'apu', 'as11445@nyu.edu', '$2y$10$tr2bVTQ1nw1NaxNCFAQQ5.zSI83zizPecu9zTqdIQPqO1eIxcObW6', 'Apoorva', 'rty'),
(8, 'maya', 'mayank@gmail.com', '$2y$10$oWYEpopMczkkSMTvHKj0X.sGGegwWfE1TtZ99h.3PlE0uOgnI24x6', 'Mayank', 'Grover'),
(9, 'batman', 'batman@nyu.edu', '$2y$10$g5Lxk3U1OfGxd2yS2SVrPeUCGQfOIWSTtsbT2pYlA5QRVpwcuwEl.', 'Bruce', 'Wayne');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Album`
--
ALTER TABLE `Album`
  ADD PRIMARY KEY (`albumId`);

--
-- Indexes for table `Artist`
--
ALTER TABLE `Artist`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `Follows`
--
ALTER TABLE `Follows`
  ADD PRIMARY KEY (`uId1`,`uId2`),
  ADD KEY `uid2` (`uId2`);

--
-- Indexes for table `Likes`
--
ALTER TABLE `Likes`
  ADD PRIMARY KEY (`uId`,`aId`),
  ADD KEY `aId` (`aId`);

--
-- Indexes for table `Playlist`
--
ALTER TABLE `Playlist`
  ADD PRIMARY KEY (`pId`),
  ADD KEY `uId6` (`uId`);

--
-- Indexes for table `Playlist_Track`
--
ALTER TABLE `Playlist_Track`
  ADD PRIMARY KEY (`tId`,`pId`) USING BTREE,
  ADD KEY `pId` (`pId`);

--
-- Indexes for table `Plays`
--
ALTER TABLE `Plays`
  ADD PRIMARY KEY (`trackId`,`uId`,`playsTS`) USING BTREE,
  ADD KEY `uid4` (`uId`);

--
-- Indexes for table `Rating`
--
ALTER TABLE `Rating`
  ADD PRIMARY KEY (`uId`,`trackId`),
  ADD KEY `trackId1` (`trackId`);

--
-- Indexes for table `Track`
--
ALTER TABLE `Track`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `albumId2` (`albumId`),
  ADD KEY `aId1` (`aid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Playlist`
--
ALTER TABLE `Playlist`
  MODIFY `pId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Follows`
--
ALTER TABLE `Follows`
  ADD CONSTRAINT `uid1` FOREIGN KEY (`uId1`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `uid2` FOREIGN KEY (`uId2`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Likes`
--
ALTER TABLE `Likes`
  ADD CONSTRAINT `aId` FOREIGN KEY (`aId`) REFERENCES `artist` (`aid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `uid3` FOREIGN KEY (`uId`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Playlist`
--
ALTER TABLE `Playlist`
  ADD CONSTRAINT `uId6` FOREIGN KEY (`uId`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Playlist_Track`
--
ALTER TABLE `Playlist_Track`
  ADD CONSTRAINT `pId` FOREIGN KEY (`pId`) REFERENCES `playlist` (`pId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tId4` FOREIGN KEY (`tId`) REFERENCES `track` (`tid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Plays`
--
ALTER TABLE `Plays`
  ADD CONSTRAINT `trackId3` FOREIGN KEY (`trackId`) REFERENCES `track` (`tid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `uid4` FOREIGN KEY (`uId`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Rating`
--
ALTER TABLE `Rating`
  ADD CONSTRAINT `trackId1` FOREIGN KEY (`trackId`) REFERENCES `track` (`tid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `uid5` FOREIGN KEY (`uId`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Track`
--
ALTER TABLE `Track`
  ADD CONSTRAINT `aId1` FOREIGN KEY (`aid`) REFERENCES `artist` (`aid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `albumId2` FOREIGN KEY (`albumId`) REFERENCES `album` (`albumId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
