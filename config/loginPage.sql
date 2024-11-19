create database loginpage;
use loginpage;

create table usuario(
id_usuario int primary key auto_increment,
nome varchar(50),
dt_nasc date,
email varchar(50) unique,
senha varchar(100)
);