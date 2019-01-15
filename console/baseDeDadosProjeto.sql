drop database if exists gymplan;
create database gymplan;
use gymplan;

CREATE TABLE if not exists user (
    id int(5) NOT NULL PRIMARY KEY auto_increment,
    primeiroNome varchar(25) NOT NULL,
    ultimoNome varchar(25) NOT NULL,
    dataNascimento DATETIME NOT NULL ,
    altura decimal(4,2) NOT NULL ,
    peso decimal(5,3) NOT NULL,
    sexo tinyint(1) NOT NULL,
    email varchar(120) NOT NULL unique,
    password_hash varchar(255) NOT NULL,
	password_reset_token varchar(255) DEFAULT NULL,
	status smallint(6) NOT NULL DEFAULT '10',
	created_at int(11) NOT NULL,
    updated_at int(11) NOT NULL,
	auth_key varchar(32) NOT NULL
); SET default_storage_engine=InnoDB;

CREATE TABLE if not exists admin (
    id int(5) NOT NULL PRIMARY KEY auto_increment,
    primeiroNome varchar(25) NOT NULL,
    ultimoNome varchar(25) NOT NULL,
    email varchar(120) NOT NULL unique,
    password_hash varchar(255) NOT NULL,
	password_reset_token varchar(255) DEFAULT NULL,
	status smallint(6) NOT NULL DEFAULT '10',
	created_at int(11) NOT NULL,
    updated_at int(11) NOT NULL,
	auth_key varchar(32) NOT NULL
); SET default_storage_engine=InnoDB;

CREATE TABLE if not exists dificuldade (
    id_dificuldade int(2) NOT NULL PRIMARY KEY auto_increment,
    dificuldade int(2) NOT NULL
); SET default_storage_engine=InnoDB;

CREATE TABLE if not exists categoria (
    id_categoria int(2) NOT NULL PRIMARY KEY auto_increment,
    nome varchar(40) NOT NULL
); SET default_storage_engine=InnoDB;

CREATE TABLE if not exists treino (
    id_treino int(5) NOT NULL PRIMARY KEY auto_increment,
	nome varchar(50) NOT NULL,
	descricao varchar(300) NOT NULL,
    id_categoria int(2) NOT NULL ,
    id_dificuldade int(2) NOT NULL,
    repeticoes int(2) NOT NULL,
    FOREIGN Key (id_categoria) REFERENCES categoria(id_categoria),
	FOREIGN Key (id_dificuldade) REFERENCES dificuldade(id_dificuldade)
); SET default_storage_engine=InnoDB;

CREATE TABLE if not exists zona_exercicio (
    id_zona int(2) NOT NULL PRIMARY KEY auto_increment,
    nome varchar(30) NOT NULL
); SET default_storage_engine=InnoDB;

CREATE TABLE if not exists exercicio (
    id_exercicio int(4) NOT NULL PRIMARY KEY auto_increment,
    foto varchar(200) NOT NULL ,
    nome varchar(25) NOT NULL ,
    descricao varchar(250) NOT NULL,
    repeticoes int(2),
    tempo int(10),
	id_zona int(2) NOT NULL,
	FOREIGN Key (id_zona) REFERENCES zona_exercicio(id_zona)
); SET default_storage_engine=InnoDB;

CREATE TABLE if not exists treino_exercicio(
	id int(7) NOT NULL PRIMARY KEY auto_increment,
    id_treino int(5) NOT NULL,
    id_exercicio int(5) NOT NULL,
	FOREIGN Key (id_exercicio) REFERENCES exercicio(id_exercicio),
	FOREIGN Key (id_treino) REFERENCES treino(id_treino)
); SET default_storage_engine=InnoDB;

CREATE TABLE if not exists user_treino(
	id int(7) NOT NULL PRIMARY KEY auto_increment,
	id_user int(5) NOT NULL,
  id_treino int(5) NOT NULL,
	FOREIGN Key (id_user) REFERENCES user(id),
	FOREIGN Key (id_treino) REFERENCES treino(id_treino)
); SET default_storage_engine=InnoDB;

INSERT INTO `admin` (`primeiroNome`,`ultimoNome`, `email`, `auth_key`, `password_hash`, `password_reset_token`, `status`, `created_at`, `updated_at`) VALUES
('Francisco', 'Melicias', 'melicias1999@gmail.com', '9_7mh3DStkbU7yz_JOJCyPqmeya1YrVx', '$2y$13$KtcF8cGFCQ27OfbbLQdnYuXpNYWKyLBacEfPIykEnTOBrbsIZSyWm', NULL, 10, 1521162560, 1521162560),
('Goncalo', 'Amaro', 'amaro@gmail.com', 'Jg4UFFbq7m6GXz62Hp2Z3xDG4I4p20zc', '$2y$13$KtcF8cGFCQ27OfbbLQdnYuXpNYWKyLBacEfPIykEnTOBrbsIZSyWm', NULL, 10, 1521163037, 1521163037);
			

