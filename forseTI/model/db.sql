create database forseti_db;

use forseti_db;

CREATE TABLE status(
    id_status int not null auto_increment primary key,
    stats varchar(50) not null
);

CREATE TABLE tipo(
    id_tipo int not null auto_increment primary key,
    tipo varchar(50) not null
);

CREATE TABLE pa(
id_pa int not null auto_increment primary key,
patrimonio int not null,
posicao int
);

CREATE TABLE tipo_ficha(
    id_tipo_ficha int not null auto_increment primary key,
    tipo_ficha varchar(50) not null
);

INSERT INTO `forseti_db`.`status` (`stats`) VALUES ('Ativo');
INSERT INTO `forseti_db`.`status` (`stats`) VALUES ('Inativo');

INSERT INTO `forseti_db`.`tipo` (`tipo`) VALUES ('Ingresso');
INSERT INTO `forseti_db`.`tipo` (`tipo`) VALUES ('Gestor');
INSERT INTO `forseti_db`.`tipo` (`tipo`) VALUES ('TI');
INSERT INTO `forseti_db`.`tipo` (`tipo`) VALUES ('Admin Geral');

INSERT INTO `forseti_db`.`tipo_ficha` (`tipo_ficha`) VALUES ('Financeiro');
INSERT INTO `forseti_db`.`tipo_ficha` (`tipo_ficha`) VALUES ('Normal');
INSERT INTO `forseti_db`.`tipo_ficha` (`tipo_ficha`) VALUES ('Preferencial');

CREATE TABLE usuario(
    id_user int not null auto_increment primary key,
    nome varchar(50) not null,
    sobrenome varchar(250) not null,
    user varchar(20) not null,
    ramal varchar(4),
    senha varchar(100) not null,
    email varchar(100) not null,
    id_status int not null,
    id_tipo int not null,

    FOREIGN KEY (id_status) REFERENCES status(id_status) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_tipo) REFERENCES tipo(id_tipo) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE ficha(
id_ficha int not null auto_increment primary key,
tipo int not null,
pa int,
status_ficha int,
categoria varchar(50) not null,

foreign key (tipo) references tipo_ficha(id_tipo_ficha) on delete cascade on update cascade,
foreign key (pa) references pa(id_pa) on delete cascade on update cascade,
foreign key (status_ficha) references status(id_status) on delete cascade on update cascade
);

INSERT INTO `forseti_db`.`usuario` (`nome`, `sobrenome`, `user`, `ramal`, `senha`, `email`, `id_status`, `id_tipo`) VALUES ('Lucas', 'F. Di Leone', 'lfleone', '9447', '123456', 'lfleone@senacrs.com.br', '1', '3');
