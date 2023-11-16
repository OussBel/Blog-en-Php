-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 10 nov. 2023 à 16:33
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `php_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `published_at` datetime NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `subtitle`, `img`, `user_id`, `category_id`, `published_at`, `published`) VALUES
(1, 'Chatgpt va-t-il changer notre vie?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Comment chatgpti peut changer le monde, quels seront les solutions et les problèmes qui pourraient créer?', 'ai2.jpg', 12, 1, '2023-03-05 16:18:37', 1),
(2, 'Le pouvoir de l\'écoute', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum at varius vel pharetra vel turpis nunc. Ac felis donec et odio pellentesque diam volutpat. Feugiat in fermentum posuere urna nec tincidunt. Cursus in hac habitasse platea dictumst quisque sagittis. Urna condimentum mattis pellentesque id nibh. Eget felis eget nunc lobortis mattis aliquam faucibus. Massa sed elementum tempus egestas sed sed risus pretium quam. Ac turpis egestas maecenas pharetra convallis posuere morbi leo urna. Blandit turpis cursus in hac habitasse platea dictumst quisque sagittis. Risus pretium quam vulputate dignissim suspendisse in est. Proin fermentum leo vel orci porta non pulvinar neque laoreet. Risus nec feugiat in fermentum posuere. Natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Massa eget egestas purus viverra. Justo donec enim diam vulputate. Viverra maecenas accumsan lacus vel facilisis volutpat est velit egestas.\r\n\r\n', 'L\'écoute a un énorme pouvoir, par contre pas beaucoup en profitent. de gens ', 'communication.jpg', 12, 1, '2023-02-12 16:25:51', 1),
(3, 'Lecture rapide', 'Morbi quis commodo odio aenean. Consectetur purus ut faucibus pulvinar elementum integer enim neque. Id semper risus in hendrerit gravida rutrum quisque. Convallis tellus id interdum velit laoreet id donec. Aliquam ultrices sagittis orci a. Ut porttitor leo a diam sollicitudin. Pellentesque adipiscing commodo elit at imperdiet. Fermentum dui faucibus in ornare quam. Pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus et. Nulla facilisi morbi tempus iaculis urna id volutpat. Integer vitae justo eget magna fermentum iaculis eu. Aliquet risus feugiat in ante metus dictum at tempor commodo. Augue lacus viverra vitae congue eu consequat ac felis donec. Sit amet consectetur adipiscing elit. Id aliquet risus feugiat in. Arcu non odio euismod lacinia at quis. Adipiscing elit duis tristique sollicitudin nibh sit. Consequat interdum varius sit amet mattis vulputate enim nulla aliquet. Elementum curabitur vitae nunc sed.\r\n\r\nAmet cursus sit amet dictum sit. Egestas dui id ornare arcu. Integer enim neque volutpat ac tincidunt vitae semper quis. Commodo ullamcorper a lacus vestibulum sed. Vel pharetra vel turpis nunc eget lorem. Aliquam id diam maecenas ultricies mi eget mauris pharetra et. Nunc mattis enim ut tellus elementum sagittis vitae et. Nisl nunc mi ipsum faucibus vitae aliquet nec ullamcorper sit. Pulvinar neque laoreet suspendisse interdum consectetur libero id faucibus. Quis vel eros donec ac odio tempor. Vivamus arcu felis bibendum ut tristique. Purus non enim praesent elementum facilisis leo vel fringilla est. Arcu ac tortor dignissim convallis aenean et tortor at risus. Tortor at auctor urna nunc id cursus metus aliquam eleifend. Sed turpis tincidunt id aliquet risus feugiat in. Est ante in nibh mauris cursus mattis molestie a iaculis. Ac orci phasellus egestas tellus rutrum tellus pellentesque.', 'La lecture rapide, lire rapidement avec une bonne compréhension, qu\'est ce que la science dit', 'realtor.png', 12, 1, '2023-01-08 16:27:05', 1),
(4, 'L\'image des riches en Europe et en Amérique du nord', 'Sed lectus vestibulum mattis ullamcorper. In massa tempor nec feugiat nisl pretium. Ante metus dictum at tempor commodo. Tempus egestas sed sed risus pretium quam. Vitae proin sagittis nisl rhoncus mattis rhoncus urna neque. Amet justo donec enim diam vulputate ut pharetra sit amet. Neque sodales ut etiam sit. Risus viverra adipiscing at in tellus. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt. Eu lobortis elementum nibh tellus molestie nunc non. At quis risus sed vulputate odio ut enim. Tempor nec feugiat nisl pretium fusce id velit. Mauris pellentesque pulvinar pellentesque habitant morbi tristique. Varius sit amet mattis vulputate enim nulla. Amet mattis vulputate enim nulla aliquet porttitor lacus luctus. Facilisis gravida neque convallis a cras semper.\r\n\r\nLorem mollis aliquam ut porttitor leo a. Eu ultrices vitae auctor eu augue ut lectus. In aliquam sem fringilla ut morbi tincidunt augue interdum velit. At quis risus sed vulputate odio ut enim. Quam vulputate dignissim suspendisse in est ante. Sed sed risus pretium quam vulputate. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Pharetra magna ac placerat vestibulum. Vitae ultricies leo integer malesuada nunc vel risus commodo viverra. Velit aliquet sagittis id consectetur purus ut faucibus. Ornare massa eget egestas purus viverra. Nulla posuere sollicitudin aliquam ultrices sagittis orci a scelerisque purus.', 'Les riches ont une image controversée dans le monde,  il y en a qui pensent, qu\'ils doivent payer plus d\'impots  ', 'rich.png', 2, 5, '2023-03-20 16:28:44', 1),
(5, 'Le monde de l\'entreprenariat', 'Cursus in hac habitasse platea dictumst quisque sagittis purus sit. Ut tristique et egestas quis ipsum suspendisse ultrices. Arcu cursus vitae congue mauris. Congue eu consequat ac felis donec et odio pellentesque. Quam adipiscing vitae proin sagittis. Purus in mollis nunc sed id semper risus in hendrerit. Integer malesuada nunc vel risus commodo viverra maecenas. Blandit libero volutpat sed cras ornare arcu. Lorem mollis aliquam ut porttitor leo. Aliquet risus feugiat in ante metus. Neque convallis a cras semper auctor neque vitae tempus. Elementum integer enim neque volutpat ac tincidunt vitae. Cursus turpis massa tincidunt dui ut ornare. Eget mi proin sed libero. Ut tortor pretium viverra suspendisse potenti. Dignissim enim sit amet venenatis urna cursus eget. Id volutpat lacus laoreet non curabitur gravida arcu ac tortor. Neque sodales ut etiam sit amet nisl purus in. Ipsum dolor sit amet consectetur. Ullamcorper dignissim cras tincidunt lobortis feugiat.\r\n\r\nMolestie at elementum eu facilisis sed odio morbi quis commodo. Dolor magna eget est lorem ipsum. Vulputate ut pharetra sit amet aliquam id. Id volutpat lacus laoreet non curabitur gravida arcu ac. Varius vel pharetra vel turpis nunc. Rutrum quisque non tellus orci ac auctor. Lacus sed viverra tellus in hac habitasse. Elit pellentesque habitant morbi tristique senectus et netus et malesuada. Gravida cum sociis natoque penatibus et magnis dis parturient montes. Odio facilisis mauris sit amet massa. Consequat semper viverra nam libero justo. Magna eget est lorem ipsum. Tincidunt augue interdum velit euismod in pellentesque massa. Diam phasellus vestibulum lorem sed risus ultricies tristique. Dolor morbi non arcu risus quis varius quam quisque id. Venenatis urna cursus eget nunc scelerisque viverra mauris in aliquam', 'L\'entreprenariat passionne de plus en plus de personnes, notamment avec la liberté et le niveau de vie qu\'elle offre', 'entrepreunership.png', 1, 5, '2023-03-20 16:31:33', 1),
(6, 'PHP, Node.js or Django', 'At varius vel pharetra vel. Feugiat scelerisque varius morbi enim nunc faucibus a. Nec nam aliquam sem et. Mi bibendum neque egestas congue quisque egestas diam in. Dignissim enim sit amet venenatis urna cursus. Nisi scelerisque eu ultrices vitae auctor eu augue ut. Et netus et malesuada fames ac turpis. Lorem ipsum dolor sit amet consectetur. Tincidunt arcu non sodales neque sodales ut. Tempor orci dapibus ultrices in. Eget felis eget nunc lobortis mattis aliquam faucibus. Ullamcorper velit sed ullamcorper morbi. Arcu cursus euismod quis viverra. Nisl condimentum id venenatis a condimentum vitae sapien pellentesque. Dolor morbi non arcu risus quis varius. Consectetur libero id faucibus nisl tincidunt eget nullam non. Sodales ut eu sem integer. Consequat mauris nunc congue nisi vitae suscipit tellus. Vitae semper quis lectus nulla at.\r\n\r\nSed vulputate odio ut enim blandit volutpat maecenas. Feugiat nibh sed pulvinar proin gravida hendrerit. Purus semper eget duis at. Sit amet risus nullam eget felis. Aenean vel elit scelerisque mauris pellentesque. Ut porttitor leo a diam sollicitudin tempor id eu. Habitasse platea dictumst vestibulum rhoncus est. Nisl nisi scelerisque eu ultrices vitae auctor eu. Habitant morbi tristique senectus et netus et malesuada fames ac. Ullamcorper malesuada proin libero nunc consequat interdum. Eget aliquet nibh praesent tristique magna sit amet purus gravida. Aliquam sem fringilla ut morbi tincidunt augue. Adipiscing enim eu turpis egestas pretium aenean pharetra magna. Id interdum velit laoreet id donec ultrices tincidunt arcu. Eu volutpat odio facilisis mauris sit amet massa.', 'La programmation évolue de façon rapide, le backend par exemple connait aujourd\'hui une compétition entre PHP, Node.js et Django', 'programming.png', 1, 6, '2023-03-08 16:33:26', 1),
(7, 'Immigration', 'Tempor commodo ullamcorper a lacus vestibulum sed arcu non odio. Morbi leo urna molestie at elementum eu facilisis sed odio. Et malesuada fames ac turpis egestas maecenas pharetra convallis. Nunc sed velit dignissim sodales ut eu sem. Eros donec ac odio tempor orci dapibus ultrices. A cras semper auctor neque vitae. Nunc sed augue lacus viverra. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Neque sodales ut etiam sit. Praesent semper feugiat nibh sed pulvinar. Risus nec feugiat in fermentum. Id neque aliquam vestibulum morbi. Eget sit amet tellus cras adipiscing enim. Laoreet sit amet cursus sit amet. Vel eros donec ac odio tempor. Ante metus dictum at tempor. Pretium aenean pharetra magna ac placerat vestibulum lectus mauris. Tincidunt vitae semper quis lectus nulla at volutpat. Eu ultrices vitae auctor eu augue ut lectus arcu bibendum.', 'L\'immigration entre partisans et opposants', 'immigration.jpg', 1, 5, '2023-02-24 16:34:33', 1),
(8, 'Tennis', 'Tempor commodo ullamcorper a lacus vestibulum sed arcu non odio. Morbi leo urna molestie at elementum eu facilisis sed odio. Et malesuada fames ac turpis egestas maecenas pharetra convallis. Nunc sed velit dignissim sodales ut eu sem. Eros donec ac odio tempor orci dapibus ultrices. A cras semper auctor neque vitae. Nunc sed augue lacus viverra. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Neque sodales ut etiam sit. Praesent semper feugiat nibh sed pulvinar. Risus nec feugiat in fermentum. Id neque aliquam vestibulum morbi. Eget sit amet tellus cras adipiscing enim. Laoreet sit amet cursus sit amet. Vel eros donec ac odio tempor. Ante metus dictum at tempor. Pretium aenean pharetra magna ac placerat vestibulum lectus mauris. Tincidunt vitae semper quis lectus nulla at volutpat. Eu ultrices vitae auctor eu augue ut lectus arcu bibendum.', 'La popularité du tennis augmente', 'tennis.png', 12, 4, '2023-02-11 16:35:40', 1),
(9, 'L\'intelligence artificielle', 'Tempor commodo ullamcorper a lacus vestibulum sed arcu non odio. Morbi leo urna molestie at elementum eu facilisis sed odio. Et malesuada fames ac turpis egestas maecenas pharetra convallis. Nunc sed velit dignissim sodales ut eu sem. Eros donec ac odio tempor orci dapibus ultrices. A cras semper auctor neque vitae. Nunc sed augue lacus viverra. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Neque sodales ut etiam sit. Praesent semper feugiat nibh sed pulvinar. Risus nec feugiat in fermentum. Id neque aliquam vestibulum morbi. Eget sit amet tellus cras adipiscing enim. Laoreet sit amet cursus sit amet. Vel eros donec ac odio tempor. Ante metus dictum at tempor. Pretium aenean pharetra magna ac placerat vestibulum lectus mauris. Tincidunt vitae semper quis lectus nulla at volutpat. Eu ultrices vitae auctor eu augue ut lectus arcu bibendum.', 'L\'intelligence artificielle, danger ou solution', 'ai.jpg', 1, 1, '2023-03-26 16:36:50', 1),
(10, 'Les réseaux sociaux', 'Id consectetur purus ut faucibus pulvinar elementum integer. Volutpat lacus laoreet non curabitur gravida arcu ac. Eu non diam phasellus vestibulum lorem sed. Sem nulla pharetra diam sit amet nisl suscipit adipiscing. Turpis egestas integer eget aliquet nibh praesent. Facilisi etiam dignissim diam quis enim lobortis. Vitae suscipit tellus mauris a diam. Urna cursus eget nunc scelerisque viverra mauris. Sed felis eget velit aliquet sagittis id. Leo in vitae turpis massa sed elementum tempus egestas sed. Quam viverra orci sagittis eu volutpat odio. Urna neque viverra justo nec ultrices dui sapien eget. Enim nulla aliquet porttitor lacus luctus accumsan tortor posuere ac. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam vehicula. In arcu cursus euismod quis viverra nibh cras pulvinar. Eget lorem dolor sed viverra ipsum nunc. Maecenas volutpat blandit aliquam etiam erat. Imperdiet proin fermentum leo vel. Feugiat sed lectus vestibulum mattis ullamcorper velit sed ullamcorper.\r\n\r\n', 'L\'impact des réseaux sociaux sur les gens notamment les enfants', 'social_networks.jpg', 1, 1, '2023-03-21 16:37:42', 1),
(11, 'Agent immobilier', 'Id consectetur purus ut faucibus pulvinar elementum integer. Volutpat lacus laoreet non curabitur gravida arcu ac. Eu non diam phasellus vestibulum lorem sed. Sem nulla pharetra diam sit amet nisl suscipit adipiscing. Turpis egestas integer eget aliquet nibh praesent. Facilisi etiam dignissim diam quis enim lobortis. Vitae suscipit tellus mauris a diam. Urna cursus eget nunc scelerisque viverra mauris. Sed felis eget velit aliquet sagittis id. Leo in vitae turpis massa sed elementum tempus egestas sed. Quam viverra orci sagittis eu volutpat odio. Urna neque viverra justo nec ultrices dui sapien eget. Enim nulla aliquet porttitor lacus luctus accumsan tortor posuere ac. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam vehicula. In arcu cursus euismod quis viverra nibh cras pulvinar. Eget lorem dolor sed viverra ipsum nunc. Maecenas volutpat blandit aliquam etiam erat. Imperdiet proin fermentum leo vel. Feugiat sed lectus vestibulum mattis ullamcorper velit sed ullamcorper.\r\n\r\n', 'Le secteur d\'immobilier cherche au moins 100000 agent immobilier cette année', '3d850a57d83ca2959865bcdbaa31fc43.jpg', 2, 3, '2023-04-03 15:13:04', 1),
(12, 'Changement climatique', 'Eu ultrices vitae auctor eu augue ut lectus arcu bibendum.\r\n\r\nId consectetur purus ut faucibus pulvinar elementum integer. Volutpat lacus laoreet non curabitur gravida arcu ac. Eu non diam phasellus vestibulum lorem sed. Sem nulla pharetra diam sit amet nisl suscipit adipiscing. Turpis egestas integer eget aliquet nibh praesent. Facilisi etiam dignissim diam quis enim lobortis. Vitae suscipit tellus mauris a diam. Urna cursus eget nunc scelerisque viverra mauris. Sed felis eget velit aliquet sagittis id. Leo in vitae turpis massa sed elementum tempus egestas sed. Quam viverra orci sagittis eu volutpat odio. Urna neque viverra justo nec ultrices dui sapien eget. Enim nulla aliquet porttitor lacus luctus accumsan tortor posuere ac. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam vehicula. In arcu cursus euismod quis viverra nibh cras pulvinar. Eget lorem dolor sed viverra ipsum nunc. Maecenas volutpat blandit aliquam etiam erat. Imperdiet proin fermentum leo vel. Feugiat sed lectus vestibulum mattis ullamcorper velit sed ullamcorper.', 'Changement climatique, comment protéger la planète', NULL, 2, 2, '2023-03-27 16:40:36', 1),
(13, 'Séisme et volcan', 'At varius vel pharetra vel. Feugiat scelerisque varius morbi enim nunc faucibus a. Nec nam aliquam sem et. Mi bibendum neque egestas congue quisque egestas diam in. Dignissim enim sit amet venenatis urna cursus. Nisi scelerisque eu ultrices vitae auctor eu augue ut. Et netus et malesuada fames ac turpis. Lorem ipsum dolor sit amet consectetur. Tincidunt arcu non sodales neque sodales ut. Tempor orci dapibus ultrices in. Eget felis eget nunc lobortis mattis aliquam faucibus. Ullamcorper velit sed ullamcorper morbi. Arcu cursus euismod quis viverra. Nisl condimentum id venenatis a condimentum vitae sapien pellentesque. Dolor morbi non arcu risus quis varius. Consectetur libero id faucibus nisl tincidunt eget nullam non. Sodales ut eu sem integer. Consequat mauris nunc congue nisi vitae suscipit tellus. Vitae semper quis lectus nulla at.\r\n\r\nSed vulputate odio ut enim blandit volutpat maecenas. Feugiat nibh sed pulvinar proin gravida hendrerit. Purus semper eget duis at. Sit amet risus nullam eget felis. Aenean vel elit scelerisque mauris pellentesque. Ut porttitor leo a diam sollicitudin tempor id eu. Habitasse platea dictumst vestibulum rhoncus est. Nisl nisi scelerisque eu ultrices vitae auctor eu. Habitant morbi tristique senectus et netus et malesuada fames ac. Ullamcorper malesuada proin libero nunc consequat interdum. Eget aliquet nibh praesent tristique magna sit amet purus gravida. Aliquam sem fringilla ut morbi tincidunt augue. Adipiscing enim eu turpis egestas pretium aenean pharetra magna. Id interdum velit laoreet id donec ultrices tincidunt arcu. Eu volutpat odio facilisis mauris sit amet massa.', 'Les catastrophes naturelles et leurs causes', NULL, 2, 2, '2023-03-14 16:41:31', 1),
(14, 'L\'apprentissage des langues étrangères', 'At varius vel pharetra vel. Feugiat scelerisque varius morbi enim nunc faucibus a. Nec nam aliquam sem et. Mi bibendum neque egestas congue quisque egestas diam in. Dignissim enim sit amet venenatis urna cursus. Nisi scelerisque eu ultrices vitae auctor eu augue ut. Et netus et malesuada fames ac turpis. Lorem ipsum dolor sit amet consectetur. Tincidunt arcu non sodales neque sodales ut. Tempor orci dapibus ultrices in. Eget felis eget nunc lobortis mattis aliquam faucibus. Ullamcorper velit sed ullamcorper morbi. Arcu cursus euismod quis viverra. Nisl condimentum id venenatis a condimentum vitae sapien pellentesque. Dolor morbi non arcu risus quis varius. Consectetur libero id faucibus nisl tincidunt eget nullam non. Sodales ut eu sem integer. Consequat mauris nunc congue nisi vitae suscipit tellus. Vitae semper quis lectus nulla at.\r\n\r\nSed vulputate odio ut enim blandit volutpat maecenas. Feugiat nibh sed pulvinar proin gravida hendrerit. Purus semper eget duis at. Sit amet risus nullam eget felis. Aenean vel elit scelerisque mauris pellentesque. Ut porttitor leo a diam sollicitudin tempor id eu. Habitasse platea dictumst vestibulum rhoncus est. Nisl nisi scelerisque eu ultrices vitae auctor eu. Habitant morbi tristique senectus et netus et malesuada fames ac. Ullamcorper malesuada proin libero nunc consequat interdum. Eget aliquet nibh praesent tristique magna sit amet purus gravida. Aliquam sem fringilla ut morbi tincidunt augue. Adipiscing enim eu turpis egestas pretium aenean pharetra magna. Id interdum velit laoreet id donec ultrices tincidunt arcu. Eu volutpat odio facilisis mauris sit amet massa.', 'Les langues étrangères sont indispensables ', 'ccbb35382d9e5d79f860aeb2ed689c38.png', 13, 1, '2023-04-03 18:01:12', 1),
(15, 'Le risque de la sous-population dans les siècles à venir', 'Sed vulputate odio ut enim blandit volutpat maecenas. Feugiat nibh sed pulvinar proin gravida hendrerit. Purus semper eget duis at. Sit amet risus nullam eget felis. Aenean vel elit scelerisque mauris pellentesque. Ut porttitor leo a diam sollicitudin tempor id eu. Habitasse platea dictumst vestibulum rhoncus est. Nisl nisi scelerisque eu ultrices vitae auctor eu. Habitant morbi tristique senectus et netus et malesuada fames ac. Ullamcorper malesuada proin libero nunc consequat interdum. Eget aliquet nibh praesent tristique magna sit amet purus gravida. Aliquam sem fringilla ut morbi tincidunt augue. Adipiscing enim eu turpis egestas pretium aenean pharetra magna. Id interdum velit laoreet id donec ultrices tincidunt arcu. Eu volutpat odio facilisis mauris sit amet massa.\r\n\r\nTempor commodo ullamcorper a lacus vestibulum sed arcu non odio. Morbi leo urna molestie at elementum eu facilisis sed odio. Et malesuada fames ac turpis egestas maecenas pharetra convallis', 'La sous-population et son risque dans les siècles à venir', '16191144ca3ae5e597dcb764e7f9ff27.jpg', 13, 5, '2023-03-31 17:39:36', 1),
(16, 'L\'intelligence émotionnelle', 'Tempor commodo ullamcorper a lacus vestibulum sed arcu non odio. Morbi leo urna molestie at elementum eu facilisis sed odio. Et malesuada fames ac turpis egestas maecenas pharetra convallis. Nunc sed velit dignissim sodales ut eu sem. Eros donec ac odio tempor orci dapibus ultrices. A cras semper auctor neque vitae. Nunc sed augue lacus viverra. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Neque sodales ut etiam sit. Praesent semper feugiat nibh sed pulvinar. Risus nec feugiat in fermentum. Id neque aliquam vestibulum morbi. Eget sit amet tellus cras adipiscing enim. Laoreet sit amet cursus sit amet. Vel eros donec ac odio tempor. Ante metus dictum at tempor. Pretium aenean pharetra magna ac placerat vestibulum lectus mauris. Tincidunt vitae semper quis lectus nulla at volutpat. Eu ultrices vitae auctor eu augue ut lectus arcu bibendum.\r\n\r\nId consectetur purus ut faucibus pulvinar elementum integer. Volutpat lacus laoreet non curabitur gravida arcu ac. Eu non diam phasellus vestibulum lorem sed. Sem nulla pharetra diam sit amet nisl suscipit adipiscing. Turpis egestas integer eget aliquet nibh praesent. Facilisi etiam dignissim diam quis enim lobortis. Vitae suscipit tellus mauris a diam. Urna cursus eget nunc scelerisque viverra mauris. Sed felis eget velit aliquet sagittis id. Leo in vitae turpis massa sed elementum tempus egestas sed. Quam viverra orci sagittis eu volutpat odio. Urna neque viverra justo nec ultrices dui sapien eget. Enim nulla aliquet porttitor lacus luctus accumsan tortor posuere ac. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam vehicula. In arcu cursus euismod quis viverra nibh cras pulvinar. Eget lorem dolor sed viverra ipsum nunc. Maecenas volutpat blandit aliquam etiam erat. Imperdiet proin fermentum leo vel. Feugiat sed lectus vestibulum mattis ullamcorper velit sed ullamcorper.', 'L\'intelligence émotionnelle et sa place ', NULL, 13, 1, '2023-03-19 16:45:57', 1),
(17, 'L\'impact des produits ultra-traités sur la santé mentale', 'Sed vulputate odio ut enim blandit volutpat maecenas. Feugiat nibh sed pulvinar proin gravida hendrerit. Purus semper eget duis at. Sit amet risus nullam eget felis. Aenean vel elit scelerisque mauris pellentesque. Ut porttitor leo a diam sollicitudin tempor id eu. Habitasse platea dictumst vestibulum rhoncus est. Nisl nisi scelerisque eu ultrices vitae auctor eu. Habitant morbi tristique senectus et netus et malesuada fames ac. Ullamcorper malesuada proin libero nunc consequat interdum. Eget aliquet nibh praesent tristique magna sit amet purus gravida. Aliquam sem fringilla ut morbi tincidunt augue. Adipiscing enim eu turpis egestas pretium aenean pharetra magna. Id interdum velit laoreet id donec ultrices tincidunt arcu. Eu volutpat odio facilisis mauris sit amet massa.', 'Les produits ultra-traités, quel problème pose pour notre santé', NULL, 13, 1, '2023-03-20 16:47:14', 1),
(18, 'L\'importance de la communication', 'Sed vulputate odio ut enim blandit volutpat maecenas. Feugiat nibh sed pulvinar proin gravida hendrerit. Purus semper eget duis at. Sit amet risus nullam eget felis. Aenean vel elit scelerisque mauris pellentesque. Ut porttitor leo a diam sollicitudin tempor id eu. Habitasse platea dictumst vestibulum rhoncus est. Nisl nisi scelerisque eu ultrices vitae auctor eu. Habitant morbi tristique senectus et netus et malesuada fames ac. Ullamcorper malesuada proin libero nunc consequat interdum. Eget aliquet nibh praesent tristique magna sit amet purus gravida. Aliquam sem fringilla ut morbi tincidunt augue. Adipiscing enim eu turpis egestas pretium aenean pharetra magna. Id interdum velit laoreet id donec ultrices tincidunt arcu. Eu volutpat odio facilisis mauris sit amet massa.', 'La communication et sa place dans notre vie professionnelle ainsi que notre vie privée', 'eb76995068fe180abf62c4b3597a4460.jpg', 13, 1, '2023-04-03 17:57:19', 1),
(19, 'La réforme des retraites', 'Sed vulputate odio ut enim blandit volutpat maecenas. Feugiat nibh sed pulvinar proin gravida hendrerit. Purus semper eget duis at. Sit amet risus nullam eget felis. Aenean vel elit scelerisque mauris pellentesque. Ut porttitor leo a diam sollicitudin tempor id eu. Habitasse platea dictumst vestibulum rhoncus est. Nisl nisi scelerisque eu ultrices vitae auctor eu. Habitant morbi tristique senectus et netus et malesuada fames ac. Ullamcorper malesuada proin libero nunc consequat interdum. Eget aliquet nibh praesent tristique magna sit amet purus gravida. Aliquam sem fringilla ut morbi tincidunt augue. Adipiscing enim eu turpis egestas pretium aenean pharetra magna. Id interdum velit laoreet id donec ultrices tincidunt arcu. Eu volutpat odio facilisis mauris sit amet massa.', 'Faut-il décaler l\'âge de la retraite à  64 ans', 'e7f4f8bd246c235418280d1f124e14f0.png', 2, 5, '2023-04-03 15:11:49', 1),
(55, 'etet', 'ssssssss qqqqqqqqqq', 'dddd', NULL, 19, 3, '2023-05-17 18:16:26', 1),
(60, 'test', 'cnieiei ejy', 'test chapo', NULL, 15, 6, '2023-05-25 23:20:05', 1),
(69, 'kjh', 'kjhbv', 'nb', NULL, 43, 6, '2023-11-09 16:37:05', 1),
(70, 'lsdkj', 'skd kszdezfjh', 'skdj', '8c09001c99ecb6fdd8d6023fcf039054.jpg', 44, 4, '2023-11-09 16:45:29', 1),
(71, 'lkzdejf ', 'kzejz', 'szkadezfjn', NULL, 45, 5, '2023-11-09 16:47:21', 1);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(3, 'Emplois'),
(2, 'Nature'),
(5, 'Politique'),
(6, 'Programmation'),
(1, 'Science & technologie'),
(4, 'Sports');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `published_at` datetime NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `article_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `content`, `published_at`, `published`, `article_id`, `user_id`) VALUES
(28, 'ohuilgyuvcf bhjgf,g', '2023-05-01 23:14:09', 1, 4, 17),
(30, 'Les langues sont indispensables aujourd\'hui.', '2023-05-03 00:09:43', 1, 14, 18),
(31, 'Il faut les apprendre', '2023-05-03 00:10:04', 1, 14, 18),
(59, 'ffff dddddd sss', '2023-05-14 17:43:41', 1, 14, 19),
(65, 'jjj', '2023-05-17 18:12:33', 0, 11, 19),
(67, 'On verra ça par la suite', '2023-05-22 10:38:11', 1, 14, 14),
(74, '    lzekrj kerjzhh m;zlae:bzrek kkkkk? MMDZMEPPE', '2023-05-25 08:59:11', 0, 18, 15),
(76, 'oui bien sur', '2023-11-07 15:04:23', 0, 14, 43),
(77, 'ozeih sjdh', '2023-11-08 13:06:03', 0, 60, 43),
(79, '    ok !', '2023-11-09 16:48:54', 1, 71, 44),
(80, 'On verra', '2023-11-09 16:49:28', 1, 71, 45);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','member','pending') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'oussama', 'oussama@gmail.com', '7897aze', 'member'),
(2, 'Veronique', 'veronique@yahoo.fr', 'ver7921', 'member'),
(12, 'oussama', 'oussama231se@gmail.com', '$2y$10$aCuQWGqUT5ks7gtJmavOEuJFMkEuAhsO4tHtyVS8ppW898.p531YS', 'pending'),
(13, 'test4', 'test4@gmail.com', '$2y$10$X6RcSNAaOAqe1T55Bmh5Qu3teu9/BpfiPNbN6dJgCufdvZkzU3VZu', 'member'),
(14, 'test2', 'test@test.fr', '$2y$10$3mq161wmkaa5Qev8DZbNHube0GkeZF8f9ZVm0oVNhaz4.PkhAG3.6', 'member'),
(15, 'man', 'man@yahoo.fr', '$2y$10$xDxNWGwOA/B0uzGSMF8NYO5zAxyr4kndizwAFR6/ei5zsw36HCmAu', 'admin'),
(17, 'oussama 29', 'oussamabel@gmail.com', '$2y$10$.MdcHjKJVfAGlanOlH/isO9Ziqyi5Iw7ocKcZ/0w08K.1KifeXCtS', 'member'),
(18, 'Juliette Manou', 'juliette@gmail.com', '$2y$10$8yd/vHNKfsPKgIRpfhNPEO2Qk2nviORgcdnl5tkrfqu9x7Uyfkgsu', 'admin'),
(19, 'Juliette Manou', 'juliette.m@gmail.com', '$2y$10$6PKhiBkL4VklqaW1D7tb2ejlTl2fVjUKPxaByID6sno5g.Oq6vdAq', 'member'),
(20, 'yann', 'yann@gmail.com', '$2y$10$EsAoPAbE9t.CllkL/8tD..DkrU7s1S9CHdE5p1.epAJFyRtoX.aia', 'member'),
(38, 'oussama', 'test.oussama@gmail.com', '$2y$10$.zSloqzH8hhE5Gry4Q5ma.ROePwtCW7iQxfNRcwaeqlDA0pebWsJO', 'pending'),
(39, 'oussama', 'testst@gmail.com', '$2y$10$bXInJ6urDQ0y3ddmpt74AuerNhNhWojSwipObUstrFEbVDeR4OMZu', 'member'),
(41, 'Oussama Belfarhi', 'oussamabelfarhi1978@gmail.com', '$2y$10$uFfbg2oAkw9uBd82I1gQzeFX6qirEahbFTDfapM4vWCINQ4b64bfC', 'pending'),
(43, 'steve.b@gmail.com', 'steve.b@gmail.com', '$2y$10$MVSdvqR.oGGNaadFCkRUAef5jskJS9F3S4f6KK7dG.FiEBw0CNZbm', 'admin'),
(44, 'admin', 'admin@phpblog.fr', '$2y$10$anB08KYRXWuVDbTmcoaiU.6V2S4yTR5vHPZek/LR7MtQXsI/Wj9JW', 'admin'),
(45, 'user', 'user@phpblog.fr', '$2y$10$jpS.mhIRZf0B/cifPgF3EO7Yx9PJ0/XvS1ki4YOg5S9Z3f6X02ll6', 'member');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
