CREATE DATABASE IF NOT EXISTS VB;

USE vb;

Create table IF NOT EXISTS `user`(
	id int(11) auto_increment primary key,
    name varchar(50) not null,
    lastName varchar(50) not null,
    email varchar(100) not null,
    password varchar(50) not null,
    img varchar(100) not null,
    rol CHAR(1) Not NULL default "0",
    dateReg date NOT NULL default "2023-01-01"
);

CREATE TABLE IF NOT EXISTS `resource`(
	id int(11) auto_increment primary key,
    name varchar(100) not null,
    author varchar(50) not null,
    type varchar(50) not null,
    category varchar(50) not null,
    description varchar(1000) not null,
    src varchar(300) not null,
    img varchar(300) not null
);

CREATE TABLE IF NOT EXISTS `comment`(
	id int(11) auto_increment primary key,
    description varchar(300) not null,
    valuation varchar(10) not null,
    id_c int(11) not null,
    id_rec int(11) not null,
    constraint foreign key (id_c) references  `user`(id) ON UPDATE CASCADE ON DELETE CASCADE,
    constraint foreign key (id_rec) references  `resource`(id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `shelf`(
	id int(11) auto_increment primary key,
    id_r int(11) not null,
    constraint foreign key (id_r) references `resource`(id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- para la api de carga XD

DELIMITER //
CREATE PROCEDURE SeleccionarSiguientesDatos(IN valor_anterior INT, IN categoría VARCHAR(50))
BEGIN
    SELECT * FROM resource
    WHERE id > valor_anterior AND category = categoría
    ORDER BY id ASC
    LIMIT 5;
END //
DELIMITER ;

