/**

Tout d'abord on supprime les tables en prévision d'une éventuelle installation précedente

ensuite on va créer les tables en respectant la convention qui est

les " ` " pour entourer le nom de la table
le  " #__ " qui sera remplacer par le suffixe de la table 

et pour finir le nom de la table
**/

DROP TABLE IF EXISTS `#__materiel`;
DROP TABLE IF EXISTS `#__tranche`;
DROP TABLE IF EXISTS`#__loue`;

CREATE TABLE IF NOT EXISTS `#__materiel` (

    `id` int(10) NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(150),
    `nombre` INT(100),
    `description` VARCHAR(300),
    PRIMARY KEY(`id`)
);

CREATE TABLE IF NOT EXISTS `#__tranche`  (
  `id`   int(10) AUTO_INCREMENT NOT NULL,
  `datedebut` DATETIME,
  `datefin` DATETIME,


  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `#__loue` (
   
`id`   int(10) AUTO_INCREMENT NOT NULL,

`idmat` int(11) NOT NULL,
 `nombres`  int(11) NOT NULL,
     `iduser` int(11) NOT NULL,
    `etatlocation` BOOLEAN,
    `idtranche` INT,
    `dateloc` DATE,

	  PRIMARY KEY (`id`),
    FOREIGN KEY (idmat) REFERENCES `#__materiel`(`id`),
    FOREIGN KEY (idtranche) REFERENCES `#__tranche`(`id`),
    FOREIGN KEY (iduser)    REFERENCES `#__users`(`id`)
);