create database Exmplo2;

use Exmplo2 ;

create table Cliente (
Nome_Cliente varchar(100),
Endereço varchar(255),
CPF varchar(14),
Cod_Cliente int,
Celula varchar(18) 
);

create table Produto (
Nome_Produto varchar(255),
Valor decimal,
Cod_Produto int,
Descriçao varchar(255),
Quantidade int
);

create table Funcionario (
Nome_Funcionario varchar(100),
CPF_Funcionario varchar(14),
Data_Nascimento date,
Cod_Funcionario int,
Salario decimal
);


create table Estoque (
Nome_Produto varchar(100),
Quantidade int,
Validade datetime,
Cod_Estoque int,
Posiçao varchar(255)
);