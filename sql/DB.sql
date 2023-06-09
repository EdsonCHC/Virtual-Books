CREATE DATABASE IF NOT EXISTS VB;

USE vb;

Create table IF NOT EXISTS `user`(
	id int(11) auto_increment primary key,
    name varchar(50) not null,
    lastName varchar(50) not null,
    email varchar(100) not null,
    password varchar(50) not null,
    img BLOB not null
);

CREATE TABLE IF NOT EXISTS `comment`(
	id int(11) auto_increment primary key,
    description varchar(300) not null,
    valuation varchar(10) not null,
    id_c int(11) not null,
    constraint foreign key (id_c) references  `user`(id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `resource`(
	id int(11) auto_increment primary key,
    name varchar(100) not null,
    author varchar(50) not null,
    type varchar(50) not null,
    category varchar(50) not null,
    description varchar(300) not null,
    id_com int(11) not null,
    src BLOB not null,
    constraint foreign key (id_com) references `comment`(id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `shelf`(
	id int(11) auto_increment primary key,
    id_r int(11) not null,
    constraint foreign key (id_r) references `resource`(id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `admin`(
    id int(11) auto_increment primary key,
    email varchar(100) not null,
    password varchar(10) not null
);

