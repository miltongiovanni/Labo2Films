
-- -----------------------------------------------------
-- Schema bdfilms
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `bdfilms` ;

-- -----------------------------------------------------
-- Schema bdfilms
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bdfilms` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `bdfilms` ;

-- -----------------------------------------------------
-- Table `bdfilms`.`catFilms`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfilms`.`catFilms` ;

CREATE TABLE IF NOT EXISTS `bdfilms`.`catFilms` (
  `idCatFilm` INT NOT NULL AUTO_INCREMENT,
  `catFilm` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idCatFilm`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfilms`.`films`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfilms`.`films` ;

CREATE TABLE IF NOT EXISTS `bdfilms`.`films` (
  `idFilm` INT NOT NULL AUTO_INCREMENT,
  `titreFilm` VARCHAR(60) NOT NULL,
  `idCatFilm` INT NOT NULL,
  `resFilm` VARCHAR(45) NULL,
  `pochetteFilm` VARCHAR(60) NULL,
  `dureeFilm` TIME NULL,
  `urlFilm` VARCHAR(255) NULL,
  `pubFilm` DATE NULL,
  `descFilm` MEDIUMTEXT NULL,
  `prixFilm` DECIMAL(5,2) NULL,
  PRIMARY KEY (`idFilm`),
  CONSTRAINT `idCatFilm_films_fk`
    FOREIGN KEY (`idCatFilm`)
    REFERENCES `bdfilms`.`catFilms` (`idCatFilm`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfilms`.`membres`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfilms`.`membres` ;

CREATE TABLE IF NOT EXISTS `bdfilms`.`membres` (
  `idMembre` INT NOT NULL AUTO_INCREMENT,
  `nomMembre` VARCHAR(45) NOT NULL,
  `telMembre` CHAR(10) NULL,
  `adMembre` VARCHAR(100) NULL,
  `cpMembre` CHAR(6) NULL,
  PRIMARY KEY (`idMembre`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfilms`.`locations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfilms`.`locations` ;

CREATE TABLE IF NOT EXISTS `bdfilms`.`locations` (
  `idLocation` INT NOT NULL AUTO_INCREMENT,
  `idMembre` INT NOT NULL,
  `dateLocation` DATE NOT NULL,
  PRIMARY KEY (`idLocation`),
  CONSTRAINT `idClient_locations_fk`
    FOREIGN KEY (`idMembre`)
    REFERENCES `bdfilms`.`membres` (`idMembre`)
)ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfilms`.`det_locations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfilms`.`det_locations` ;

CREATE TABLE IF NOT EXISTS `bdfilms`.`det_locations` (
  `idLocation` INT NOT NULL,
  `idFilm` INT NOT NULL,
  `joursLocation` INT NOT NULL,
  `prixLocation` DECIMAL(5,2) NULL,
  `dateEcheance` DATE NOT NULL,
  PRIMARY KEY (`idLocation`, `idFilm`),
  CONSTRAINT `idLocation_det_locations_fk`
    FOREIGN KEY (`idLocation`)
    REFERENCES `bdfilms`.`locations` (`idLocation`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idVideo_det_locations_fk`
    FOREIGN KEY (`idFilm`)
    REFERENCES `bdfilms`.`films` (`idFilm`)
)ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfilms`.`connexions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfilms`.`connexions` ;

CREATE TABLE IF NOT EXISTS `bdfilms`.`connexions` (
  `idMembre` INT NOT NULL,
  `statusUsager` CHAR(1) NULL,
  `pwdUsager` VARCHAR(45) NOT NULL,
  `profilUsager` CHAR(1) NULL,
  `emailUsager` VARCHAR(45) NULL,
  PRIMARY KEY (`idMembre`),
  CONSTRAINT `idClient_connexions_fk`
    FOREIGN KEY (`idMembre`)
    REFERENCES `bdfilms`.`membres` (`idMembre`)
)ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfilms`.`comptabilite`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfilms`.`comptabilite` ;

CREATE TABLE IF NOT EXISTS `bdfilms`.`comptabilite` (
  `idLocation` INT NOT NULL,
  `totalLocation` DECIMAL(5,2) NULL,
  `dateLocation` DATE NULL,
  `numReference` VARCHAR(45) NULL,
  PRIMARY KEY (`idLocation`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfilms`.`historique`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfilms`.`historique` ;

CREATE TABLE IF NOT EXISTS `bdfilms`.`historique` (
  `idLocation` INT NOT NULL,
  `idFilm` INT NOT NULL,
  `idMembre` INT NULL,
  `dateLocation` DATE NULL,
  `joursLocation` INT NULL,
  PRIMARY KEY (`idLocation`, `idFilm`),
  CONSTRAINT `idLocation_historique_fk`
    FOREIGN KEY (`idLocation`)
    REFERENCES `bdfilms`.`comptabilite` (`idLocation`)
)ENGINE = InnoDB;




INSERT INTO `catfilms` (`idCatFilm`, `catFilm`) VALUES
(1, 'Action'),
(2, 'Comédie'),
(3, 'Familial'),
(4, 'Horreur'),
(5, 'Aventure'),
(6, 'Drame'),
(7, 'Thriller');


INSERT INTO `films` (`idFilm`, `titreFilm`, `idCatFilm`, `resFilm`, `pochetteFilm`, `dureeFilm`, `urlFilm`, `pubFilm`, `descFilm`, `prixFilm`) VALUES
(1, 'Casse-noisette et les quatre royaumes', 3, 'Lasse Hallström', 'Casse-noisette et les quatre royaumes.jpg', '01:33:00', 'https://www.youtube.com/embed/CT4eCDZgkOw', '2018-12-26', 'Tout ce que veut Clara est la clé. Une clé unique qui ouvrira une boîte contenant un cadeau inestimable que sa mère a laissé avant sa mort. À la fin de l\'année, la fête organisée par son parrain, Drosselmeyer, Clara découvre le fil d\'or qui la conduit à cette précieuse clé ... ', '2.50'),
(2, 'Aquaman', 1, 'James Wan', 'Aquaman.jpg', '02:23:00', 'https://www.youtube.com/embed/150q5Qn4uNA', '2019-01-23', 'Personnage légendaire depuis 70 ans, Aquaman est le Roi des Sept Mers, régnant à contrecœur sur Atlantis. Pris en étau entre les Terriens qui détruisent constamment la mer et les habitants d\'Atlantis prêts à se révolter, Aquaman doit protéger la planète tout entière…', '3.60'),
(3, 'Halloween(2018)', 4, 'David Gordon', 'Halloween(2018).jpg', '01:46:00', 'https://www.youtube.com/embed/wqts5qBX8ZA', '2018-11-07', 'Laurie Strode est de retour pour un affrontement final avec Michael Myers, le personnage masqué qui la hante depuis qu’elle a échappé de justesse à sa folie meurtrière le soir d’Halloween 40ans plus tôt.', '3.80'),
(4, 'Une étoile est née', 6, 'Bradley Cooper', 'Une étoile est née.jpg', '02:15:00', 'https://www.youtube.com/embed/D80_X5nGAJw', '2019-01-24', 'Star de country un peu oubliée, Jackson Maine découvre Ally, une jeune chanteuse très prometteuse. Tandis qu\'ils tombent follement amoureux l\'un de l\'autre, Jack propulse Ally sur le devant de la scène et fait d\'elle une artiste adulée par le public. Bientôt éclipsé par le succès de la jeune femme, il vit de plus en plus de mal son propre déclin…', '2.50'),
(5, 'Tout le monde debout', 2, 'Franck Dubosc', 'Tout le monde debout.jpg', '01:37:00', 'https://www.youtube.com/embed/i_36t_LEiZw', '2018-09-21', 'Jocelyn, homme d\'affaire en pleine réussite, égoïste et misogyne, lassé d\'être lui-même, se retrouve malgré lui à séduire une jeune et jolie femme en se faisant passer pour un handicapé. Jusqu\'au jour où elle lui présente sa soeur elle-même handicapée...', '1.80'),
(6, 'Bohemian Rhapsody', 6, 'Dexter Fletcher', 'Bohemian Rhapsody.jpg', '02:15:00', 'https://www.youtube.com/embed/0Q-VJNhLGMk', '2019-02-04', 'Bohemian Rhapsody retrace le destin extraordinaire du groupe Queen et de leur chanteur emblématique Freddie Mercury, qui a défié les stéréotypes, brisé les conventions et révolutionné la musique.', '3.90'),
(7, 'Le Grinch', 3, 'Scott Mosier', 'Le Grinch.jpg', '01:45:00', 'https://www.youtube.com/embed/SMyF9-FZT_Q', '2018-11-22', 'Chaque année à Noël, les Chous viennent perturber la tranquillité solitaire du Grinch avec des célébrations toujours plus grandioses, brillantes et bruyantes. Quand les Chous déclarent qu’ils vont célébrer Noël trois fois plus fort cette année, le Grinch réalise qu’il n’a plus qu’une solution pour retrouver la paix et la tranquillité: il doit voler Noël. ', '2.80'),
(8, 'Kung Fu Panda 3', 3, 'Jennifer Yuh', 'Kung Fu Panda 3.jpg', '01:35:00', 'https://www.youtube.com/embed/SYSwGpetP6Q', '2018-02-22', 'Po avait toujours cru son père panda disparu, mais le voilà qui réapparait ! Enfin réunis, père et fils vont voyager jusqu\'au paradis secret du peuple panda. Ils y feront la connaissance de certains de leurs semblables, tous plus déjantés les uns que les autres. Mais lorsque le maléfique Kaï décide de s\'attaquer aux plus grands maîtres du kung-fu à travers toute la Chine', '2.60'),
(9, 'La Nonne', 4, 'Corin Hardy', 'La Nonne.jpg', '01:36:00', 'https://www.youtube.com/embed/0XZp5_PkVw0', '2018-10-26', 'Quand on apprend le suicide d\'une jeune nonne dans une abbaye roumaine, la stupéfaction est totale dans l\'Église catholique. Le Vatican missionne aussitôt un prêtre au passé trouble et une novice pour mener l\'enquête. Risquant leur vie, les deux ecclésiastiques doivent affronter une force maléfique', '2.70'),
(10, 'Bumblebee ', 1, 'Travis Knight', 'Bumblebee .jpg', '01:54:00', 'https://www.youtube.com/embed/XE2qP_NdQfY', '2019-01-07', 'L\'Autobot Bumblebee trouve refuge dans la décharge d\'une petite ville balnéaire de Californie. Il est découvert, brisé et couvert de blessures de guerre, par Charlie, une ado qui approche de ses 18 ans et cherche sa place dans le monde.', '3.40'),
(11, 'Venom', 1, 'Ruben Fleischer', 'Venom.jpg', '01:52:00', 'https://www.youtube.com/embed/nViz7aHJXEM', '2018-08-16', 'L\'histoire de Venom (Eddie Brock), l\'ennemi de Spider-Man, qui cherche inlassablement à se venger de l\'homme-araignée qui l\'a fait renvoyer du Daily Bugle. ', '2.70'),
(12, 'Avatar', 5, 'James Cameron', 'Avatar.jpg', '02:42:00', 'https://www.youtube.com/embed/i4HmOUtMOgU', '2008-12-11', 'Dans le futur, en l’an 2154, Jake Sully, ancien marine, paraplégique, accepte de participer au programme Avatar. Il est envoyé sur Pandora, une planète recouverte d’une jungle luxuriante, est peuplée d’une faune et d’une flore aussi magnifiques que dangereuses pour les humains par qui la planète a été surexploitée.', '2.30'),
(13, 'Le prestige', 7, 'Christopher Nolan', 'Le prestige.jpg', '02:10:00', 'https://www.youtube.com/embed/6L9ZAH09En4', '2007-02-21', 'Alfred Borden est un magicien de la fin du xixe siècle, jugé pour l’assassinat supposé de son rival Robert Angier. Le film raconte les années de rivalité qui opposent les deux hommes, rivalité qui débute à la suite de l’accident mortel de la femme d’Angier.', '2.80'),
(14, 'Les Infiltrés', 7, 'Martin Scorsese', 'Les Infiltrés.jpg', '02:31:00', 'https://www.youtube.com/embed/iX1o64zUzKk', '2014-02-05', 'À Boston, une lutte sans merci oppose la police à la mafia irlandaise dirigée par Frank Costello, parrain des quartiers sud. Ce dernier va racketter une épicerie et repère un enfant, Colin Sullivan ; il lui fait comprendre comment le monde marche.', '2.90'),
(15, 'Avengers La guerre de l’infini', 1, 'Anthony Russo', 'Avengers La guerre de l’infini.jpg', '02:29:00', 'https://www.youtube.com/embed/eIWs2IUr3Vs', '2018-08-15', 'Les Avengers et leurs alliés devront être prêts à tout sacrifier pour neutraliser le redoutable Thanos avant que son attaque éclair ne conduise à la destruction complète de l’univers. ', '3.20'),
(16, 'Intouchables', 6, 'Eric Toledano', 'Intouchables.jpg', '01:52:00', 'https://www.youtube.com/embed/EsaX5kltRcA', '2014-01-22', 'A la suite d’un accident de parapente, Philippe, riche aristocrate, engage comme aide à domicile Driss, un jeune de banlieue tout juste sorti de prison. Bref la personne la moins adaptée pour le job. Ensemble ils vont faire cohabiter Vivaldi et Earth Wind and Fire, le verbe et la vanne, les costumes et les bas de survêtement... ', '2.60'),
(17, 'First Man  le premier homme sur la Lune', 6, 'Damien Chazelle', 'First Man  le premier homme sur la Lune.jpg', '02:21:00', 'https://www.youtube.com/embed/vvz8DA9-pas', '2018-07-11', 'L’histoire fascinante de la mission de la NASA d’envoyer un homme sur la lune, centrée sur Neil Armstrong et les années 1961-1969. Inspiré du livre de James R. Hansen, le film explore les sacrifices et coûts – d’Armstrong et de la nation – d’une des plus dangereuses missions de l’Histoire. ', '2.50'),
(18, 'Star Wars - Les Derniers Jedi', 5, 'Rian Johnson', 'Star Wars - Les Derniers Jedi.jpg', '02:32:00', 'https://www.youtube.com/embed/wY708Ky2SG8', '2017-12-27', 'Les héros du Réveil de la force rejoignent les figures légendaires de la galaxie dans une aventure épique qui révèle des secrets ancestraux sur la Force et entraîne de choquantes révélations sur le passé… ', '2.70'),
(19, 'Spider Man Homecoming', 1, 'Jon Watts', 'Spider Man Homecoming.jpg', '02:13:00', 'https://www.youtube.com/embed/mJQ4u-kXoGc', '2018-05-16', 'Peter Parker, un jeune lycéen fréquentant le lycée de Midtown va se servir de ses pouvoirs sous le masque de Spider-Man pour lutter contre la criminalité qui ronge la ville de New York, tout en essayant de trouver un équilibre entre sa vie de lycéen, son amour secret pour Liz Allen et sa carrière de super-héros masqué.', '2.80'),
(20, 'Le Crime de l\'Orient-Express', 7, 'Janet Kellock', 'Le Crime de l\'Orient-Express.jpg', '01:54:00', 'https://www.youtube.com/embed/FMlYxRCBSSM', '2017-01-26', 'Le luxe et le calme d’un voyage en Orient Express est soudainement bouleversé par un meurtre. Les 13 passagers sont tous suspects et le fameux détective Hercule Poirot se lance dans une course contre la montre pour identifier l’assassin. ', '2.90'),
(21, 'Le Petit Nicolas', 3, 'Laurent Tirard', 'Le Petit Nicolas.jpg', '01:31:00', 'https://www.youtube.com/embed/TlwJHnQgrH0', '2015-03-18', 'Nicolas mène l’existence tranquille et idyllique d’un petit garçon comme les autres. Ses parents l’aiment tendrement, lui et sa bande de copains extraordinaires s’amusent beaucoup et se livrent à toutes sortes de bêtises jusqu’à ce fameux jour où il croit comprendre que sa mère est enceinte. ', '2.80'),
(22, 'Pierre Lapin', 3, 'Will Gluck', 'Pierre Lapin.jpg', '01:35:00', 'https://www.youtube.com/embed/2TbFlVm4WaU', '2018-04-17', ' L\'éternelle lutte de Pierre Lapin avec M. McGregor pour les légumes du potager va atteindre des sommets. Sans parler de leur rivalité pour plaire à cette charmante voisine qui adore les animaux…', '2.70'),
(23, 'Yéti & Compagnie', 3, 'Jason Reisig', 'Yéti & Compagnie.jpg', '01:49:00', 'https://www.youtube.com/embed/xQgu1W9w5lE', '2018-12-11', 'Vivant dans un petit village reculé, un jeune et intrépide yéti découvre une créature étrange qui, pensait-il jusque-là, n\'existait que dans les contes : un humain ! Si c\'est pour lui l\'occasion de connaître la célébrité – et de conquérir la fille de ses rêves ', '2.70'),
(24, 'Paddington', 3, 'Paul King', 'Paddington.jpg', '01:35:00', 'https://www.youtube.com/embed/iAiMhMSebeU', '2015-08-20', 'Paddington raconte l\'histoire d\'un jeune ours péruvien fraîchement débarqué à Londres, à la recherche d\'un foyer et d\'une vie meilleure. Il réalise vite que la ville de ses rêves n\'est pas aussi accueillante qu\'il croyait.', '2.50'),
(25, 'Dangereux 7', 1, 'James Wan', 'Dangereux 7.jpg', '02:17:00', 'https://www.youtube.com/embed/3Wu2BhFuc4c', '2017-09-28', 'Il s\'agit du septième film de la série Fast and Furious. Dominic Toretto et sa \"famille\" doivent faire face à un mystérieux agresseur, bien décidé à se venger. ', '3.20'),
(26, 'Ant Man et la Guêpe', 1, 'Peyton Reed', 'Ant Man et la Guêpe.jpg', '01:58:00', 'https://www.youtube.com/embed/A5jzpMR6rv4', '2018-07-20', 'Scott Lang a bien du mal à concilier sa vie de super-héros et ses responsabilités de père. Mais ses réflexions sur les conséquences de ses choix tournent court lorsque Hope van Dyne et le Dr Hank Pym lui confient une nouvelle mission urgente…', '2.80'),
(27, 'Expendables 2', 1, 'Simon West', 'Expendables 2.jpg', '01:43:00', 'https://www.youtube.com/embed/PTEBUh76o-Y', '2016-02-25', 'Les Expendables sont de retour, et cette fois, la mission les touche de très près... Lorsque Mr. Church engage Barney Ross, Lee Christmas, Yin Yang, Gunnar Jensen, Toll Road et Hale Caesar – et deux nouveaux, Billy the Kid et Maggie – l’opération semble facile. Mais quand l’un d’entre eux est tué, les Expendables jurent de le venger.', '2.40'),
(28, 'Les Animaux fantastiques - Les Crimes de Grindelwald', 5, 'David Yates', 'Les Animaux fantastiques - Les Crimes de Grindelwald.jpg', '02:14:00', 'https://www.youtube.com/embed/Dnb6eAfSHtw', '2018-12-27', 'Le sorcier Gellert Grindelwald s\'évade comme il l\'avait promis et de façon spectaculaire. Réunissant de plus en plus de partisans, il est à l\'origine d\'attaque d\'humains normaux par des sorciers et seul celui qu\'il considérait autrefois comme un ami, Albus Dumbledore, semble capable de l\'arrêter.', '2.70'),
(29, 'La Forme de l\'eau', 5, 'Guillermo del Toro', 'La Forme de l\'eau.jpg', '02:03:00', 'https://www.youtube.com/embed/0Wwtl1G7ye4', '2017-12-21', 'Modeste employée d’un laboratoire gouvernemental ultrasecret, Elisa mène une existence morne et solitaire, d’autant plus isolée qu’elle est muette. Sa vie bascule à jamais lorsqu’elle et sa collègue Zelda découvrent une expérience encore plus secrète que les autres… ', '2.40'),
(30, 'Monde jurassique - Le royaume déchu', 5, 'Juan Antonio Bayona', 'Monde jurassique - Le royaume déchu.jpg', '02:06:00', 'https://www.youtube.com/embed/PamaIjqUbpI', '2018-06-07', 'Cela fait maintenant quatre ans que les dinosaures se sont échappés de leurs enclos et ont détruit le parc à thème et complexe de luxe Jurassic World. Isla Nublar a été abandonnée par les humains alors que les dinosaures survivants sont livrés à eux-mêmes dans la jungle.', '2.30'),
(31, 'La Planète des singes - Suprématie', 5, 'Matt Reeves', 'La Planète des singes - Suprématie.jpg', '02:10:00', 'https://www.youtube.com/embed/vILRRtrFV68', '2018-08-15', 'César et les Singes sont contraints de mener un combat dont ils ne veulent pas contre une armée d\'Humains dirigée par un Colonel impitoyable. Les Singes connaissent des pertes considérables et César, dans sa quête de vengeance, va devoir lutter contre ses instincts les plus noirs. ', '2.40'),
(32, 'Un Raccourci dans le temps', 5, 'Ava DuVernay', 'Un Raccourci dans le temps.jpg', '01:49:00', 'https://www.youtube.com/embed/ObCq6AaL7wU', '2018-05-23', 'Une jeune fille cherche son père disparu, scientifique travaillant pour le gouvernement sur le projet d\'un \"tesseract\". Cet objet permettrait de se déplacer dans la 5e dimension, vers des planètes inconnues. ', '2.90'),
(33, 'Jumanji - Bienvenue dans la jungle', 5, 'Jake Kasdan', 'Jumanji - Bienvenue dans la jungle.jpg', '01:59:00', 'https://www.youtube.com/embed/oZI2njF5rx0', '2018-01-24', 'Quatre lycéens découvrent une vieille console contenant un jeu vidéo dont ils n’avaient jamais entendu parler : Jumanji. En voulant jouer, ils se retrouvent mystérieusement propulsés dans la jungle de Jumanji, où ils deviennent leurs avatars. ', '3.10'),
(34, 'Johnny English Contre-Attaque', 2, 'David Kerr', 'Johnny English Contre-Attaque.jpg', '01:29:00', 'https://www.youtube.com/embed/X3DoHtJT2nw', '2019-02-01', 'Cette nouvelle aventure démarre lorsqu’une cyber-attaque révèle l’identité de tous les agents britanniques sous couverture. Johnny English plonge tête la première dans sa mission : découvrir qui est le génie du piratage qui se cache derrière ces attaques.', '3.20'),
(35, 'Le Trip à trois', 2, 'Nicolas Monette', 'Le Trip à trois.jpg', '01:31:00', 'https://www.youtube.com/embed/7WMMFnkbl2M', '2017-12-20', 'Estelle, 34 ans, conjointe et mère de famille sans histoire, s\'enfonce dans une vie rangée et prévisible. Mais une série d\'événements remet son identité en question. Pire : elle réalise que le noeud de cette crise est sexuel. Elle se met en tête d\'organiser un « trip » à trois.', '2.70'),
(36, 'Demain tout commence', 2, 'Hugo Gélin', 'Demain tout commence.jpg', '01:58:00', 'https://www.youtube.com/embed/OAt0mmfW8S4', '2017-10-03', 'Samuel vit sa vie sans attaches ni responsabilités, au bord de la mer sous le soleil du sud de la France, près des gens qu’il aime et avec qui il travaille sans trop se fatiguer. Jusqu’à ce qu’une de ses anciennes conquêtes lui laisse sur les bras un bébé de quelques mois, Gloria : sa fille ! ', '2.70'),
(37, 'Le Doudou', 2, 'Julien Hervé', 'Le Doudou.jpg', '01:22:00', 'https://www.youtube.com/embed/OLmqASd1WnI', '2018-09-14', 'La fille de Michel a perdu sa peluche à l’aéroport de Roissy. Un avis de recherche avec récompense à la clé est alors déposé par le père de famille. Sofiane, employé à l’aéroport et qui voit là l’occasion de gagner un peu d’argent, prétend alors l\'avoir retrouvée. ', '2.80'),
(38, 'Radin', 2, 'Fred Cavayé', 'Radin.jpg', '01:29:00', 'https://www.youtube.com/embed/Bhv2HZVhPAk', '2018-06-15', 'François Gautier est radin ! Economiser le met en joie, payer lui provoque des suées. Sa vie est réglée dans l’unique but de ne jamais rien dépenser. Une vie qui va basculer en une seule journée : il tombe amoureux et découvre qu’il a une fille dont il ignorait l’existence. ', '2.90'),
(39, 'Qu\'est-ce qu\'on a fait au Bon Dieu', 2, 'Philippe de Chauveron', 'Qu\'est-ce qu\'on a fait au Bon Dieu.jpg', '01:37:00', 'https://www.youtube.com/embed/QfRsYvQQMSM', '2014-03-06', 'Traitant du racisme et du mariage mixte sur le ton de la comédie, le long-métrage raconte l\'histoire d\'un couple de bourgeois catholiques qui voit ses convictions mises à mal lorsque trois de ses quatre filles se marient l\'une après l\'autre avec des hommes d\'origines et de confessions diverses.', '2.60'),
(40, 'L\'Ombre d\'Emily', 6, 'Paul Feig', 'L\'Ombre d\'Emily.jpg', '01:57:00', 'https://www.youtube.com/embed/y3COqOW5kWI', '2018-07-19', 'Dans une petite ville des Etats-Unis, la meilleure amie d\'une bloggeuse disparaît mystérieusement. ', '2.70'),
(41, 'Forrest Gump', 6, 'Robert Zemeckis', 'Forrest Gump.jpg', '02:22:00', 'https://www.youtube.com/embed/vhbOdIJyalo', '1996-03-21', 'Au fil des différents interlocuteurs qui viennent s’asseoir tour à tour à côté de lui sur le banc, Forrest Gump va raconter la fabuleuse histoire de sa vie. Sa vie se laisse porter  par les événements qu\'il traverse dans l\'Amérique de la seconde moitié du xxe siècle. ', '2.40'),
(42, 'Gravité ', 6, 'Alfonso Cuarón', 'Gravité .jpg', '01:31:00', 'https://www.youtube.com/embed/k7RY4Br9jog', '2018-02-23', 'Pour sa première expédition à bord d\'une navette spatiale, le docteur Ryan Stone, brillante experte en ingénierie médicale, accompagne l\'astronaute chevronné Matt Kowalsky. Mais alors qu\'il s\'agit apparemment d\'une banale sortie dans l\'espace, une catastrophe se produit.', '2.30'),
(43, 'Mes vies de chien', 6, 'Lasse Hallström', 'Mes vies de chien.jpg', '01:40:00', 'https://www.youtube.com/embed/qPpE7GcjFi8', '2017-09-04', ' Du moins, c\'est le cas de Bailey. Petit chiot sauvage, il doit d\'abord apprendre à faire confiance aux humains. Et puis c\'est la rencontre avec Ethan, un jeune garçon qui va devenir le maître qu\'il aimera plus que tout. ', '2.40'),
(44, 'Rush', 6, 'Ron Howard', 'Rush.jpg', '02:03:00', 'https://www.youtube.com/embed/N4C5qOwHiB8', '2016-02-26', 'Le Britannique James Hunt et l’Autrichien Niki Lauda, deux talentueux pilotes, se rencontrent au début des années 1970, ils affichent un grand mépris mutuel. Leur rivalité se poursuit en Formule 1.', '2.20'),
(45, 'Clown ', 4, 'Jon Watts', 'Clown .jpg', '01:40:00', 'https://www.youtube.com/embed/Lcjy6gGAwRg', '2018-10-26', 'Lorsque le clown engagé pour animer l\'anniversaire de son fils leur fait faux bond, un père de famille doit prendre la relève et lui-même revêtir un déguisement de clown pour assurer le spectacle. ', '2.90'),
(46, 'Ça', 4, 'Andrés Muschietti', 'Ça.jpg', '02:15:00', 'https://www.youtube.com/embed/Tw3yT-qAbvc', '2018-01-12', 'Plusieurs disparitions d\'enfants sont signalées dans la petite ville de Derry, dans le Maine. Au même moment, une bande d\'adolescents doit affronter un clown maléfique et tueur, du nom de Pennywise, qui sévit depuis des siècles. Ils vont connaître leur plus grande terreur… ', '3.20'),
(47, 'Annabelle', 4, 'John R. Leonetti', 'Annabelle.jpg', '01:39:00', 'https://www.youtube.com/embed/4N_uO1UokPg', '2017-10-27', 'John Form est certain d\'avoir déniché le cadeau de ses rêves pour sa femme Mia, qui attend un enfant. Il s\'agit d\'une poupée ancienne, très rare, habillée dans une robe de mariée d\'un blanc immaculé. Mais Mia, d\'abord ravie par son cadeau, va vite déchanter.', '3.30'),
(48, 'Freddy - Les Griffes de la nuit', 4, 'Samuel Bayer', 'Freddy - Les Griffes de la nuit.jpg', '01:35:00', 'https://www.youtube.com/embed/14qnPNkKSEY', '2018-10-19', 'Tout commence lorsque Dean, un étudiant, se fait égorger dans son sommeil par un personnage au corps brûlé et à la main parsemée de lames. Bientôt ses amis découvrent que tous rêvent de ce même homme, mais ils ne se rendent comptent de la gravité de la situation que lorsque tous se font assassiner un par un. ', '3.40'),
(49, 'Destination ultime 5', 4, 'Steven Quale', 'Destination ultime 5.jpg', '01:32:00', 'https://www.youtube.com/embed/VjqCOYHrd5s', '2018-08-24', 'Sam Lawton et ses collègues de travail de l’entreprise Presage partent en bus pour un séminaire. Lors de la traversée d’un pont en réparation, il a la vision de celui-ci s’effondrant et de ses amis mourant un par un. ', '3.40'),
(50, 'L’Héritage', 4, 'Michael Spierig', 'L’Héritage.jpg', '01:32:00', 'https://www.youtube.com/embed/QxiztUnTivE', '2018-09-14', 'Après une série de meurtres qui ressemblent étrangement à ceux de Jigsaw, le tueur au puzzle, la police se lance à la poursuite d\'un homme mort depuis plus de dix ans. ', '3.40'),
(51, 'Forgiven', 7, 'Roland Joffé', 'Forgiven.jpg', '01:55:00', 'https://www.youtube.com/embed/VXwrGgQ9Ne4', '2018-05-11', 'En 1994, à la fin de l’Apartheid , Nelson Mandela nomme L’archevêque Desmond Tutu président de la commission Vérité et réconciliation : aveux contre rédemption. Il se heurte le plus souvent au silence d\'anciens tortionnaires. ', '2.70'),
(52, 'La Prophétie de l\'horloge', 7, 'Eli Roth', 'La Prophétie de l\'horloge.jpg', '01:45:00', 'https://www.youtube.com/embed/PgqPwIW6o24', '2018-09-21', 'Elevé par son oncle Jonathan, un authentique magicien, Lewis a grandi dans un monde fait de magie et de merveilleux. Mais quand le jeune garçon découvre que leur propriétaire, un sorcier du nom d\'Isaac Izard, pourrait déclencher la fin du monde, une course contre la montre s\'engage pour empêcher que ce plan maléfique n\'aboutisse. ', '2.80'),
(53, 'Fleuve noir', 7, 'Erick Zonca', 'Fleuve noir.jpg', '01:53:00', 'https://www.youtube.com/embed/ImuXu5PjurQ', '2018-12-14', 'Au sein de la famille Arnault, Dany, un adolescent, disparaît. François Visconti, commandant de police usé et désillusionné, est mis sur l\'affaire. L\'homme part à la recherche de l\'adolescent alors qu\'il rechigne à s’occuper de son propre fils, Denis, seize ans, qui semble mêlé à un trafic de drogue. ', '2.80'),
(54, '22 Miles', 7, 'Peter Berg', '22 Miles.jpg', '01:34:00', 'https://www.youtube.com/embed/2q6XRArvlCM', '2017-11-10', 'Un officier du renseignement américain d\'élite tente de bloquer un policier qui transporte des informations compromettantes. Ils seront traqués par une armée de tueurs pendant 22 miles les séparant d\'un avion qui leur permettra de quitter le pays. ', '2.80'),
(55, 'Le Seigneur de guerre', 7, 'Andrew Niccol', 'Le Seigneur de guerre.jpg', '01:22:00', 'https://www.youtube.com/embed/0ZjdmjA8aO8', '2018-05-11', 'La carrière de vendeur d’armes de Queens, N.Y., Yuri Orlov, exclu depuis 20 ans, sert de fenêtre sur la fin de la guerre froide et l’émergence du terrorisme mondial.', '2.40'),
(56, 'Jean-Christophe & Winnie', 3, 'Marc Forster', 'Jean-Christophe & Winnie.jpg', '01:44:00', 'https://www.youtube.com/embed/WUnvJZAE1_I', '2018-11-30', 'Une version live des aventures de Winnie l\'Ourson.Le temps a passé. Jean-Christophe, le petit garçon qui adorait arpenter la Forêt des Rêves bleus en compagnie de ses adorables et intrépides animaux en peluche, est désormais adulte. ', '2.90');

