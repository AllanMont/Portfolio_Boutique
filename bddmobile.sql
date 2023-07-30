-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.4.22-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour boutique_mobile
CREATE DATABASE IF NOT EXISTS `boutique_mobile` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `boutique_mobile`;

-- Listage de la structure de la table boutique_mobile. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelleCat` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table boutique_mobile.categorie : ~2 rows (environ)
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT IGNORE INTO `categorie` (`id`, `libelleCat`) VALUES
	(1, 'Téléphones'),
	(2, 'Chargeurs');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Listage de la structure de la table boutique_mobile. marque
CREATE TABLE IF NOT EXISTS `marque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelleMarque` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table boutique_mobile.marque : ~3 rows (environ)
/*!40000 ALTER TABLE `marque` DISABLE KEYS */;
INSERT IGNORE INTO `marque` (`id`, `libelleMarque`) VALUES
	(1, 'Apple'),
	(2, 'Samsung'),
	(3, 'Xiaomi');
/*!40000 ALTER TABLE `marque` ENABLE KEYS */;

-- Listage de la structure de la table boutique_mobile. produit
CREATE TABLE IF NOT EXISTS `produit` (
  `idProd` int(11) NOT NULL AUTO_INCREMENT,
  `modele` varchar(50) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `dateSortie` year(4) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `idMarque` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`idProd`) USING BTREE,
  KEY `idCategorie` (`idCategorie`),
  KEY `idMarque` (`idMarque`),
  CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`),
  CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`idMarque`) REFERENCES `marque` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

