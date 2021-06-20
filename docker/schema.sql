use 'idealista';

CREATE TABLE IF NOT EXISTS `ad`
(
    `id`          int(11)     NOT NULL AUTO_INCREMENT,
    `type`        varchar(45) NOT NULL,
    `description` mediumtext  NOT NULL,
    `size`        int(11) DEFAULT 0,
    `garden_size` int(11) DEFAULT 0,
    `score`       int(11) DEFAULT 0,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;


INSERT INTO `ad` (`type`, `description`, `size`, `garden_size`, `score`)
VALUES (
        'piso',
        'Luminoso ipsum dolor sit amet, consectetur adipiscing elit. Donec nibh leo, tristique sed faucibus commodo, auctor id neque. Nunc sed sagittis sapien, ut molestie nisl. Phasellus maximus ornare ipsum, at faucibus leo auctor sit amet. In et feugiat erat, et ultrices ligula. Phasellus euismod finibus ante, eu aliquam libero.',
        50,
        0,
        90 -- (3 * 10) + (5 + 10 + 5) + 40
        ); -- # 3 imagenes + 1 descripcion entre 20 y 49 palabras con una keyword + anuncio completo

INSERT INTO `ad` (`type`, `description`, `size`, `garden_size`, `score`)
VALUES (
           'piso',
           'Luminoso libero.',
           50,
           0,
           0 -- (5 + 5) - 10
       ); -- # 1 descripcion 2 palabras con una keyword, 0 imagenes

INSERT INTO `ad` (`type`, `description`, `size`, `garden_size`, `score`)
VALUES (
           'chalet',
           'Luminoso ipsum dolor sit amet, consectetur adipiscing elit. Donec nibh leo, tristique sed faucibus commodo, auctor id neque. Nunc sed sagittis sapien, ut molestie nisl. Phasellus maximus ornare ipsum, at faucibus leo auctor sit amet. In et feugiat erat, et ultrices ligula. Phasellus euismod finibus ante, eu aliquam libero.',
           50,
           0,
           45 -- (2 * 20) + (1 * 10) + (5 + 10)
       ); -- # 2 imagenes hd + 1 imagen + 1 descripcion entre 20 y 49 palabras

INSERT INTO `ad` (`type`, `description`, `size`, `garden_size`, `score`)
VALUES (
           'chalet',
           'Luminoso ipsum dolor sit amet, consectetur adipiscing elit. Donec nibh leo, tristique sed faucibus commodo, auctor id neque. Nunc sed sagittis sapien, ut molestie nisl. Phasellus maximus ornare ipsum, at faucibus leo auctor sit amet. In et feugiat erat, et ultrices ligula. Phasellus euismod finibus ante, eu aliquam libero.',
           50,
           20,
           5 -- (5 + 10) - 10
       ); -- # 1 descripcion entre 20 y 49 palabras, 0 imagenes

INSERT INTO `ad` (`type`, `description`, `size`, `garden_size`, `score`)
VALUES (
           'garage',
           '',
           15,
           0,
           70 -- (3 * 10) + 40
       ); -- # 3 imagenes + anuncio completo

CREATE TABLE IF NOT EXISTS `photo`
(
    `id`    INT          NOT NULL AUTO_INCREMENT,
    `url`   VARCHAR(255) NOT NULL,
    `hd`    BIT          NOT NULL,
    `id_ad` INT          NOT NULL,
    PRIMARY KEY (`id`, `id_ad`),
    INDEX `fk_photo_1_idx` (`id_ad` ASC) VISIBLE,
    CONSTRAINT `fk_photo_ad`
        FOREIGN KEY (`id_ad`)
            REFERENCES `ad` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
);

INSERT INTO `photo` (`url`, `hd`, `id_ad`) VALUES ('http://image1.jpg', 0, 1);
INSERT INTO `photo` (`url`, `hd`, `id_ad`) VALUES ('http://image2.jpg', 0, 1);
INSERT INTO `photo` (`url`, `hd`, `id_ad`) VALUES ('http://image3.jpg', 0, 1);
INSERT INTO `photo` (`url`, `hd`, `id_ad`) VALUES ('http://image1.jpg', 1, 3);
INSERT INTO `photo` (`url`, `hd`, `id_ad`) VALUES ('http://image2.jpg', 1, 3);
INSERT INTO `photo` (`url`, `hd`, `id_ad`) VALUES ('http://image3.jpg', 0, 3);
INSERT INTO `photo` (`url`, `hd`, `id_ad`) VALUES ('http://image1.jpg', 0, 5);
INSERT INTO `photo` (`url`, `hd`, `id_ad`) VALUES ('http://image2.jpg', 0, 5);
INSERT INTO `photo` (`url`, `hd`, `id_ad`) VALUES ('http://image3.jpg', 0, 5);

CREATE TABLE IF NOT EXISTS `keyword`
(
    `id`   INT         NOT NULL AUTO_INCREMENT,
    `word` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `word_UNIQUE` (`word` ASC) VISIBLE
);

INSERT INTO `keyword` (`word`) VALUES ('Luminoso');
INSERT INTO `keyword` (`word`) VALUES ('Nuevo');
INSERT INTO `keyword` (`word`) VALUES ('Céntrico');
INSERT INTO `keyword` (`word`) VALUES ('Reformado');
INSERT INTO `keyword` (`word`) VALUES ('Ático');
