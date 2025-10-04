CREATE DATABASE LIVRARIA;

USE LIVRARIA;
SELECT DATABASE();

CREATE TABLE Clientes (
Email varchar (100) not null,
Telefone varchar (20) not null,
Data_Nascimento date,
CPF varchar (14) not null PRIMARY KEY,
Nome_Cliente varchar (150) not null
);

CREATE TABLE Livros (
Cod_Livro int auto_increment,
Autor varchar (100) not null,
Ediora varchar (100) not null,
Genero varchar (100) not null,
Preco decimal,
Quantidade int(15),
Titulo varchar (100),
PRIMARY KEY(Cod_Livro,Titulo)
);

CREATE TABLE Autores  (
Data_Nascimento date,
Cod_Autor int auto_increment PRIMARY KEY,
Nome varchar (100) not null,
Nacionalidade varchar (100) not null,
CNPJ varchar (100) not null
);

CREATE TABLE Editoras (
CNPJ varchar (100) not null PRIMARY KEY,
Cidade varchar (100) not null,
Telefone varchar (100) not null,
Contato varchar (100) not null,
Endereço varchar (100) not null,
Nome_Editora varchar (100) not null
);

CREATE TABLE Venda (
  Valor_Total decimal(10,2) NOT NULL,
  Quantidade int NOT NULL,
  Data_Venda date NOT NULL,
  Cod_Venda int AUTO_INCREMENT PRIMARY KEY,
  CPF varchar(14) NOT NULL,
  Cod_Livro int NOT NULL,
  FOREIGN KEY (CPF) REFERENCES Clientes(CPF),
  FOREIGN KEY (Cod_Livro) REFERENCES Livros(Cod_Livro)
);


CREATE TABLE Escreve (
Cod_Escreve int auto_increment  PRIMARY KEY,
Cod_Livro int,
Titulo varchar (100),
Cod_Autor int,
FOREIGN KEY(Titulo) REFERENCES Livros (Cod_Livro,Titulo),
FOREIGN KEY(Cod_Autor) REFERENCES Autores  (Cod_Autor)
);

CREATE TABLE Obter (
Cod_Obter int auto_increment PRIMARY KEY,
Cod_Livro int,
Titulo varchar (100),
CNPJ varchar (100) not null,
FOREIGN KEY(Titulo) REFERENCES Livros (Cod_Livro,Titulo)
);

ALTER TABLE Autores  ADD FOREIGN KEY(CNPJ) REFERENCES Editoras (CNPJ);