-- Listage des données de la table boutique_mobile.produit : ~12 rows (environ)
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT IGNORE INTO `produit` (`idProd`, `modele`, `description`, `dateSortie`, `prix`, `image`, `idMarque`, `idCategorie`) VALUES
	(1, 'iPhone 13 Pro Max', NULL, '2021', 1259, 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/iphone-13-pro-max-family-select?', 1, 1),
	(2, 'iPhone 13 Pro', NULL, '2021', 1159, 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/iphone-13-pro-family-select?wid=', 1, 1),
	(3, 'iPhone 13 ', NULL, '2021', 909, 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/iphone-13-family-select?wid=940&', 1, 1),
	(4, 'iPhone 13 Mini', NULL, '2021', 809, 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/iphone-13-mini-family-select?wid', 1, 1),
	(5, 'iPhone 12 Mini', NULL, '2021', 809, 'data:image/jpeg;base64,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', 1, 1),
	(6, 'iPhone 12', NULL, '2021', 689, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxAQDg8ODxANDxANDw4PDw0OEA8PDQ0NFREXFhURFRUYHiogGBolGxUVITEhJSkrLjAuFx8zODMsQyguLisBCgoKDg0OFxAQFisZHR0rKystMSsrNystLSsrKystKystKzArLSstOCstLSstKy8tOC8zLSsrNystLC0tNy0tLf/AABEIAOEA4QMBIgACEQEDEQH/xAAcAAEAAgIDAQAAAAAAAAAAAAAAAQUEBgIDBwj/xABIEAACAQICBAYOBgkEAwAAAAAAAQIDBAUREiExUQZBYXGBsgcTFyIzNXJzdJGTsbPRMkJSU6HBFCMkQ2SCkqLwVGKj0hWDwv/EABgBAQEBAQEAAAAAAAAAAAAAAAACAQME/8QAIREBAAIDAAICAwEAAAAAAAAAAAECAxExEjIhURNBQiL/2gAMAwEAAhEDEQA/APcQAAAAGHi2KUbSjO4uKkadKmtcpb+JJbW3uR5LjXZnquUo2NvTjBPJVLhuU5LfoxeUfWyn7NfCGde//Q4yfabNJaK2SryWcpPmzUeh7zQY00lnJtc21mxA3qXZXxVvPtlFLcqMPzOHdUxb76l7Cl8jS8o/Y/uefvOdONN/V6M5fM0bg+ypi/31L2FL5Ed1XF/vqXsKXyNV7RT+z/dL5nCpb5LOObXHF62ub5Abb3VcX++pewpfIjuq4v8AfUvYUvkaa1/m8gNbn3VcX++pewpfIjuq4v8Af0vYUvkaaQBundVxf76l7Cl8jlHsr4tx1ab/APTSX/yaSANyuey3i8U5RnRmlra7VTU4rfllrRg923FvtUfZ0/8Aqa09WtcRW3WH1NNulQnOEtacITkk3tjq3PP8DNMbv3bcW+1R9nT/AOo7tuLfao+zp/8AU0Snh1dZ521d5ppfqqmrm1HX/wCKuf8AT3HsqnyA9DodmbGaktGmoTk/qwowlLLmUTK7q2PrX2ierbna6n/YYvYqwStb1at3WhKlpUnRpwmnGck5RlKTi9aXepLfmemRuuUuKbhjTMJ7O1zCooXtrTlFNKWhpUqsfXmujI9k4McJLXEaCuLWelHUpweSqUpfZkvz2M0TF8Nt7ym6VzShUi1qk0u2Qe+MtsWeccDr2rgePK2lNuhUnGnJvVGpb1Poza3rPPni0ZaumvpkAEAAAAAAAAAAAPljhfUcsWvpP/V3L9VST/IpcQeWiv8Ado+pFvwreeKX3pN11pFdd0dNNcr59u1FDFaWhnp98su9yezn/wA2HZZVG8s+Jtc6Mf8ARp7HJ5eT33rM60oaOXJsRsztkMmTeWrf+B2wZdcHeDFS8jKanGnGLaTacnKWWeWXSitv7KdCtKjPLShxrY01mmidt0rZr8HJdGk8vwOORzntflS95xNa45DI5ZEZAcQcsgBxZvPY9s41aFbSqOGhUWSSTTzT5eQ0dm08DrxwpVF/uX5l06yW8PBl9WuumGXukdUsKrL6Mqc+aTT/ABWX4lasUe87YYu9528U7dtVVaf04TivtZZx9a1E07zlO2jjPKc5uhV+lFRk/rw72XyfSPCTZTuzznskNf8AkrSa2ypQi+irL5m918PnHvqb7bHctVRdHH0eo864b1W76z3xjFa+J9tZzyR8Nh9T2c9KlTk9soQb53FHcY+H+Ao+ap9VGQcGgAAAAAAAAAA+VOFXjS+9Ku+vIr7uuoJt737zP4VeNL7lu7leupJFNisc4J7pKT5mih0xvZN7NXPrLC3rZ5cuxlZ22Oj9XUslqWlnnnn+RlWCeS52+gSNy4N8KatlGcIwhUhN56Mm04yyyzTXMisv76dxWnWqZaU3sj9GKSySRho7Imabtjy4/Kl7yCc+Pe5Pocnl+GRBoggkgAQSQBDLbA6uUZLlT95UszsNllFlU6yV128fpBXuqR209G0rSN0d9K+a4yk7cclWLiyZbVa4q1xmn9kK4VS/s5as9CCb43+te0y4XBQcJKmld2vIoL/kJza8CvX1nh3gKPmqfVRkGPh3gKPmqfVRkHidAAAAAAAAAAAfKPC/xnfel3HxJFcqqaylnzrajvxuvKpdV6svpVakqkstS0pd8/xZhFNSrelnnnH+mRlUpQj9b8JfIxQGLBVo73/TL5CVXPUk0ntk9Ta3JfmdVOWaOQE5/wCbkQCA0IBAEkAgAy84OYRK5hU7XOEZ03F6M81GSef1lsercUTNq4D1tFVeXQ98iqdZKuxCyrUJaNanKDexvXGXkyWp9Bh9sPUFVhUg6dSMakJbYTSlF9DNVx/gk4p1rPSnBa5W7zlUgt8H9Zcm3nO2tJaz2wKoY2mNMRIzI1SoxaWd1b88OuZimV1487q38qHXMyT/AJZHX2Bh3gKPmqfVRkFbwaryqWFnUl9Kpa285Zau+dOLZZHmWAAAAAAAAAAD5CxLw0+de5GOd+JeGnzr3IxympJOJIHdQlry3nfmYafGZSYHIggACAQBJBAAM2DgxPKM3va/M15mw8F7SpVjPtcdLRabWlGO3Pe+QvH7QyeNloXBaWt0UMrerT1zpzivtZZx9a1Hfb1j0zCHXwt4NqtGV1bR/WpOVWlFeGXHOK+3ycfPt8/Uz1yyudms03h7gipTV5SWVKvLKrFLVSrvXpckZa+nPejnMaa1bSMKu/2m38uHXMjMxZv9poeXDrkX4Q+tuCHiyw9DtfhRLcqOCHiyw9DtfhRLc4KAAAAAAAAAAB8j4/buleXFFtN0as6ba2Nwejn+BgFtww8Z3/pdz8SRUlNSCABJ30Zastx0HKnLJgZOZGZGZzq0JwUXKLip5uOerNLLi6UBwzIzIzIzA5ZjM4gCWzaeBVfQjU5dH3yNUZe8HqmUJcr+Z0xe0Jtx6Bb3/KTWsaVXXHKnPfFd63yr80a/b3BaWtyevrm4RjKnPQmsmvU1vT40WMqELijUt6muFaLi98XxSXKnk1yo7alNVoaLy0lrhLc93MzDs5tPJ6mnk09qZFobEvJ7y2nRq1KNRZTpTlCW5tPLNcj2rkZgSf7RQf8Avh1zduyTZKNzSuEtVzTylkv3tPJNvni4f0s0efh6PlQ6x578VD7B4O27pWVpSbTdK2oQbWxuNNLMsDHw7wFHzVPqoyDioAAAAAAAAAAHybww8Z3/AKXc/EZUltwv8Z3/AKZc/FkVJTUggASTCLbyRxMm12PnAscOsJ5wq6MasYy76EZJSzWzPSyWWwzcUsLitLTfa+9WUaSk20udrJs6cEudGbg9k9nlL/GWWJ1pRo1JR2pbVtWbSb9WYY1SSybT1NamntTIzIzGYE5jM4gNS2WmEzyh0/mVLLHD33vr95eP2Tbi9oVS0tqxQUZllbTPVEobRY1taOy/hlUjNbKi1+UtT/IrbGpsLW/edKD3TS6HF/JFSxQdkCjp4cqnHQr0pfyyTpteuUfUeWy8PR8qHWPXeE0dLDLtPihCXTGrCX5HkT8PR8qHWPNk4uH2Th3gKPmqfVRkGPh3gKPmqfVRkHnUAAAAAAAAAAD5M4X+M7/0y5+KyqLXhf4zv/TLn4jKopoAAB2UZZat51gDLp1XFprammjZ4VoyhpPLRlHN57MsteZp2kzvjdT0O16T0fs6veGFdxcpOCyjm9Fa9h1kANSCCAJZYWD7xdPvK4sLD6C6feXj9k24saTLC2ZXUiwtkeqIQu7B60W99L9TBb6ifQov5oq8NhrRl39XOpGC2U1r8p63+RcwljcJamjhl23xwhHplVhH8zyN+Ho+VDrHp3DuvoYcocdevSj/ACxTqN+uMfWeY/v6PlQ6x5crpD7Kw7wFHzVPqoyDHw7wFHzVPqoyDzqAAAAAAAAAAB8mcMPGd/6Zc/EZUltww8Z3/pdz8RlSU1IIAEggASEQAOZBGYAkEACWWWHrvF0+8rC4wiGcFzv3s6Yo3aE24zaMS0tKR0W1uZ0bmFPZ30ty+iudnuiunLazjWVGGlq0nqhHe9/MjhYxbeb1tvNvjbK2nKU5aUnm3+C3It6dWFClOvU1Qoxc3ve6K5W8kucWIal2Rr3SuKVunqtqecsn+9qZPJ80VD+o039/R8uHWMu8upVqtStU1zqzlOW5NvPJci2LkRiLw9Hy4dY8WTjpD7Kw7wFHzVPqoyDHw7wFHzVPqoyDgoAAAAAAAAAAHyZww8Z3/plz8RlSW3DHxnf+mXPxGVBQkEACQQAJBAAkEACQQAJLnB5tU9W97t7KUvMEjnT6X72dcHvCbcWClJ7W3ycRkUaYo0S1srNvLUe9ydmH2zbWo1rhxjSqSVnSedOjLOrJPVUrrVo8qj789yLHhRwgVCMrW3lnWacatWL8AuOMX9v3c+zQ0jhkvv4hUQHUvD0fLh1jtOpeHo+XDrHnvxcPsrDvAUfNU+qjIMfD/AUfNU+qjIOCgAAAAAAAAAAfJfDHxnf+mXPxGVBb8MfGd/6Zc/EZUFNSQAAAAEggBiSAA0AAA2ngpQ06b5H+bNWZeYNj07Wg406dOU6jbU6jbjDJv6q27d51xTq0Sm3G6wtI04OpUlGnCOuU5tRiulmtY5wtzTo2elCL1SuXnGpNcagtsFyvXzGv4jiNa4lpVqkqjX0U9UIeTFal0GJkdrZJniIq4sg5DIhqMjp/f0fLh1jvyOlr9fR8uHWJvxsdfZOH+Ao+ap9VGQY+H+Ao+ap9VGQedQAAAAAAAAAAPkvhj4zv/TLn4jKgtuGPjO/9MufiyKgpqQQAJBAAkEACQQAJIAAHf9SH83vOgyqa7yP83vLp1k8dWRGR26A0Dv4ue3TkNE7lA5xplRWTbpjAx60crih5UOuWlOgYOIRSuaC3OGfJ35mXHqmys/L7Aw/wFLzVPqoyDHw/wFHzVPqoyDxOgAAAAAAAAAAPkvhmssUv/S7h/wDJIpy84c03HFcQi/8AV3Hq7YyjKaAAAAAAAAAAAAADLKzpZ04vyveVhZWuIRo04pw03LOX0tHJaTW7kO2HXnHl8Qm/Hd+jhWzOuWObqMVzzb/JHRPF6r2KnHyY5v8AHM93lij97cdSz42p1VK9KH1lJ/Zh3z9ewralWpP6cpS5G9Xq2HKnRJnNH8w3x+3fUvJS1RWguT6T6TAqw/aKC3yh1izpUTDvoftVCPkP+9/I8+aZmu5VXr6/w/wFHzVPqoyDqtIaNOnF7YwgnzqKR2njdAAAAAAAAAAAfP8A2cuDc6N9+nwi3RvFHSktkK8Y5OL3ZpKXL3248yPsPEsPo3NGdC4pxq0qiylCWx8vI1xNa0eRcIewn30p2NfvW81RrpJx5NNbfUbEjxkHoz7DWJ77f2iI7jWKfw/tEa150D0XuNYp/D+0Q7jWKb7f2iA86B6L3GsU/h/aIdxrFN9v7RAedA9F7jOKb7b2iHcaxT+H9ogPOgejdxrE/wCH9oiY9hrE+PtHRUQHnUIOTSW1/wCZnO41y1fRilGPKlx9LzfSeh1uw3iji4xdvCL+llNSnLkct3IYvcPxP7yj/WvmVW2kz8tDVI7YUjd+4fif3lH+tfMnuIYn95R/rRf5Y+meLTqdAyqVA2fuI4p95R9oO4jin3lH2hv5o+meLW61enSWc5Jf7dsnzIz+xhgFTFMXp1XF9ooTjVqvLvY04vvYZ73ll0t8TNrwPsD1HJO8uIwinrjSWnKS3ZvJL8T2Tg7wftsPoK3taapwWuT2zqS+1KXG/wDERfJNlRGloADk0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAf/2Q==', 1, 1),
	(101, 'Chargeur iPhone', NULL, '2020', 10, 'https://www.cdiscount.com/pdt2/5/3/5/1/700x700/auc2009273101535/rw/chargeur-compatible-iphone-5-5s-5c-6-6plus-7-8-x-b.jpg?cid=affil&cm_mmc=AFF!PRO!1395028632!effinity&eff_cpt=22761500&eff_sub1=at107574_a159935_m4_p104562_t3_cFR_s62d213b6-a3cf-4b1b-81ee-7d6a5590e59a', 1, 2),
	(103, 'S20', NULL, '2021', 1159, 'data:image/jpeg;base64,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', 2, 1),
	(105, 'Chargeur USB-C', NULL, '2017', 15, 'data:image/jpeg;base64,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', 2, 2),
	(106, 'S10', NULL, '2019', 359, 'https://c0.lestechnophiles.com/images.frandroid.com/wp-content/uploads/2019/04/samsung-galaxy-s10-2019-frandroid.png?resize=580,580', 2, 1),
	(107, 'Redmi Note 11 Pro+ 5G', 'Changez votre quotidien en chargeant votre appareil à 100 % en seulement 15 minutes en mode Boost* grâce à l\'HyperCharge 120W ultra-rapide du Redmi Note 11 Pro+ 5G', '2022', 399, 'https://i01.appmifile.com/v1/MI_18455B3E4DA706226CF7535A58E875F0267/pms_1648185727.57438794.png', 3, 1),
	(108, '12', 'Le Xiaomi 12 introduit une toute nouvelle technologie de mise au point avec un algorithme d\'apprentissage et de suivi du sujet. Xiaomi ProFocus permet de capturer des sujets en mouvement avec un rendu plus net.', '2021', 899, 'https://i01.appmifile.com/v1/MI_18455B3E4DA706226CF7535A58E875F0267/pms_1647248367.2613235.png', 3, 1),
	(109, 'Mi 65W Fast Charger with GaN Tech', 'Technologie de nitrure de gallium froid, charge rapide de 65 W MAX haute puissance', '2022', 49.99, 'https://i01.appmifile.com/v1/MI_18455B3E4DA706226CF7535A58E875F0267/pms_1609833679.21053769.png', 3, 2);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;

-- Listage de la structure de la table boutique_mobile. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `passe` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Listage des données de la table boutique_mobile.utilisateur : ~4 rows (environ)
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT IGNORE INTO `utilisateur` (`id`, `login`, `passe`, `email`, `isAdmin`) VALUES
	(3, 'allantest2', 'c33db5db21499e43736ef303fc1e4aeb1905a6be', 'allan.mont34480@gmail.com', 0),
	(5, 'allan3434', 'c33db5db21499e43736ef303fc1e4aeb1905a6be', 'allantop34480@hotmail.com', 0),
	(6, 'allan', 'c33db5db21499e43736ef303fc1e4aeb1905a6be', 'allan.mont34@gmail.com', 1),
	(7, 'admin', '19a1187b6f975c11d0b3faaa601120752836ed7c', 'admin@gmail.com', 1);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
