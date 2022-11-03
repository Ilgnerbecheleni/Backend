create database BackEnd ;

use BackEnd ;

create table usuarios (
cod int primary key auto_increment ,
nome varchar (100) not null ,
email varchar(150) not null ,
senha varchar (50) not null ,
ativo int (1) );